<?php include'header_mhs.html'?>
<?php
require 'functions.php';
session_start();
// if(!isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// }

    // Include our login information
    require_once('db_login.php');
    // execute the query
    // $query = query($db, "SELECT * FROM mahasiswa WHERE email='$email' AND password='$password'");
    // $query    =mysqli_query($db, "SELECT * FROM mahasiswa WHERE email='$_SESSION[id_email]'");
    //     $peg    =mysqli_fetch_array($tampilPeg);
    // select * from pkl join mahasiswa on mahasiswa.pkl_id = pkl.pkl_id where status ='belum'
    $query = "SELECT * FROM mahasiswa 
    join kelurahan on mahasiswa.kelurahan = kelurahan.kelurahan
    join kecamatan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
    join kota_kab on kecamatan.kode_kotakab = kota_kab.kode_kotakab
    join provinsi on kota_kab.kode_provinsi = provinsi.kode_provinsi
    WHERE email='$_SESSION[email]'";
    $result = $db -> query($query);
    if (!$result){
        die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
    } else { 
        while ($row = $result->fetch_object()) {
            $nama = $row->nama; 
            $nim = $row->nim; 
            $email = $row->email;
            $no_hp = $row->no_hp;
            $foto = $row->foto;
            $ipk = $row->ipk;
            $jalur_masuk = $row->jalur_masuk;
            $angkatan = $row->angkatan;
            $status_mahasiswa = $row->status_mahasiswa;
            $alamat = $row->alamat;
            $nama_kotakab = $row->nama_kotakab;
            $nama_provinsi = $row->nama_provinsi;
            }
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
    if( isset($_POST["submit"])){

      if( profil($_POST) > 0 ){
          echo"
              <script>
                  alert('data berhasil diubah!');
                  document.location.href='srs10.1.php';
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
<div class="container">
  <div class="navMenu">
  <div class="navMenu">
        <a href="srs2.php?id=' . $row->ID.'" class="active">PROFIL</a>&nbsp;&nbsp;
        <a href="srs3.php?id=' . $row->ID.'" class="">IRS</a>&nbsp;&nbsp;
        <a href="srs4.php?id=' . $row->ID.'" class="">KHS</a>&nbsp;&nbsp;
        <a href="srs5.php?id=' . $row->ID.'" class="">PKL</a>&nbsp;&nbsp;
        <a href="srs6.php?id=' . $row->ID.'" class="">SKRIPSI</a>&nbsp;&nbsp;
    </div>
  </div>
  <div class="batas">
    <h1>Pengaturan Profile</h1>
      <form action="" method="POST" onsubmit="return submitForm()" name="form" enctype="multipart/form-data">
        
      
    <div class="row khusus1 profile">
      
    <div class="col-5" style="padding-right: 70px;">
    <form method="POST" onsubmit="return submitForm()" name="form">
      <div class="form-group col"> 
        <label for="nim">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>" readonly>
        <div class="error"><?php if(isset($error_nim)) echo $error_nim;?></div>
      </div>

      <div class="form-group col">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
        <div class="error"><?php if (isset($error_nama)) echo $error_nama;?></div>
      </div>

      <div class="form-group col">
        <label for="angkatan">Angkatan</label>
        <select name="angkatan" id="angkatan" class="form-control" required>
          <option value="none" <?php if (!isset($angkatan)) echo 'selected="true"'; ?>> --Select angkatan--</option>
          <option value="2022" <?php if (isset($angkatan) && $angkatan=="2022") echo 'selected="true"'; ?>>2022</option>
          <option value="2021" <?php if (isset($angkatan) && $angkatan=="2021") echo 'selected="true"'; ?>>2021</option>
          <option value="2020" <?php if (isset($angkatan) && $angkatan=="2020") echo'selected="true"'; ?>>2020</option>
          <option value="2019" <?php if (isset($angkatan) && $angkatan=="2019") echo'selected="true"'; ?>>2019</option>
          <option value="2018" <?php if (isset($angkatan) && $angkatan=="2018") echo'selected="true"'; ?>>2018</option>
          <option value="2017" <?php if (isset($angkatan) && $angkatan=="2017") echo'selected="true"'; ?>>2017</option>
          <option value="2016" <?php if (isset($angkatan) && $angkatan=="2016") echo'selected="true"'; ?>>2016</option>
          </select>
          <div class="error"><?php if (isset($error_angkatan)) echo $error_angkatan;?></div>
      </div>

      <div class="form-group">
      <div class="row">

        <div class="col">
          <label for="jalur_masuk">Jalur Masuk</label>
          <select name="jalur_masuk" id="jalur_masuk" class="form-control" required>
            <option value="none" <?php if (!isset($jalur_masuk)) echo 'selected="true"'; ?>> --Select jalur masuk--</option>
            <option value="SNMPTN" <?php if (isset($jalur_masuk) && $jalur_masuk=="SNMPTN") echo 'selected="true"'; ?>>SNMPTN</option>
            <option value="SBMPTN" <?php if (isset($jalur_masuk) && $jalur_masuk=="SBMPTN") echo 'selected="true"'; ?>>SBMPTN</option>
            <option value="Mandiri" <?php if (isset($jalur_masuk) && $jalur_masuk=="Mandiri") echo'selected="true"'; ?>>Mandiri</option>
            </select>
            <div class="error"><?php if (isset($error_jalur_masuk)) echo $error_jalur_masuk;?></div>
        </div>

        <div class="col">
          <label for="status">status</label>
          <select name="status_mahasiswa" id="status_mahasiswa" class="form-control" required>
            <option value="none" <?php if (!isset($status_mahasiswa)) echo 'selected="true"'; ?>> --Select status--</option>
            <option value="aktif" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="aktif") echo 'selected="true"'; ?>>Aktif</option>
            <option value="cuti" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="cuti") echo 'selected="true"'; ?>>Cuti</option>
            <option value="mangkir" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="mangkir") echo 'selected="true"'; ?>>Mangkir</option>
            </select>
            <div class="error"><?php if (isset($error_status)) echo $error_status;?></div>
        </div>
      </div>

        <div class="form-group col">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
          <div class="error"><?php if(isset($error_email)) echo $error_email;?></div>
        </div>

        <div class="form-group col">
          <label for="nohandphone">No.Handphone</label>
          <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>">
          <div class="error"><?php if(isset($error_no_hp)) echo $error_no_hp;?></div>
        </div>
      
      </div>

    </div>

    </form>

    <div class="col-5">
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="5"><?php echo $alamat;?></textarea>
        <div class="error"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
      </div>

      <div class="form-group col">
          <label for="kabkot">Kabupaten/Kota</label>
          <input type="text" class="form-control" id="nama_kotakab" name="nama_kotakab" value="<?php echo $nama_kotakab; ?>">
          <div class="error"><?php if (isset($error_nama_kotakab)) echo $error_nama_kotakab;?></div>
        </div>

        <div class="form-group col">
          <label for="provinsi">Provinsi</label>
          <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" value="<?php echo $nama_provinsi; ?>">
          <div class="error"><?php if (isset($error_nama_provinsi)) echo $error_nama_provinsi;?></div>
        </div>
    </div>
    

    <div class="col">
      <img src="img/<?php echo $foto ?>" class="rounded darwin " alt="" height="200px" width="200px">
      
            <div class="col" >
            <div class="file"style="margin: 13px 75px 0;">
              <label class="file-label">
                <input class="file-input" type="file" name="nama_foto" id="nama_foto">
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Pilih foto…
                  </span>
                </span>
              </label>
            </div>
                    
                <div class="d-flex justify-content-center tombol ">
                    <!-- <button type="button" class="btn bedit border border-secondary">Ganti</button>
                    <button type="button" class="btn bedit border border-secondary">Hapus</button> -->
                </div>
            
                <div class="d-flex justify-content-center">
                  <!-- <a class="btn btn-warning btn-sm" href="srs10.1.php?id=' . $row->ID.'">Update</a>&nbsp;&nbsp; -->
                  <button class="btn btn-warning btn-sm" type="submit" name="submit"style="margin-top:20px;width: 35%;">Update</button>
                </div>
            </div>
    </div>
  </div>
    
  </div>
  
</div>