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
    $query = "SELECT * FROM mahasiswa join khs on mahasiswa.khs_id = khs.khs_id WHERE email='$_SESSION[email]'";
    $result = $db -> query($query);
    if (!$result){
        die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
    } else { 
        while ($row = $result->fetch_object()) {
            $semester_aktif = $row->semester_aktif;
            $sks_semester = $row->sks_semester;
            $sks_kumulatif = $row->sks_kumulatif;
            $ip_semester = $row->ip_semester;
            $ip_kumulatif = $row->ip_kumulatif;
            $foto = $row->foto;
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
      <form method="POST" onsubmit="return submitForm()" name="form">
      <div class="row khusus1 profile">
        <form method="POST" onsubmit="return submitForm()" name="form">
        <div class="col-5" style="padding-right: 70px;">
            <label for="smtaktif">Semester Aktif</label>
            <select name="semester_aktif" id="semester_aktif" class="form-control" required>
                <option value="none" <?php if (!isset($semester_aktif)) echo 'selected="true"'; ?>> --Select semester aktif--</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="1") echo 'selected="true"'; ?>>Semester 1</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="2") echo 'selected="true"'; ?>>Semester 2</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="3") echo 'selected="true"'; ?>>Semester 3</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="4") echo 'selected="true"'; ?>>Semester 4</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="5") echo 'selected="true"'; ?>>Semester 5</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="6") echo 'selected="true"'; ?>>Semester 6</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="7") echo 'selected="true"'; ?>>Semester 7</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="8") echo 'selected="true"'; ?>>Semester 8</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="9") echo 'selected="true"'; ?>>Semester 9</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="10") echo 'selected="true"'; ?>>Semester 10</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="11") echo 'selected="true"'; ?>>Semester 11</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="12") echo 'selected="true"'; ?>>Semester 12</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="13") echo 'selected="true"'; ?>>Semester 13</option>
                <option value="semester_aktif" <?php if (isset($semester_aktif) && $semester_aktif=="14") echo 'selected="true"'; ?>>Semester 14</option>
                </select>
            <div class="error"><?php if (isset($error_semester_aktif)) echo $error_semester_aktif;?></div>


            <div class="form-group col"> 
                <label for="jmlsks">Jumlah SKS Semester</label>
                <input type="text" class="form-control" id="sks_semester" name="sks_semester" value="<?php echo $sks_semester; ?>">
                <div class="error"><?php if(isset($error_sks_semester)) echo $error_sks_semester;?></div>
            </div>
            <div class="form-group col"> 
                <label for="sks_kumulatif">Jumlah SKS Kumulatif</label>
                <input type="text" class="form-control" id="sks_kumulatif" name="sks_kumulatif" value="<?php echo $sks_kumulatif; ?>">
                <div class="error"><?php if(isset($error_sks_kumulatif)) echo $error_sks_kumulatif;?></div>
            </div>
            <div class="form-group col"> 
                <label for="ip_semester">IP Semester</label>
                <input type="text" class="form-control" id="ip_semester" name="ip_semester" value="<?php echo $ip_semester; ?>">
                <div class="error"><?php if(isset($error_ip_semester)) echo $error_ip_semester;?></div>
            </div>
            <div class="form-group col"> 
                <label for="ip_kumulatif">IP Kumulatif</label>
                <input type="text" class="form-control" id="ip_kumulatif" name="ip_kumulatif" value="<?php echo $ip_kumulatif; ?>">
                <div class="error"><?php if(isset($error_ip_kumulatif)) echo $error_ip_kumulatif;?></div>
            </div>
        </div>

        </form>
        <div class="col-5">
                <label for="jmlsks">Scan KHS</label>
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
      $(document).on('click','a',function(){
            $(this).addClass('active').siblings().removeClass('active')
      })
</script>