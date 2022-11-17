<?php 
require_once('db_login.php');
$nim = $_GET['nim']; //mendapatkan customerid yang dilewatkan ke url

//mengecek apakah user belum menekan tombol submit 
if (!isset($_POST["submit"])) {
    $query = "SELECT * FROM mahasiswa 
    join kelurahan on mahasiswa.kelurahan_id = kelurahan.kelurahan_id
    join kecamatan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
    join kota_kab on kecamatan.kode_kotakab = kota_kab.kode_kotakab
    join provinsi on kota_kab.kode_provinsi = provinsi.kode_provinsi
    WHERE nim=".$nim." "; 
    // Execute the query
    $result = $db->query($query);
    if (!$result) {
        die ("Could not query the database: <br />". $db->error);
    } else { 
        while ($row = $result->fetch_object()) {
            $nama = $row->nama; 
            $nim = $row->nim; 
            $email = $row->email;
            $no_hp = $row->no_hp;
            $ipk = $row->ipk;
            $foto = $row->foto;
            $jalur_masuk = $row->jalur_masuk;
            $angkatan = $row->angkatan;
            $status_mahasiswa = $row->status_mahasiswa;
            $alamat = $row->alamat;
            $kelurahan = $row->kelurahan;
            $kecamatan = $row->kecamatan;
            $nama_kotakab = $row ->nama_kotakab;
            $nama_provinsi = $row ->nama_provinsi;
            $kode_pos = $row->kode_pos;
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
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "Email is required";
        $valid = FALSE;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "Invalid email format";
        $valid = FALSE;
    }
    $alamat = test_input ($_POST['alamat']); 
    if ($alamat == ''){
        $error_alamat = "alamat is required";
        $valid = FALSE;
    }
    $no_hp = test_input ($_POST['no_hp']); 
    if ($no_hp == ''){
        $error_no_hp = "no_hp is required";
        $valid = FALSE;
    }
    $ipk = test_input ($_POST['ipk']); 
    if ($ipk == ''){
        $error_ipk = "ipk is required";
        $valid = FALSE;
    }
    $jalur_masuk = test_input ($_POST['jalur_masuk']); 
    if ($jalur_masuk == ''){
        $error_jalur_masuk = "jalur_masuk is required";
        $valid = FALSE;
    }
    $kelurahan = test_input ($_POST['kelurahan']); 
    if ($kelurahan == ''){
        $error_kelurahan = "kelurahan is required";
        $valid = FALSE;
    }
    $kecamatan = test_input ($_POST['kecamatan']); 
    if ($kecamatan == ''){
        $error_kecamatan = "kecamatan is required";
        $valid = FALSE;
    }
    $nama_kotakab = test_input ($_POST['nama_kotakab']); 
    if ($nama_kotakab == ''){
        $error_nama_kotakab = "nama_kotakab is required";
        $valid = FALSE;
    }
    $nama_provinsi = test_input ($_POST['nama_provinsi']); 
    if ($nama_provinsi == ''){
        $error_nama_provinsi = "nama_provinsi is required";
        $valid = FALSE;
    }
    $angkatan = test_input ($_POST['angkatan']); 
    if ($angkatan == ''){
        $error_angkatan = "angkatan is required";
        $valid = FALSE;
    }
    $status_mahasiswa = test_input ($_POST['status_mahasiswa']); 
    if ($status_mahasiswa == ''){
        $error_status_mahasiswa = "status_mahasiswa is required";
        $valid = FALSE;
    }
    $kode_pos = test_input ($_POST['kode_pos']); 
    if ($kode_pos == ''){
        $error_kode_pos = "kode_pos is required";
        $valid = FALSE;
    }
    //update data into database
    if ($valid) {
        //escape inputs data
        //Asign a query
        $query = "UPDATE mahasiswa 
        join kelurahan on mahasiswa.kelurahan_id = kelurahan.kelurahan_id 
        join kecamatan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
        join kota_kab on kecamatan.kode_kotakab = kota_kab.kode_kotakab
        join provinsi on kota_kab.kode_provinsi = provinsi.kode_provinsi
        SET nim='". $nim."',kelurahan='". $kelurahan."',kode_pos='". $kode_pos."',kecamatan='". $kecamatan."',nama_kotakab='". $nama_kotakab."',nama_provinsi='". $nama_provinsi."', ipk='". $ipk."', status_mahasiswa='". $status_mahasiswa."', angkatan='". $angkatan."', jalur_masuk='". $jalur_masuk."', nama='". $nama."', email='". $email."', alamat='". $alamat."', no_hp='". $no_hp."' WHERE nim=".$nim." ";
        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>query:' . $query);
        }else{
            $db->close();
            header('Location: srs8.1.php');
        }
    }
}
?>
<?php include 'header.html' ?>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="flex flex-col items-center h-full overflow-hidden border-r border-grey-400 text-gray-700" style="border-color: black;">
		</div>
	</div>

    </div>
        <div class="col">
        <div class="roq">
            <div class="batas">
                <h1>Profil Akun</h1>
            </div>
        </div>
        <div class="">
            <div class="row "style=" font-size: 20px;font-weight: 200; padding-left: 40px; padding-top: 20px; padding-bottom: 30px;" >
                <div class="col-2">
                    <form method="POST" autocomplete="on" action="">
                    <img src="img/<?php echo $foto ?>" class="darwin " alt="" height="200px" width="200px" style="border-radius: 20px">

                    <div class="col" style="margin-top: 10px;margin-bottom: 10px;">
                        <label for="status">IPK</label>
                        <textarea class="form-control" id="ipk" name="ipk" rows="1" cols="10" style="font-size: 85px;text-align: center;min-height: calc(1.5em + (.75rem + 2px));"><?php echo $ipk;?></textarea>
                        <div class="error"><?php if(isset($error_ipk)) echo $error_ipk;?></div>
                    </div>

                    <div class="form-group">
                        <label for="status_mahasiswa">Status</label>
                        <input type="text" class="form-control" id="status_mahasiswa" name="status_mahasiswa" value="<?php echo $status_mahasiswa; ?>">
                        <div class="error"><?php if(isset($error_status_mahasiswa)) echo $error_status_mahasiswa;?></div>
                    </div>
                </div>
                
                <div class="col-4">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>"readonly>
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nim">Nim:</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>"readonly>
                        <div class="error"><?php if(isset($error_nim)) echo $error_nim;?></div>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?php echo $angkatan; ?>">
                        <div class="error"><?php if(isset($error_angkatan)) echo $error_angkatan;?></div>
                    </div>
                </div>
                <div class="col-5" style="padding-left: 40px;">
                    <div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                        <div class="error"><?php if(isset($error_email)) echo $error_email;?></div>
					</div>
                    <div class="form-group">
                        <label for="nohandphone">No.Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>">
                        <div class="error"><?php if(isset($error_no_hp)) echo $error_no_hp;?></div>
                    </div>
                    <div class="form-group">
                        <label for="Jalur_masuk">Jalur Masuk</label>
                        <input type="text" class="form-control" id="jalur_masuk" name="jalur_masuk" value="<?php echo $jalur_masuk; ?>">
                        <div class="error"><?php if(isset($error_jalur_masuk)) echo $error_jalur_masuk;?></div>
                    </div> 
                </div>
            </div>
            <div class="border-bottom"></div>
            </div>
            <div class="col-10">
                <div class="roq">
                    <div class="batas">
                        <h1>Alamat</h1>
                    </div>
                </div>
                <div class="">
                    <div class="row "style=" font-size: 20px;font-weight: 200; padding-left: 40px;" >
                        <div class="col-2">
                            <div class="form-group">
                                <label for="address">Address: </label>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label for="address">Provinsi:</label>
                            </div>
                        </div>
                        <div class="col-5">      
                        <div class="form-group">
                            <textarea class="form-control" id="alamat" name="alamat" rows="5" ><?php echo $alamat;?></textarea>
                            <div class="error"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" value="<?php echo $nama_provinsi; ?>">
                            <div class="error"><?php if (isset($error_nama_provinsi)) echo $error_nama_provinsi;?></div>
                        </div>
                        </div>
                <div class="col-sm offset-1">
                            <div class="form-group">
                                <label for="address">Kota/Kabupaten:</label>
                                <input type="text" class="form-control" id="nama_kotakab" name="nama_kotakab" value="<?php echo $nama_kotakab; ?>">
                                <div class="error"><?php if (isset($error_nama_kotakab)) echo $error_nama_kotakab;?></div>
                            </div>
                            <div class="form-group">
                                <label for="address">Kecamatan:</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $kecamatan; ?>">
                                <div class="error"><?php if (isset($error_kecamatan)) echo $error_kecamatan;?></div>
                            </div>
                            <div class="form-group">
                                <label for="address">Kelurahan:</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo $kelurahan; ?>">
                                <div class="error"><?php if (isset($error_kelurahan)) echo $error_kelurahan;?></div>
                            </div>
                            <div class="form-group">
                                <label for="address">Kode Pos:</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo $kode_pos; ?>">
                                <div class="error"><?php if (isset($error_kode_pos)) echo $error_kode_pos;?></div>
                            </div>
                        <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="srs8.1.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
<?php
$db->close();
?>
    