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

          if( khs($_POST) > 0 ){
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
?>
<?php
    // Include our login information
    require_once('db_login.php');
    $query = "SELECT * FROM mahasiswa 
                JOIN irs ON mahasiswa.irs_id = irs.irs_id WHERE email='$_SESSION[email]' AND semester_aktif = 1";
    $query_sum = "SELECT SUM(jumlah_sks) as sum FROM mahasiswa JOIN irs ON mahasiswa.irs_id = irs.irs_id WHERE email='$_SESSION[email]'";
    $query_ip = "SELECT ROUND(AVG(ip_semester),2) as avg FROM mahasiswa JOIN irs ON mahasiswa.irs_id = irs.irs_id WHERE email='$_SESSION[email]' AND ip_semester != 0";
    $result = $db -> query($query);
    $result_sum = $db -> query($query_sum);
    $result_ip = $db -> query($query_ip);

    if (!$result){
        die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
    } else { 
        while ($row = $result->fetch_object()) {
            $irs_id = $row->irs_id;
            $khs_id = $row->khs_id;
            $jumlah_sks = $row->jumlah_sks;
            $semester_aktif = $row->semester_aktif;
            $sks_kumulatif = $row->sks_kumulatif;
            $ip_semester = $row->ip_semester;
            $ip_kumulatif = $row->ip_kumulatif;
            $berkas_khs = $row->berkas_khs;
            $foto = $row->foto;
        }
        while ($row = $result_sum->fetch_object()){
            $hasilsum = $row->sum;
        }
        while ($row = $result_ip->fetch_object()){
            $hasilip = $row->avg;
        }
    }

?>
<div class="container">
  <div class="navMenu">
  <div class="navMenu">
        <a href="srs2.php?id=' . $row->ID.'" class="">PROFIL</a>&nbsp;&nbsp;
        <a href="srs3.php?id=' . $row->ID.'" class="">IRS</a>&nbsp;&nbsp;
        <a href="srs4.php?id=' . $row->ID.'" class="active">KHS</a>&nbsp;&nbsp;
        <a href="srs5.php?id=' . $row->ID.'" class="">PKL</a>&nbsp;&nbsp;
        <a href="srs6.php?id=' . $row->ID.'" class="">SKRIPSI</a>&nbsp;&nbsp;
</div>
  </div>
  <div class="batas">
    <h1>Data Kartu Hasil Studi</h1>
      <form action="" method="POST" onsubmit="return submitForm()" name="form" enctype="multipart/form-data">
      <div class="row khusus1 profile">
        <form method="POST" onsubmit="return submitForm()" name="form">
        <div class="col-5" style="padding-right: 70px;">
            <label for="smtaktif">Semester Aktif</label>
            <select name="semester_aktif" id="semester_aktif" class="form-control" required>
                <?php
                $sql = "SELECT * FROM mahasiswa join irs on mahasiswa.irs_id = irs.irs_id WHERE email='$_SESSION[email]'";
                $resultset = mysqli_query($db, $sql) or die("database error:" . mysqli_error($conn));
                while ($rows = mysqli_fetch_assoc($resultset)) { ?>
                    <option value="<?php
                                echo $rows["semester_aktif"]; ?>">Semester <?php echo $rows["semester_aktif"]; ?></option>
                <?php }    ?>
            </select>
            <div class="text-danger"><?php if (isset($error_semester_aktif)) echo $error_semester_aktif;?></div>

            <div class="form-group col">
                <input hidden type="type" class="form-control" id="irs_id" name="irs_id" value="<?php echo $irs_id; ?>" readonly>
                <div class="text-danger"><?php if (isset($error_irs_id)) echo $error_irs_id; ?></div>
            </div>

            <div class="form-group col"> 
                <label for="jumlah_sks">Jumlah SKS Semester</label>
                <div id="container_sks">
                    <input type="type" class="form-control" id="jumlah_sks" name="jumlah_sks" value="<?php echo $jumlah_sks; ?>"readonly>
                </div>
                <div class="text-danger"><?php if(isset($error_sks_semester)) echo $error_sks_semester;?></div>
            </div>
            <div class="form-group col"> 
                <label for="sks_kumulatif">Jumlah SKS Kumulatif</label>
                <input type="text" class="form-control" id="sks_kumulatif" name="sks_kumulatif" value="<?php echo $hasilsum; ?>" readonly>
                <div class="text-danger"><?php if(isset($error_sks_kumulatif)) echo $error_sks_kumulatif;?></div>
            </div>
            <div class="form-group col"> 
                <label for="ip_semester">IP Semester</label>
                <div id="container_ips">
                    <input type="type" class="form-control" id="ip_semester" name="ip_semester" value="<?php echo $ip_semester; ?>"readonly>
                </div>
                <div class="text-danger"><?php if(isset($error_ip_semester)) echo $error_ip_semester;?></div>
            </div>
            <div class="form-group col"> 
                <label for="ip_kumulatif">IP Kumulatif</label>
                <input type="text" class="form-control" id="ip_kumulatif" name="ip_kumulatif" value="<?php echo $hasilip; ?>" readonly>
                <div class="text-danger"><?php if(isset($error_ip_kumulatif)) echo $error_ip_kumulatif;?></div>
            </div>
        </div>

        </form>
        <div class="col-5">
                    <label for="jmlsks">Scan KHS</label>
                    <div id="file-js-example" class="file has-name is-boxed">
                        <label class="file-label">
                            <input class="file-input" type="file" name="nama_file_khs" id="nama_file_khs">

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
                                <?= $berkas_khs ?>
                            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // code to get all records from table via select box
            $("#semester_aktif").change(function() {
                var smt = $(this).find(":selected").val();
                var id = $('#irs_id').val();   
                $.ajax({
                    url: 'irs.php',
                    method: "POST",
                    data: {
                        smt: smt,
                        id: id
                    },

                    success: function(data) {
                        $("#container_sks").html(data);
                    }
                });
                $.ajax({
                    url: 'khs.php',
                    method: "POST",
                    data: {
                        smt: smt,
                        id: id
                    },

                    success: function(data) {
                        $("#container_ips").html(data);
                    }
                });
            })
        });
    </script>
    <script>
        const fileInput = document.querySelector('#file-js-example input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
            const fileName = document.querySelector('#file-js-example .file-name');
            fileName.textContent = fileInput.files[0].name;
            }
        }
    </script>   