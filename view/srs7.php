<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
<?php 
require_once('db_login.php');
// if (!isset($_SESSION['email'])){
//     header("Location: login.php");
// }
$nim = $_GET['nim']; //mendapatkan customerid yang dilewatkan ke url

//mengecek apakah user belum menekan tombol submit 
if (!isset($_POST["submit"])) {
    $query = "SELECT * FROM mahasiswa 
	join irs on mahasiswa.irs_id = irs.irs_id
    join khs on mahasiswa.khs_id = khs.khs_id
    join pkl on mahasiswa.pkl_id = pkl.pkl_id
    join skripsi on mahasiswa.skripsi_id = skripsi.skripsi_id
    WHERE nim=".$nim." "; 
    // Execute the query
    $result = $db->query($query);
    if (!$result) {
        die ("Could not query the database: <br />". $db->error);
    } else { 
        while ($row = $result->fetch_object()) {
            $nim = $row->nim;
            $nama = $row->nama; 
            $status_irs = $row->status_irs;
            $status_khs = $row->status_khs;
            $status_pkl = $row->status_pkl;
            $status_skripsi = $row->status_skripsi;
            $nilai_pkl = $row->nilai_pkl;
            $nilai_skripsi = $row->nilai_skripsi;
        }
    }
} else {
    $valid = TRUE; //flag validasi
    $nim = test_input ($_POST['nim']); 
    if ($nim == ''){
        $error_nim = "Address is required";
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
    $status_irs = test_input ($_POST['status_irs']); 
    if ($status_irs == ''){
        $error_status_irs = "status_irs is required";
        $valid = FALSE;
    }
    $status_khs = test_input ($_POST['status_khs']); 
    if ($status_khs == ''){
        $error_status_khs = "status_khs is required";
        $valid = FALSE;
    }
    $status_pkl = test_input ($_POST['status_pkl']); 
    if ($status_pkl == ''){
        $error_status_pkl = "status_pkl is required";
        $valid = FALSE;
    }
    $status_skripsi = test_input ($_POST['status_skripsi']); 
    if ($status_skripsi == ''){
        $error_status_skripsi = "status_skripsi is required";
        $valid = FALSE;
    }
    $nilai_pkl = test_input ($_POST['nilai_pkl']); 
    if ($nilai_pkl == ''){
        $error_nilai_pkl = "nilai_pkl is required";
        $valid = FALSE;
    }
    $nilai_skripsi = test_input ($_POST['nilai_skripsi']); 
    if ($nilai_skripsi == ''){
        $error_nilai_skripsi = "nilai_skripsi is required";
        $valid = FALSE;
    }
    //update data into database
    if ($valid) {
        //escape inputs data
        //Asign a query
        $query = "UPDATE mahasiswa 
        join irs on mahasiswa.irs_id = irs.irs_id
        join khs on mahasiswa.khs_id = khs.khs_id
        join pkl on mahasiswa.pkl_id = pkl.pkl_id
        join skripsi on mahasiswa.skripsi_id = skripsi.skripsi_id
        SET nilai_pkl='". $nilai_pkl."', nilai_skripsi='". $nilai_skripsi."',status_irs='". $status_irs."', status_khs='". $status_khs."', status_pkl='". $status_pkl."', status_skripsi='". $status_skripsi."' WHERE nim=".$nim." ";
        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>query:' . $query);
        }else{
            $db->close();
            header('Location: srs8.3.php');
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
                <h1>Verifikasi Berkas</h1>
                <h1>Mahasiswa</h1>
            </div>

            <div class="card-body">
                <form method="POST" autocomplete="on" action="">
                    <div class="form-group">
                        <label for="nim">Nim:</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>"readonly>
                        <div class="error"><?php if(isset($error_nim)) echo $error_nim;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" readonly>
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
                    </div> <br>
                        <div class="">
                            <div class="row "style="text-align: center; font-size: 20px;font-weight: 600;">
                                <div class="col-sm verif border-r" style="padding-top: 50px;padding-bottom: 50px;">
                                        <h1 class="verifikasi">Verifikasi IRS</h1>
                                        <div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                                        <select name="status_irs" id="status_irs" class="form-control" required>
                                            <option value="none" <?php if (!isset($status_irs)) echo 'selected="true"'; ?>> --Select status--</option>
                                            <option value="belum" <?php if (isset($status_irs) && $status_irs=="belum") echo 'selected="true"'; ?>>Belum Disetujui</option>
                                            <option value="disetujui" <?php if (isset($status_irs) && $status_irs=="disetujui") echo 'selected="true"'; ?>>Disetujui</option>
                                        </select>
                                        <div class="error"><?php if(isset($error_status_irs)) echo $error_status_irs;?></div>
                                        <a href="showirs.php?nim=<?= $nim; ?>" class="btn btn-primary" style="margin-top:65px ;">Lihat Data IRS</a>
                                    </div>
                                </div>
                                <div class="col-sm verif border-r" style="padding-top: 50px;padding-bottom: 50px;">
                                    <h1 class="verifikasi">Verifikasi KHS</h1>
                                        <div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                                        <select name="status_khs" id="status_khs" class="form-control" required>
                                            <option value="none" <?php if (!isset($status_khs)) echo 'selected="true"'; ?>> --Select status--</option>
                                            <option value="belum" <?php if (isset($status_khs) && $status_khs=="belum") echo 'selected="true"'; ?>>Belum Disetujui</option>
                                            <option value="disetujui" <?php if (isset($status_khs) && $status_khs=="disetujui") echo 'selected="true"'; ?>>Disetujui</option>
                                        </select>
                                        <div class="error"><?php if(isset($error_status_khs)) echo $error_status_khs;?></div>
                                        <a href="showkhs.php?nim=<?= $nim; ?>" class="btn btn-primary" style="margin-top:65px ;">Lihat Data KHS</a>
                                    </div>
                                </div>
                                
                                <div class="col-sm verif border-r" style="padding-top: 50px;padding-bottom: 50px;">
                                    <h1 class="verifikasi">Verifikasi PKL</h1>
                                        <div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                                        <select name="status_pkl" id="status_pkl" class="form-control" required>
                                            <option value="none" <?php if (!isset($status_pkl)) echo 'selected="true"'; ?>> --Select status--</option>
                                            <option value="belum" <?php if (isset($status_pkl) && $status_pkl=="belum") echo 'selected="true"'; ?>>Belum PKL</option>
                                            <option value="sedang" <?php if (isset($status_pkl) && $status_pkl=="sedang") echo 'selected="true"'; ?>>Sedang PKL</option>
                                            <option value="lulus" <?php if (isset($status_pkl) && $status_pkl=="lulus") echo 'selected="true"'; ?>>Lulus PKL</option>
                                            </select>
                                        <div class="error"><?php if (isset($error_status_pkl)) echo $error_status_pkl;?></div>
                                        <div class="col" style="margin-top: 25px;margin-bottom: 10px;margin-left:55px;margin-right:55px;">
                                            <input type="text" class="form-control" id="nilai_pkl" name="nilai_pkl" value="<?php echo $nilai_pkl; ?>">
                                            <div class="error"><?php if(isset($error_nilai_pkl)) echo $error_nilai_pkl;?></div>
                                        </div>
                                        <a href="showpkl.php?nim=<?= $nim; ?>" class="btn btn-primary">Lihat Data PKL</a>
                                    </div>
                                </div>

                                <div class="col-sm verif border-r" style="padding-top: 50px;padding-bottom: 50px;">
                                    <h1 class="verifikasi">Verifikasi Skripsi</h1>
                                        <div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                                        <select name="status_skripsi" id="status_skripsi" class="form-control" required>
                                            <option value="none" <?php if (!isset($status_skripsi)) echo 'selected="true"'; ?>> --Select status--</option>
                                            <option value="belum" <?php if (isset($status_skripsi) && $status_skripsi=="belum") echo 'selected="true"'; ?>>Belum Skripsi</option>
                                            <option value="sedang" <?php if (isset($status_skripsi) && $status_skripsi=="sedang") echo 'selected="true"'; ?>>Sedang Skripsi</option>
                                            <option value="lulus" <?php if (isset($status_skripsi) && $status_skripsi=="lulus") echo 'selected="true"'; ?>>Lulus Skripsi</option>
                                            </select>
                                        <div class="error"><?php if (isset($error_status_skripsi)) echo $error_status_skripsi;?></div>
                                        <div class="col" style="margin-top: 25px;margin-bottom: 10px;margin-left:55px;margin-right:55px;">
                                            <input type="text" class="form-control" id="nilai_skripsi" name="nilai_skripsi" value="<?php echo $nilai_skripsi; ?>">
                                            <div class="error"><?php if(isset($error_nilai_skripsi)) echo $error_nilai_skripsi;?></div>
                                        </div>
                                        <a href="showskripsi.php?nim=<?= $nim; ?>" class="btn btn-primary">Lihat Data Skripsi</a>
                                    </div>
                                </div></div>
                        <br>
                        <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        <a href="srs8.3.php" class="btn btn-secondary" style="margin-left:10px;">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    <?php
    $db->close();
    ?>
        
