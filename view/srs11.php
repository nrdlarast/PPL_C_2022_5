<?php
    require_once('db_login.php');        
?>
<?php

session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}

?>
<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardosen.php' ?>
    </div>
        <div class="col-10">
        <div class="roq">
            <div class="batas" style="text-align: center;font-size: 25px;font-weight: 200; margin-bottom: 70px;">
                <h2>Selamat Datang di Sistem Akademik Perkuliahan  <br>
                <?php echo $nama; ?> </h2>
            </div> 
        </div>
            <div class="">
            <div class="row "style=" font-size: 20px;font-weight: 200; padding-left: 40px;" >
                <div class="col" style="padding-left: 100px; padding-right: 100px; width: 33%; float: left">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px; text-align: center">
                        <label for="status">Mahasiswa Perwalian</label>
					</div>
                    <div class="col"> <a href="wali.php">
                        <div class="box" style="width: 100%; height: 200px; background-color: #EFEFEF;" >
                            <div style="margin-top: 25px;text-align:center; font-size: 70px;font-weight: 200;"> 
                                <?php $data_mahasiswa = mysqli_query($db,"select * from mahasiswa join dosen on mahasiswa.email_dosenwali = dosen.email WHERE email_dosenwali='$_SESSION[email]'");
                                    $jumlah_mahasiswa = mysqli_num_rows($data_mahasiswa);
                                    ?>
                                <p> <b><?php echo $jumlah_mahasiswa; ?></b></p>
                            </div>
                            <div style="margin-bottom: 10px;text-align:center; font-size: 20px;font-weight: 200;"> 
                                <h1> Mahasiswa </h1> </a>
                            </div>
                        </div>
                    </div>

				</div>
                <div class="col" style="padding-left: 100px; padding-right: 100px; width: 33%; float: left"> <a href="srs14.php">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px; text-align: center">
                        <label for="status">Mahasiswa PKL</label>
					</div>
                    <div class="col">
                        <div class="box" style="width: 100%; height: 200px; background-color: #EFEFEF;" >
                            <div style="margin-top: 25px;text-align:center; font-size: 75px;font-weight: 200;"> 
                                <?php $data_mahasiswa = mysqli_query($db,"select * from mahasiswa join dosen on mahasiswa.email_dosenpkl = dosen.email WHERE email_dosenpkl='$_SESSION[email]'");
                                    $jumlah_mahasiswa = mysqli_num_rows($data_mahasiswa);
                                    ?>
                                <p> <b><?php echo $jumlah_mahasiswa; ?></b></p>
                            </div>
                            <div style="margin-bottom: 10px;text-align:center; font-size: 20px;font-weight: 200;"> 
                                <h1> Mahasiswa </h1> </a>
                            </div>
                        </div>
                    </div>

				</div>
                <div class="col" style="padding-left: 100px; padding-right: 100px; width: 33%; float: left"> <a href="srs16.php">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px; text-align: center">
                        <label for="status">Mahasiswa Skripsi</label>
					</div>
                    <div class="col" >
                        <div class="box" style="width: 100%; height: 200px; background-color: #EFEFEF;" >
                            <div style="margin-top: 25px;text-align:center; font-size: 75px;font-weight: 200;"> 
                            <?php $data_mahasiswa = mysqli_query($db,"select * from mahasiswa join dosen on mahasiswa.email_dosenskripsi = dosen.email WHERE email_dosenskripsi='$_SESSION[email]'");
                                    $jumlah_mahasiswa = mysqli_num_rows($data_mahasiswa);
                                    ?>
                                <p> <b><?php echo $jumlah_mahasiswa; ?></b></p>
                            </div>
                            <div style="margin-bottom: 10px;text-align:center; font-size: 20px;font-weight: 200;"> 
                                <h1> Mahasiswa </h1> </a>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <div class="col-10">
        <div class="roq">
            <div class="batas">
            </div>
        </div>
    </div>
</div>

