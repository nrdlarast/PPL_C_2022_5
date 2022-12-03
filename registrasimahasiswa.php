<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
<?php
require_once('db_login.php');

function tambahData($data){
    global $db;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $status_mahasiswa = htmlspecialchars($data["status_mahasiswa"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    $jalur_masuk = htmlspecialchars($data["jalur_masuk"]);
    $ipk = htmlspecialchars($data["ipk"]);
    $email_dosenwali = htmlspecialchars($data["email_dosenwali"]);
    $email_dosenpkl = htmlspecialchars($data["email_dosenpkl"]);
    $email_dosenskripsi = htmlspecialchars($data["email_dosenskripsi"]);
    $kelurahan = htmlspecialchars($data["kelurahan"]);
    $irs_id = htmlspecialchars($data["irs_id"]);
    $khs_id = htmlspecialchars($data["khs_id"]);
    $pkl_id = htmlspecialchars($data["pkl_id"]);
    $skripsi_id = htmlspecialchars($data["skripsi_id"]);
    $password = htmlspecialchars($data["password"]);
    $peran = htmlspecialchars($data["peran"]);

    $direktori = "img/";
    $file_name = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$file_name);

    $query = "INSERT INTO mahasiswa
            VALUES (
                '$nim','$nama','$email','$status_mahasiswa','$alamat','$no_hp','$angkatan','$jalur_masuk','$file_name','$ipk','$email_dosenwali','$email_dosenpkl','$email_dosenskripsi','$kelurahan','$irs_id','$khs_id','$pkl_id','$skripsi_id'
            )";
    // mysqli_query($db,$query)
    $query1 = "INSERT INTO user
            VALUES (
                '$nama','$email','$password','$peran'
            )";
    // mysqli_query($db,$query)
    $result = $db -> query($query);
    $result1 = $db -> query($query1);
    return mysqli_affected_rows($db);
}
// function tambahData1($data){
//     global $db;
//     $nama = htmlspecialchars($data["nama"]);
//     $email = htmlspecialchars($data["email"]);
    
    
//     return mysqli_affected_rows($db);
// }

if (isset($_POST['submit'])){
    $valid = TRUE; //flag validasi
    $nip = test_input ($_POST['nim']); 
    if ($nip == ''){
        $error_nip = "nip is required";
        $valid = FALSE;
    }
    $nama = test_input ($_POST['nama']);
    if ($nama == '') {
        $error_nama = "Name is required";
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
    $status_mahasiswa = test_input ($_POST['status_mahasiswa']); 
    if ($status_mahasiswa == ''){
        $error_status_mahasiswa = "status_mahasiswa is required";
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
    $angkatan = test_input ($_POST['angkatan']); 
    if ($angkatan == ''){
        $error_angkatan = "angkatan is required";
        $valid = FALSE;
    }
    $jalur_masuk = test_input ($_POST['jalur_masuk']); 
    if ($jalur_masuk == ''){
        $error_jalur_masuk = "jalur_masuk is required";
        $valid = FALSE;
    }
    // $foto = test_input ($_POST['foto']); 
    // if ($foto == ''){
    //     $error_foto = "foto is required";
    //     $valid = FALSE;
    // }
    $ipk = test_input ($_POST['ipk']); 
    if ($ipk == ''){
        $error_ipk = "ipk is required";
        $valid = FALSE;
    }
    $email_dosenwali = test_input ($_POST['email_dosenwali']); 
    if ($email_dosenwali == ''){
        $error_email_dosenwali = "email_dosenwali is required";
        $valid = FALSE;
    }
    $email_dosenpkl = test_input ($_POST['email_dosenpkl']); 
    if ($email_dosenpkl == ''){
        $error_email_dosenpkl = "email_dosenpkl is required";
        $valid = FALSE;
    }
    $email_dosenskripsi = test_input ($_POST['email_dosenskripsi']); 
    if ($email_dosenskripsi == ''){
        $error_email_dosenskripsi = "email_dosenskripsi is required";
        $valid = FALSE;
    }
    $password = test_input ($_POST['password']); 
    if ($password == ''){
        $error_password = "password is required";
        $valid = FALSE;
    }
    $peran = test_input ($_POST['peran']); 
    if ($peran == ''){
        $error_peran = "peran is required";
        $valid = FALSE;
    }
    if($valid){
        if(tambahData($_POST)>0){
            echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href='srs21.php';
            </script>";
        } else{
            echo "data gagal ditambahkan";
        }
    }
}
?>
<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbaradmin.php' ?>
    </div>
    <div class="col-10">
        <div class="roq">
            <div class="batas">
                <h1>Tambahkan</h1>
                <h1>Pengguna Baru</h1>
            </div>

            <div class="card-body">
                <form method="POST" autocomplete="on" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" class="form-control" id="email" name="email">
                        <div class="error"><?php if (isset($error_email)) echo $error_email;?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="text" class="form-control" id="password" name="password">
                        <div class="error"><?php if (isset($error_password)) echo $error_password;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nim">Nim:</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                        <div class="error"><?php if(isset($error_nim)) echo $error_nim;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
                    </div>
                    <!-- <div class="form-group">
                    <label for="status_mahasiswa">status mahasiswa:</label>
                        <select name="status_mahasiswa" id="status_mahasiswa" class="form-control">
                            <option value="none" <?php if (!isset($status_mahasiswa)) echo 'selected="true"'; ?>> --Select status--</option>
                            <option value="aktif" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="aktif") echo 'selected="true"'; ?>>Aktif</option>
                            <option value="cuti" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="cuti") echo 'selected="true"'; ?>>Cuti</option>
                            <option value="mangkir" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="mangkir") echo 'selected="true"'; ?>>Mangkir</option>
                        </select>
                        <div class="error"><?php if (isset($error_status_mahasiswa)) echo $error_status_mahasiswa;?></div>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="status_mahasiswa">status_mahasiswa: </label>
                        <input type="text" class="form-control" id="status_mahasiswa" name="status_mahasiswa">
                        <div class="error"><?php if (isset($error_status_mahasiswa)) echo $error_status_mahasiswa;?></div>
                    </div> -->
                    <div class="form-group">
                        <label for="status_mahasiswa">status_mahasiswa: </label>
                        <select name="status_mahasiswa" id="status_mahasiswa" class="form-control" required>
                            <option value="none" <?php if (!isset($status_mahasiswa)) echo 'selected="true"'; ?>> --Select status mahasiswa--</option>
                            <option value="aktif" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="aktif") echo 'selected="true"'; ?>>Aktif</option>
                            <option value="cuti" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="cuti") echo 'selected="true"'; ?>>Cuti</option>
                            <option value="mangkir" <?php if (isset($status_mahasiswa) && $status_mahasiswa=="mangkir") echo'selected="true"'; ?>>Mangkir</option>
                            </select>
                        <div class="error"><?php if (isset($error_status_mahasiswa)) echo $error_status_mahasiswa;?></div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat: </label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="5"></textarea>
                        <div class="error"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP: </label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                        <div class="error"><?php if (isset($error_no_hp)) echo $error_no_hp;?></div>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan: </label>
                        <select name="angkatan" id="angkatan" class="form-control">
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
                        <label for="jalur_masuk">Jalur Masuk: </label>
                        <select name="jalur_masuk" id="jalur_masuk" class="form-control" required>
                            <option value="none" <?php if (!isset($jalur_masuk)) echo 'selected="true"'; ?>> --Select jalur masuk--</option>
                            <option value="SNMPTN" <?php if (isset($jalur_masuk) && $jalur_masuk=="SNMPTN") echo 'selected="true"'; ?>>SNMPTN</option>
                            <option value="SBMPTN" <?php if (isset($jalur_masuk) && $jalur_masuk=="SBMPTN") echo 'selected="true"'; ?>>SBMPTN</option>
                            <option value="Mandiri" <?php if (isset($jalur_masuk) && $jalur_masuk=="Mandiri") echo'selected="true"'; ?>>Mandiri</option>
                            </select>
                        <div class="error"><?php if (isset($error_jalur_masuk)) echo $error_jalur_masuk;?></div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="foto">Foto: </label>
                        <input type="text" class="form-control" id="foto" name="foto">
                        <div class="error"><?php if (isset($error_foto)) echo $error_foto;?></div>
                    </div> -->
                    <div class="col-5">
                    <label for="foto">Foto:</label>
                    <div id="file-js-example" class="file has-name is-boxed">
                        <label class="file-label">
                            <input class="file-input" type="file" name="foto" id="foto">

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
                    <div class="form-group">
                        <label for="ipk">IPK: </label>
                        <input type="text" class="form-control" id="ipk" name="ipk">
                        <div class="error"><?php if (isset($error_ipk)) echo $error_ipk;?></div>
                    </div>
                    <div class="form-group">
                        <label for="email_dosenwali">Email Dosen Wali: </label>
                        <input type="text" class="form-control" id="email_dosenwali" name="email_dosenwali">
                        <div class="error"><?php if (isset($error_email_dosenwali)) echo $error_email_dosenwali;?></div>
                    </div>
                    <div class="form-group">
                        <label for="email_dosenpkl">Email Dosen PKL: </label>
                        <input type="text" class="form-control" id="email_dosenpkl" name="email_dosenpkl">
                        <div class="error"><?php if (isset($error_email_dosenpkl)) echo $error_email_dosenpkl;?></div>
                    </div>
                    <div class="form-group">
                        <label for="email_dosenskripsi">Email Dosen Skripsi: </label>
                        <input type="text" class="form-control" id="email_dosenskripsi" name="email_dosenskripsi">
                        <div class="error"><?php if (isset($error_email_dosenskripsi)) echo $error_email_dosenskripsi;?></div>
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">kelurahan: </label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                        <div class="error"><?php if (isset($error_kelurahan)) echo $error_kelurahan;?></div>
                    </div>
                    <div class="form-group">
                        <label for="irs_id">irs_id: </label>
                        <select class="form-control" name="irs_id" id="irs_id" >
                                <!-- <option value=".$nama_provinsi."></option> -->
                                <?php $sql_irs_id = mysqli_query($db,"SELECT * FROM irs");?>         
                                <?php                       
                                    while($irs_id = mysqli_fetch_assoc($sql_irs_id)){ 
                                    echo '<option value="'.$irs_id['irs_id'].'">'.$irs_id['irs_id'].' </option>';
                                    }                          
                                ?>
                        </select>
                        <div class="error"><?php if (isset($error_irs_id)) echo $error_irs_id;?></div>
                    </div>
                    <div class="form-group">
                        <label for="khs_id">khs_id: </label>
                        <select class="form-control" name="khs_id" id="khs_id" >
                                <!-- <option value=".$nama_provinsi."></option> -->
                                <?php $sql_pkl_id = mysqli_query($db,"SELECT * FROM khs");?>         
                                <?php                       
                                    while($pkl_id = mysqli_fetch_assoc($sql_pkl_id)){ 
                                    echo '<option value="'.$pkl_id['khs_id'].'">'.$pkl_id['khs_id'].' </option>';
                                    }                          
                                ?>
                        </select>
                        <div class="error"><?php if (isset($error_khs_id)) echo $error_khs_id;?></div>
                    </div>
                    <div class="form-group">
                        <label for="pkl_id">pkl_id: </label>
                        <select class="form-control" name="pkl_id" id="pkl_id" >
                                <!-- <option value=".$nama_provinsi."></option> -->
                                <?php $sql_pkl_id = mysqli_query($db,"SELECT * FROM pkl");?>         
                                <?php                       
                                    while($pkl_id = mysqli_fetch_assoc($sql_pkl_id)){ 
                                    echo '<option value="'.$pkl_id['pkl_id'].'">'.$pkl_id['pkl_id'].' </option>';
                                    }                        
                                    
                                ?>
                        </select>
                        <div class="error"><?php if (isset($error_pkl_id)) echo $error_pkl_id;?></div>
                    </div>
                    <div class="form-group">
                        <label for="skripsi_id">skripsi_id</label>
                        <select class="form-control" name="skripsi_id" id="skripsi_id" >
                                <!-- <option value=".$nama_provinsi."></option> -->
                                <?php $sql_skripsi_id = mysqli_query($db,"SELECT * FROM skripsi");?>         
                                <?php                       
                                    while($skripsi_id = mysqli_fetch_assoc($sql_skripsi_id)){ 
                                    echo '<option value="'.$skripsi_id['skripsi_id'].'">'.$skripsi_id['skripsi_id'].' </option>';
                                    }                          
                                ?>
                        </select>
                        <div class="error"><?php if (isset($error_skripsi_id)) echo $error_skripsi_id;?></div>
                    </div>
                    <div class="form-group">
                        <label for="peran">Peran: </label>
                        <input type="text" class="form-control" name="peran" id="peran" value="<?php echo "mahasiswa"; ?>"readonly>
                        <div class="error"><?php if (isset($error_peran)) echo $error_peran;?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="srs21.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        const fileInput = document.querySelector('#file-js-example input[type=file]');
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
            const fileName = document.querySelector('#file-js-example .file-name');
            fileName.textContent = fileInput.files[0].name;
            }
        }
    </script>