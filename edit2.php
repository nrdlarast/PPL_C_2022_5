<?php include 'header.html' ?>

<?php
session_start();
if(!isset($_SESSION["login"]) ) {
    // header("Location: login.php");
    // exit;
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


