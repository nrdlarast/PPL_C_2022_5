<?php include'header.html' ?>
<?php
    require_once('db_login.php');        
?>
<?php 
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardepartemen.php' ?>

    </div>
        <div class="col-10">
        <div class="roq">
             
            <div class="batas" style="text-align: center;font-size: 25px;font-weight: 200;">
                <h2>Selamat Datang di Sistem Akademik Perkuliahan  <br>
                    Departemen Ilmu Komputer/Informatika <br>
                    Fakultas Sains dan Matematika <br>
                    2022/2023</h2> <br>
            </div> 
        </div>
        <div class="">
            <div class="row "style=" font-size: 20px;font-weight: 200; padding-left: 40px; " >
                <div class="col"style="padding-left: 100px; padding-right: 100px; width: 33%; float: left">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px; text-align: center">
                        <label for="status">Mahasiswa Aktif</label>
                    </div>
                    <div class="col">
                        <div class="box" style="width: 100%; height: 200px; background-color: #EFEFEF; text-align:center; font-size: 75px;font-weight: 200;" >
                        <?php $data_mahasiswa = mysqli_query($db,"select * from mahasiswa  where status_mahasiswa ='aktif'");
                        $jumlah_mahasiswa = mysqli_num_rows($data_mahasiswa);
                        ?>
                        <p> <b><?php echo $jumlah_mahasiswa; ?></b></p>
                            <!-- <div style="margin-top: 25px;text-align:center; font-size: 75px;font-weight: 200;"> 
                                <h1> 879 </h1>
                            </div> -->
                            <div style="margin-bottom: 10px;text-align:center; font-size: 20px;font-weight: 200;"> 
                                <h1> Mahasiswa </h1>
                            </div>
                        </div>
                    </div>
				</div>

                <div class="col" style="padding-left: 100px; padding-right: 100px; width: 33%; float: left">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px; text-align: center">
                        <label for="status">Mahasiswa Cuti/Tidak Aktif</label>
					</div>
                    <div class="col">
                    <div class="box" style="width: 100%; height: 200px; background-color: #EFEFEF; text-align:center; font-size: 75px;font-weight: 200;" >
                        <?php $data_mahasiswa = mysqli_query($db,"select * from mahasiswa  where status_mahasiswa ='cuti'");
                        $jumlah_mahasiswa = mysqli_num_rows($data_mahasiswa);
                        ?>
                        <p> <b><?php echo $jumlah_mahasiswa; ?></b></p>
                            <!-- <div style="margin-top: 25px;text-align:center; font-size: 75px;font-weight: 200;"> 
                                <h1> 879 </h1>
                            </div> -->
                            <div style="margin-bottom: 10px;text-align:center; font-size: 20px;font-weight: 200;"> 
                                <h1> Mahasiswa </h1>
                            </div>
                        </div>
                    </div>

				</div>
                <div class="col" style="padding-left: 100px; padding-right: 100px; width: 33%; float: left">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px; text-align: center">
                        <label for="status">Jumlah Dosen/Tenaga Didik</label>
					</div>
                    <div class="col" >
                    <div class="box" style="width: 100%; height: 200px; background-color: #EFEFEF; text-align:center; font-size: 75px;font-weight: 200;" >
                        <?php $data_mahasiswa = mysqli_query($db,"select * from dosen ");
                        $jumlah_mahasiswa = mysqli_num_rows($data_mahasiswa);
                        ?>
                        <p> <b><?php echo $jumlah_mahasiswa; ?></b></p>
                            <!-- <div style="margin-top: 25px;text-align:center; font-size: 75px;font-weight: 200;"> 
                                <h1> 879 </h1>
                            </div> -->
                            <div style="margin-bottom: 10px;text-align:center; font-size: 20px;font-weight: 200;"> 
                                <h1> Dosen </h1>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <div class="col-sm">
        <div class="roq">
        
        </div>
    </div>
</div>

