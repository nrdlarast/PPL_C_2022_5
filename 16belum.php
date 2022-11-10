
<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardosen.php' ?>
    </div>

    <div class="col-10">
        <div class="roq">
        <div class="batas" style="text-align: center;font-size: 25px;font-weight: 200;">
                    <h2>List Daftar dan Status Skripsi Mahasiswa Informatika  <br>
                              Fakultas Sains dan Matematika UNDIP <br> </h2> <br>
                 </div> 
        </div>
        <div class="">
            <div class="row "style=" padding-block: 50px; padding-left: 50px; font-size: 20px;" >
        </div>
        <div class="navMenu">
        <li><a href="srs16.php" style="color: white;">Lulus</a></li>
        <li class="active"><a href="16belum.php" style="color: black;">Belum Lulus</a></li>
                        </div>

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
            $data = mysqli_query($db,"select * from skripsi 
            join mahasiswa on mahasiswa.skripsi_id = skripsi.skripsi_id 
            join dosen on mahasiswa.email_dosenskripsi = dosen.email
            where status ='belum' and email_dosenwali='$_SESSION[email]'");
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