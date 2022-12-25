<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardosen.php' ?>
    </div>
    <div class="col-10">
        <div class="roq">
        <div class="batas" style="text-align: center;font-size: 25px;font-weight: 200; margin-bottom:70px;">
                    <h2>List Daftar Mahasiswa Wali <br>
                    <?php echo $nama; ?> <br>
                    Fakultas Sains dan Matematika UNDIP </h2>
                 </div> 
        </div>
        <div class="">
        <form action="" method="post">
          <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Angkatan</th>
            </tr>

            <?php
            $no = 1;
            $data = mysqli_query($db,"select * from mahasiswa
            where email_dosenwali='$_SESSION[email]'");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['nim']; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['angkatan']; ?></td>
                          </tr>
                          <?php } ?>
          </table>
          </form>