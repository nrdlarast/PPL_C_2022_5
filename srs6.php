<?php include'header_mhs.html';
require 'functions.php';

session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}

if (isset($_POST["submit"])) {
    $valid = TRUE; //flag validasi
    // $name = test_input ($_POST['name']);
    // if ($name == '') {
    //     $error_nama = "Name is required";
    //     $valid = FALSE; 
    // } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
    //     $error_nama = "Only letters and white space allowed"; 
    //     $valid = FALSE;
    // }
    // $nim = test_input ($_POST['nim']); 
    // if ($address == ''){
    //     $error_address = "NIM is required";
    //     $valid = FALSE;
    // }
    // $address = test_input ($_POST['address']); 
    // if ($address == ''){
    //     $error_address = "Address is required";
    //     $valid = FALSE;
    // }
    // $city = $_POST['city'];
    // if ($city == '' || $city == 'none') {
    //     $error_city = "City is required";
    //     $valid = FALSE;
    // }
    //update data into database
    // if ($valid) {
    //     //escape inputs data
    //     $address = $db->real_escape_string($address);
    //     //Asign a query
    //     $query = " UPDATE customers SET nama='". $nama."' WHERE nim=".$nim." ";
    //     // Execute the query
    //     $result = $db->query($query);
    //     if (!$result) {
    //         die ("Could not query the database: <br />". $db->error. '<br>query:' . $query);
    //     }else{
    //         $db->close();
    //         header('Location: view_customer.php');
    //     }
    // }
        if( isset($_POST["submit"])){

          if( skripsi($_POST) > 0 ){
              echo"
                  <script>
                      alert('data berhasil diubah!');
                  </script>
              ";
          } else {
              echo"
                  <script>
                      alert('data gagal diubah!');
                  </script>
              ";
              echo mysqli_error($db);
          }
      }
}
    // Include our login information
    require_once('db_login.php');
    $query = "SELECT * FROM mahasiswa join skripsi on mahasiswa.skripsi_id = skripsi.skripsi_id WHERE email='$_SESSION[email]'";
    $result = $db -> query($query);
    if (!$result){
        die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
    } else { 
        while ($row = $result->fetch_object()) {
            $skripsi_id = $row->skripsi_id;
            $status_skripsi = $row->status_skripsi;
            $nilai = $row->nilai;
            $berkas_skripsi = $row->berkas_skripsi;
            $foto = $row->foto;
            }
        }          
?>
<div class="container">
  <div class="navMenu">
    <div class="navMenu">
        <a href="srs2.php?id=' . $row->ID.'" class="">PROFIL</a>&nbsp;&nbsp;
        <a href="srs3.php?id=' . $row->ID.'" class="">IRS</a>&nbsp;&nbsp;
        <a href="srs4.php?id=' . $row->ID.'" class="">KHS</a>&nbsp;&nbsp;
        <a href="srs5.php?id=' . $row->ID.'" class="">PKL</a>&nbsp;&nbsp;
        <a href="srs6.php?id=' . $row->ID.'" class="active">SKRIPSI</a>&nbsp;&nbsp;
    </div>
  </div>
  <div class="batas">
    <h1>Data Skripsi</h1>
      <form action="" method="POST" onsubmit="return submitForm()" name="form" enctype="multipart/form-data">

    <div class="row khusus1 profile">
        <form method="POST" onsubmit="return submitForm()" name="form">
        <div class="col-5" style="padding-right: 70px;">
            <label for="status_skripsi">Status Skripsi</label>
            <select name="status_skripsi" id="status_skripsi" class="form-control" required>
                            <option value="none" <?php if (!isset($status_skripsi)) echo 'selected="true"'; ?>> --Select status skripsi--</option>
                            <option value="belum" <?php if (isset($status_skripsi) && $status_skripsi=="belum") echo 'selected="true"'; ?>>Belum Skripsi</option>
                            <option value="sedang" <?php if (isset($status_skripsi) && $status_skripsi=="sedang") echo 'selected="true"'; ?>>Sedang Skripsi</option>
                            <option value="lulus" <?php if (isset($status_skripsi) && $status_skripsi=="lulus") echo 'selected="true"'; ?>>Lulus Skripsi</option>
                            </select>
                        <div class="error"><?php if (isset($error_status_skripsi)) echo $error_status_skripsi;?></div>
        

            <div class="form-group col"> 
                <label for="nilaiskripsi">Nilai Skripsi</label>
                <input type="text" class="form-control" id="nilai" name="nilai" value="<?php echo $nilai; ?>">
                <div class="error"><?php if(isset($error_nilai)) echo $error_nilai;?></div>
            </div>
            
            <div class="form-group col">
                <input type="hidden" class="form-control" id="skripsi_id" name="skripsi_id" value="<?php echo $skripsi_id; ?>" readonly>
                <div class="error"><?php if (isset($error_skripsi_id)) echo $error_skripsi_id; ?></div>
            </div>
        </div>

        </form>
        <div class="col-5">
                    <label for="jmlsks">Scan SKRIPSI</label>
                    <div id="file-js-example" class="file has-name is-boxed">
                        <label class="file-label">
                            <input class="file-input" type="file" name="nama_file" id="nama_file">

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
                    <div class="form-group col">
                        <label for="uploaded_file">Uploaded File</label>
                            <div id="uploaded_file">
                                <?= $berkas_skripsi ?>
                            </div>
                    </div>
                </div>
                <div class="col">
                    <img src="img/<?php echo $foto ?>" class="rounded darwin " alt="" height="200px" width="200px">
                    <div class="d-flex justify-content-center" style="margin-top:20px">
                        <button class="btn btn-warning btn-sm" type="submit" name="submit" style="width: 35%;">Update</button>
                    </div>
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