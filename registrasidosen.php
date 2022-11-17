<?php
require_once('db_login.php');

function tambahData($data){
    global $db;
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $password = htmlspecialchars($data["password"]);
    $peran = htmlspecialchars($data["peran"]);

    $direktori = "img/";
    $file_name = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$file_name);

    $query = "INSERT INTO dosen
            VALUES (
                '$nip','$nama','$email','$alamat','$no_hp','$foto'
            )";
    // mysqli_query($db,$query)
    $query1 = "INSERT INTO user
            VALUES (
                '$nama','$email','$password','$peran'
            )";
    // mysqli_query($db,$query)
    $result = $db -> query($query);
    $result1 = $db -> query($query1);
    return mysqli_affected_rows($db);
}
// function tambahData1($data){
//     global $db;
//     $nama = htmlspecialchars($data["nama"]);
//     $email = htmlspecialchars($data["email"]);
    
    
//     return mysqli_affected_rows($db);
// }

if (isset($_POST['submit'])){
    $valid = TRUE; //flag validasi
    $nip = test_input ($_POST['nip']); 
    if ($nip == ''){
        $error_nip = "nip is required";
        $valid = FALSE;
    }
    $nama = test_input ($_POST['nama']);
    if ($nama == '') {
        $error_nama = "Name is required";
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
    // $foto = test_input ($_POST['foto']); 
    // if ($foto == ''){
    //     $error_foto = "foto is required";
    //     $valid = FALSE;
    // }
    $password = test_input ($_POST['password']); 
    if ($password == ''){
        $error_password = "password is required";
        $valid = FALSE;
    }
    $peran = test_input ($_POST['peran']); 
    if ($peran == ''){
        $error_peran = "peran is required";
        $valid = FALSE;
    }
    if($valid){
        if(tambahData($_POST)>0){
            echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href='srs21.php';
            </script>";
        } else{
            echo "data gagal ditambahkan";
        }
    }
}
?>
<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbaradmin.php' ?>
    </div>
    <div class="col-10">
        <div class="roq">
            <div class="batas">
                <h1>Tambahkan</h1>
                <h1>Pengguna Baru</h1>
            </div>

            <div class="card-body">
                <form method="POST" autocomplete="on" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" class="form-control" id="email" name="email" rows="5">
                        <div class="error"><?php if (isset($error_email)) echo $error_email;?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="text" class="form-control" id="password" name="password">
                        <div class="error"><?php if (isset($error_password)) echo $error_password;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nip">Nip:</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                        <div class="error"><?php if(isset($error_nip)) echo $error_nip;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat: </label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="5"></textarea>
                        <div class="error"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP: </label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                        <div class="error"><?php if (isset($error_no_hp)) echo $error_no_hp;?></div>
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
                    <div class="form-group">
                        <label for="peran">Peran: </label>
                        <input type="text" class="form-control" name="peran" id="peran" value="<?php echo "dosen"; ?>"readonly>
                        <div class="error"><?php if (isset($error_peran)) echo $error_peran;?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="srs21.php" class="btn btn-secondary">Cancel</a>
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