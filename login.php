<?php
//File      : login.php
//Deskripsi : menampilkan form login dan melakukan login ke halaman admin.php

session_start(); //inisialisasi session
if(isset($_SESSION['login']))
    {
        header('Location: srs10.1.php');
        exit;
    }
require_once('db_login.php');
global $db;


//cek apakah user sudah submit form
if (isset($_POST["submit"])){
    $valid = TRUE; //flag validasi

    //cek validasi email
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "Email is required";
        $valid = FALSE;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "Invalid email format";
        $valid = FALSE;
    }

    //cek validasi password
    $password = test_input($_POST['password']);
    if ($password == ''){
        $error_password = "Password is required";
        $valid = FALSE;
    }

    //cek validasi
    
    // menyeleksi data user dengan email dan password yang sesuai
    $login = mysqli_query($db,"select email, password, peran from user where email='$email' and password='$password'");
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);
    if (!$cek){
      $error_login = "Email atau password salah";
      $valid = false;}
    // cek apakah email dan password di temukan pada database
    if($cek > 0){
    
        $data = mysqli_fetch_assoc($login);
    
        // cek jika user login sebagai admin
        if($data['peran']=="mahasiswa"){
            // buat session login dan email
            $_SESSION['email'] = $email;
            $_SESSION['peran'] = "mahasiswa";
            // alihkan ke halaman dashboard admin
            header("location:srs10.1.php");
    
        // cek jika user login sebagai pegawai
        }else if($data['peran']=="dosen"){
            // buat session login dan email
            $_SESSION['email'] = $email;
            $_SESSION['peran'] = "dosen";
            // alihkan ke halaman dashboard pegawai
            header("location:srs11.php");
    
        // cek jika user login sebagai pengurus
        }else if($data['peran']=="admin"){
            // buat session login dan email
            $_SESSION['email'] = $email;
            $_SESSION['peran'] = "admin";
            // alihkan ke halaman dashboard pengurus
            header("location:srs9.php");
        }
        else if($data['peran']=="departemen"){
            // buat session login dan email
            $_SESSION['email'] = $email;
            $_SESSION['peran'] = "departemen";
            // alihkan ke halaman dashboard pengurus
            header("location:srs12.php");
        }
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets.css">
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- As a heading -->
<nav class="navbar border-bottom border-secondary">
  <div class="container-fluid justify-content-center ">
    <span>UNIVERSITAS DIPONEGORO</span>
  </div>
</nav>

<div class="cotitle container-lg ps-5">
  <span class="title">Login</span>
  
  <form class="font-form"action="" method="post">

  <div class="row">
    <div class="col-3">
      <div class="form-group col">
        <label for="email" class="col-form-label">Email</label>
      </div>
      <div class="form-group col">
        <label for="password" class="col-form-label">Password</label>
      </div>
    </div>
    <div class="col-7">
      <div class="col form-group">
        <input type="email" class="form-control mb-2"  id="email" name="email" value="<?php if (isset($email)) {echo $email;} ?>">
      </div>
      <div class="col form-group">
        <input type="password" class="form-control mb-2 " id="password" name="password" value="<?php if (isset($password)) {echo $password;} ?>">
      </div>
      <div class="text-danger">
        <?php if (isset($error_login)) echo $error_login; ?></p>
      </div>
      
      <button type="submit" class="btn btn-primary blogin" name="submit" value="submit" >Login</button>
    </div>
    </div>
  </div>
  </form>
</div>

  
</body>
</html>
