<?php 
require_once('db_login.php');
$nip = $_GET['nip']; //mendapatkan customerid yang dilewatkan ke url

//mengecek apakah user belum menekan tombol submit 
if (!isset($_POST["submit"])) {
    $query = "SELECT * FROM dosen WHERE nip=".$nip." "; 
    // Execute the query
    $result = $db->query($query);
    if (!$result) {
        die ("Could not query the database: <br />". $db->error);
    } else { 
        while ($row = $result->fetch_object()) {
            $nip = $row->nip;
            $nama = $row->nama; 
            $email = $row->email;
            $alamat = $row->alamat;
            $no_hp = $row->no_hp;
            $foto = $row->foto;
        }
    }
} else {
    $valid = TRUE; //flag validasi
    $nip = test_input ($_POST['nip']); 
    if ($nip == ''){
        $error_nip = "Address is required";
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
    // $status_irs = test_input ($_POST['status_irs']); 
    // if ($status_irs == ''){
    //     $error_status_irs = "status_irs is required";
    //     $valid = FALSE;
    // }
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
    $foto = test_input ($_POST['foto']); 
    // if ($foto == ''){
    //     $error_foto = "foto is required";
    //     $valid = FALSE;
    // }
    //update data into database
    if ($valid) {
        $direktori = "img/";
        $file_name = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$file_name);
        //escape inputs data
        //Asign a query
        $query = "UPDATE dosen SET nip='". $nip."', nama='". $nama."', email='". $email."', alamat='". $alamat."', no_hp='". $no_hp."', foto='". $file_name."' WHERE nip=".$nip." ";
        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>query:' . $query);
        }else{
            $db->close();
            header('Location: srs23.php');
        }
    }
}
?>
<?php
    require_once('db_login.php');        
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
                
                <div class="col-2">Edit Data</div>
                <div class="col-4">
                    <input type="text" value=" ">
                </div>
            </div>
            </div>
        
        <!-- <div class="col-4"><input type="text" value="<?php echo  htmlentities($row['categoryName']);?>"  name="category" class="form-control" required></div>
     -->
    </div>


