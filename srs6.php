<?php include'header_mhs.html'?>
<?php

session_start();
if(!isset($_SESSION["login"]) ) {
    // header("Location: login.php");
    // exit;
}

?>
<?php
    // Include our login information
    require_once('db_login.php');
    // execute the query
    // $query = query($db, "SELECT * FROM mahasiswa WHERE email='$email' AND password='$password'");
    // $query    =mysqli_query($db, "SELECT * FROM mahasiswa WHERE email='$_SESSION[id_email]'");
    //     $peg    =mysqli_fetch_array($tampilPeg);
    // select * from pkl join mahasiswa on mahasiswa.pkl_id = pkl.pkl_id where status ='belum'
    $query = "SELECT * FROM mahasiswa join pkl on mahasiswa.pkl_id = pkl.pkl_id WHERE email='$_SESSION[email]'";
    $result = $db -> query($query);
    if (!$result){
        die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
    } else { 
        while ($row = $result->fetch_object()) {
            $status = $row->status;
            $nilai = $row->nilai;
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
      <form method="POST" onsubmit="return submitForm()" name="form">
        
      
    <div class="row khusus1 profile">
        <form method="POST" onsubmit="return submitForm()" name="form">
        <div class="col-5" style="padding-right: 70px;">
            <label for="statusskripsi">Status Skripsi</label>
            <select name="status" id="status" class="form-control" required>
                            <option value="none" <?php if (!isset($status)) echo 'selected="true"'; ?>> --Select status--</option>
                            <option value="belum" <?php if (isset($status) && $status=="belum") echo 'selected="true"'; ?>>Belum Skripsi</option>
                            <option value="sedang" <?php if (isset($status) && $status=="sedang") echo 'selected="true"'; ?>>Sedang Skripsi</option>
                            <option value="lulus" <?php if (isset($status) && $status=="lulus") echo 'selected="true"'; ?>>Lulus Skripsi</option>
                            </select>
                        <div class="error"><?php if (isset($error_status)) echo $error_status;?></div>
        

            <div class="form-group col"> 
                <label for="nilaiskripsi">Nilai Skripsi</label>
                <input type="text" class="form-control" id="nilai" name="nilai" value="<?php echo $nilai; ?>">
                <div class="error"><?php if(isset($error_nilai)) echo $error_nilai;?></div>
            </div>
        </div>

        </form>
        <div class="col-5">
                <label for="status">Scan Berita Acara Sidang Skripsi</label>
            <div class="file has-name is-boxed">
                <label class="file-label">
                    <input class="file-input" type="file" name="resume">

                    <span class="file-cta">
                        <span class="file-icon">
                            <!-- <i class="fas fa-upload"></i> -->
                            <!-- <i class="fa-solid fa-upload"></i> -->
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                    </span>

                    <!-- <span class="file-name">
                        Screen Shot 2017-07-29 at 15.54.25.png
                    </span> -->
                    
                </label>

            </div>
        </div>
        <div class="col">
            <img src="img/<?php echo $foto ?>" class="rounded darwin " alt="" height="200px" width="200px">
            <div class="d-flex justify-content-center" style="margin-top:20px">
            <button class="btn btn-warning btn-sm" type="submit" name="submit"style="width: 35%;">Update</button>
            </div>
        </div>
    </div>
</div>