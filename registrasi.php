<?php
require_once('db_login.php');

function tambahData($data){
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $peran = htmlspecialchars($data["peran"]);
    $query = "INSERT INTO user
            VALUES (
                '$nama','$email','$password','$peran'
            )";
    // mysqli_query($db,$query)
    $result = $db -> query($query);
    return mysqli_affected_rows($db);
}

if (isset($_POST['submit'])){
    $valid = TRUE; //flag validasi
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
                <form method="POST" autocomplete="on" action="">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
                    </div>
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
                        <label for="peran">Peran:</label>
                        <select name="peran" id="peran" class="form-control" required>
                            <option value="none" <?php if (!isset($peran)) echo 'selected="true"'; ?>> --Select peran--</option>
                            <option value="mahasiswa" <?php if (isset($peran) && $peran=="mahasiswa") echo 'selected="true"'; ?>>mahasiswa</option>
                            <option value="dosen" <?php if (isset($peran) && $peran=="dosen") echo 'selected="true"'; ?>>dosen</option>
                            <option value="admin" <?php if (isset($peran) && $peran=="admin") echo 'selected="true"'; ?>>admin</option>
                            </select>
                        <div class="error"><?php if (isset($error_peran)) echo $error_peran;?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="srs21.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>