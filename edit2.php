<?php 
require_once('db_login.php');
$nip = $_GET['nip']; //mendapatkan customerid yang dilewatkan ke url

//mengecek apakah user belum menekan tombol submit 
if (!isset($_POST["submit"])) {
    $query = "SELECT * FROM dosen WHERE nip=".$nip." "; 
    // Execute the query
    $result = $db->query($query);
    if (!$result) {
        die ("Could not query the database: <br />". $db->error);
    } else { 
        while ($row = $result->fetch_object()) {
            $nip = $row->nip;
            $nama = $row->nama; 
            $email = $row->email;
            $alamat = $row->alamat;
            $no_hp = $row->no_hp;
            $foto = $row->foto;
        }
    }
} else {
    $valid = TRUE; //flag validasi
    $nip = test_input ($_POST['nip']); 
    if ($nip == ''){
        $error_nip = "Address is required";
        $valid = FALSE;
    }
    
    $nama = test_input ($_POST['nama']);
    if ($nama == '') {
        $error_nama = "Nama is required";
        $valid = FALSE; 
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error_nama = "Only letters and white space allowed"; 
        $valid = FALSE;
    }
    // $status_irs = test_input ($_POST['status_irs']); 
    // if ($status_irs == ''){
    //     $error_status_irs = "status_irs is required";
    //     $valid = FALSE;
    // }
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "Email is required";
        $valid = FALSE;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "Invalid email format";
        $valid = FALSE;
    }
    $alamat = test_input ($_POST['alamat']); 
    if ($alamat == ''){
        $error_alamat = "alamat is required";
        $valid = FALSE;
    }
    $no_hp = test_input ($_POST['no_hp']); 
    if ($no_hp == ''){
        $error_no_hp = "no_hp is required";
        $valid = FALSE;
    }
    $foto = test_input ($_POST['foto']); 
    if ($foto == ''){
        $error_foto = "foto is required";
        $valid = FALSE;
    }
    //update data into database
    if ($valid) {
        $direktori = "img/";
        $file_name = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$file_name);
        
        $query = "UPDATE dosen SET nip='". $nip."', nama='". $nama."', email='". $email."', alamat='". $alamat."', no_hp='". $no_hp."', foto='". $file_name."' WHERE nip=".$nip." ";
        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>query:' . $query);
        }else{
            $db->close();
            header('Location: srs23.php');
        }
    }
}
?>
<?php include 'header.html' ?>
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-10">
        <div class="roq">
            <div class="batas">
                <h1>Edit</h1>
                <h1>Data Dosen</h1>
            </div>

            <div class="card-body">
                <form method="POST" autocomplete="on" action="">
                    <div class="form-group">
                        <label for="nip">Nip:</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $nip; ?>"readonly>
                        <div class="error"><?php if(isset($error_nip)) echo $error_nip;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
                    </div>
                    <div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                        <div class="error"><?php if(isset($error_email)) echo $error_email;?></div>
					</div>
                    <div class="form-group">
                        <label for="address">Address: </label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="5" ><?php echo $alamat;?></textarea>
                        <div class="error"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nohandphone">No.Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>">
                        <div class="error"><?php if(isset($error_no_hp)) echo $error_no_hp;?></div>
                    </div>
                    <div class="col-5">
                    <label for="foto">Foto:</label>
                    <div id="file-js-example" class="file has-name is-boxed">
                        <label class="file-label">
                            <input class="file-input" type="file" name="foto" id="foto">

                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </span>
                                <span class="file-label">
                                    Choose a file…
                                </span>
                            </span>
                            <span class="file-name">No file uploaded</span>
                        </label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="srs23.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        const fileInput = document.querySelector('#file-js-example input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
            const fileName = document.querySelector('#file-js-example .file-name');
            fileName.textContent = fileInput.files[0].name;
            }
        }
    </script>
<?php
$db->close();
?>
    