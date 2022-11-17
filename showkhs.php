<?php 
include 'header.html';
require_once('db_login.php');
$nim = $_GET['nim'];

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
            $berkas_khs = $row->berkas_khs;
            $status_khs = $row->status_khs;
            $status_pkl = $row->status_pkl;
            $status_skripsi = $row->status_skripsi;

?>
<div class="container">
    <div class="batas">
        <h1>Scan Kartu Hasil Studi</h1>
        <form  action="" method="POST" onsubmit="return submitForm()" name="form">

            <div class="row khusus1 profile">
                <div class="col">
                    <?php if(!isset($berkas_khs)){
                        echo "<h6 class='text-danger text-center mt-3'>No data Uploaded</h6>";
                    } else {?>
                        <img src="img/<?php echo $berkas_khs ?>" style="margin: auto" alt="">
                    <?php }?>
                    <div class="d-flex justify-content-center" style="margin-top:20px">
                        <a class="btn btn-primary btn-sm" href="srs7.php?nim=<?= $nim?>"style="width: 10%;">
                            Back
                        </a>
                    </div>
                </div>
            </div>
    </div>
    <?php }
    }
?>
    