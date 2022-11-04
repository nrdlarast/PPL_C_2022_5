<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardosen.php' ?>
    </div>

    <div class="col-10">
        <div class="roq">
            <div class="batas">
                <h1> Data Mahasiswa Skripsi</h1>
            </div>
        </div>
        <div class="">
            <div class="row "style=" padding-block: 50px; padding-left: 50px; font-size: 20px;" >
                    <div>
                        <label for="pilihtahun">-pilih tahun-</label>
                           <?php
                            $now=date('Y');
                            echo "<select name=’pilihtahun’>";
                            for ($a=2016;$a<=$now;$a++)
                            {
                                echo "<option value='$a'>$a</option>";
                            }
                                echo "</select>";
                           ?>
                    </div>
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
            include "db_login.php";
            $no = 1;
            $data = mysqli_query($db,"select * from mahasiswa join skripsi on mahasiswa.skripsi_id = skripsi.skripsi_id where status ='belum'");
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