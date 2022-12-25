<?php 
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
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
        //escape inputs data
        //Asign a query
        $query = "UPDATE dosen SET nip='". $nip."', nama='". $nama."', email='". $email."', alamat='". $alamat."', no_hp='". $no_hp."', foto='". $foto."' WHERE nip=".$nip." ";
        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>query:' . $query);
        }else{
            $db->close();
            header('Location: srs18.php');
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
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>"readonly>
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
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="text" class="form-control" id="foto" name="foto" value="<?php echo $foto; ?>">
                        <div class="error"><?php if(isset($error_foto)) echo $error_foto;?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="srs18.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
<?php
$db->close();
?>
    