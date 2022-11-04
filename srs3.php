<?php include'header_mhs.html'?>
<?php
require 'functions.php';
session_start();
if(!isset($_SESSION["login"]) ) {
    // header("Location: login.php");
    // exit;
}
//mengecek apakah user belum menekan tombol submit 
if (isset($_POST["submit"])){
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
//     if( isset($_POST["submit"])){

//       if( irs($_POST) > 0 ){
//           echo"
//               <script>
//                   alert('data berhasil diubah!');
//               </script>
//           ";
//       } else {
//           echo"
//               <script>
//                   alert('data gagal diubah!');
//               </script>
//           ";
//           echo mysqli_error($db);
//       }
//   }
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
    $query = "SELECT * FROM mahasiswa join irs on mahasiswa.irs_id = irs.irs_id WHERE email='$_SESSION[email]'";
    $result = $db -> query($query);
    if (!$result){
        die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
    } else { 
        while ($row = $result->fetch_object()) {
            $irs_id = $row->irs_id;
            $semester_aktif = $row->semester_aktif;
            $jumlah_sks = $row->jumlah_sks;
            $foto = $row->foto;
            }
        }
            
?>
<div class="container">
  <div class="navMenu">
  <div class="navMenu">
        <a href="srs2.php?id=' . $row->ID.'" class="">PROFIL</a>&nbsp;&nbsp;
        <a href="srs3.php?id=' . $row->ID.'" class="active">IRS</a>&nbsp;&nbsp;
        <a href="srs4.php?id=' . $row->ID.'" class="">KHS</a>&nbsp;&nbsp;
        <a href="srs5.php?id=' . $row->ID.'" class="">PKL</a>&nbsp;&nbsp;
        <a href="srs6.php?id=' . $row->ID.'" class="">SKRIPSI</a>&nbsp;&nbsp;
    </div>
  </div>
  <div class="batas">
    <h1>Data Isian Rencana Semester</h1>
      <form method="POST" onsubmit="return submitForm()" name="form">
        
      
    <div class="row khusus1 profile">
        <form method="POST" onsubmit="return submitForm()" name="form">
        
        <div class="col-5" style="padding-right: 70px;">
        <div class="form-group col"> 
            <input type="hidden" class="form-control" id="irs_id" name="irs_id" value="<?php echo $irs_id; ?>" readonly>
            <div class="error"><?php if(isset($error_irs_id)) echo $error_irs_id;?></div>
        </div>
            <label for="semester_aktif">Semester Aktif</label>
            <select name="semester_aktif" id="semester_aktif" class="form-control" required>
                <option value="none" <?php if (!isset($semester_aktif)) echo 'selected="true"'; ?>> --Select semester aktif--</option>
                <option value="1" <?php if (isset($semester_aktif) && $semester_aktif=="1") echo 'selected="true"'; ?>>Semester 1</option>
                <option value="2" <?php if (isset($semester_aktif) && $semester_aktif=="2") echo 'selected="true"'; ?>>Semester 2</option>
                <option value="3" <?php if (isset($semester_aktif) && $semester_aktif=="3") echo 'selected="true"'; ?>>Semester 3</option>
                <option value="4" <?php if (isset($semester_aktif) && $semester_aktif=="4") echo 'selected="true"'; ?>>Semester 4</option>
                <option value="5" <?php if (isset($semester_aktif) && $semester_aktif=="5") echo 'selected="true"'; ?>>Semester 5</option>
                <option value="6" <?php if (isset($semester_aktif) && $semester_aktif=="6") echo 'selected="true"'; ?>>Semester 6</option>
                <option value="7" <?php if (isset($semester_aktif) && $semester_aktif=="7") echo 'selected="true"'; ?>>Semester 7</option>
                <option value="8" <?php if (isset($semester_aktif) && $semester_aktif=="8") echo 'selected="true"'; ?>>Semester 8</option>
                <option value="9" <?php if (isset($semester_aktif) && $semester_aktif=="9") echo 'selected="true"'; ?>>Semester 9</option>
                <option value="10" <?php if (isset($semester_aktif) && $semester_aktif=="10") echo 'selected="true"'; ?>>Semester 10</option>
                <option value="11" <?php if (isset($semester_aktif) && $semester_aktif=="11") echo 'selected="true"'; ?>>Semester 11</option>
                <option value="12" <?php if (isset($semester_aktif) && $semester_aktif=="12") echo 'selected="true"'; ?>>Semester 12</option>
                <option value="13" <?php if (isset($semester_aktif) && $semester_aktif=="13") echo 'selected="true"'; ?>>Semester 13</option>
                <option value="14" <?php if (isset($semester_aktif) && $semester_aktif=="14") echo 'selected="true"'; ?>>Semester 14</option>
                </select>
            <div class="error"><?php if (isset($error_semester_aktif)) echo $error_semester_aktif;?></div>

            <div class="form-group col"> 
                <label for="jmlsks">Jumlah SKS</label>
                <input type="text" class="form-control" id="jumlah_sks" name="jumlah_sks" value="<?php echo $jumlah_sks; ?>">
                <div class="error"><?php if(isset($error_jumlah_sks)) echo $error_jumlah_sks;?></div>
            </div>
        </div>

        </form>
        <div class="col-5">
                <label for="jmlsks">Scan IRS</label>
            <div class="file has-name is-boxed">
                <label class="file-label">
                    <input class="file-input" type="file" name="resume">

                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                    </span>
                    
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

<script src="javascript.js"></script>