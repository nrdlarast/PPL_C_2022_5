<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardosen.php' ?>
    </div>
    
        <div class="col-10">
            <div class="roq">
             
                <div class="batas" style="text-align: center;font-size: 25px;font-weight: 200;">
                    <h2>List Daftar dan Status PKL Mahasiswa Informatika  <br>
                              Fakultas Sains dan Matematika UNDIP <br> </h2> <br>
                 </div> 
            </div>
            <div class="">
            <div class="row "style=" padding-block: 50px; padding-left: 50px; font-size: 20px;" >
                    <div>
                        <label for="angkatan">-Angkatan-</label>
                           <?php
                            $now=date('Y');
                            echo "<select name=’angkatan’>";
                            for ($a=2016;$a<=$now;$a++)
                            {
                                echo "<option value='$a'>$a</option>";
                            }
                                echo "</select>";
                           ?>
                    </div>
            </div>
            <div class="navMenu">
                <li><a href="srs14.php" style="color: white;">Lulus</a></li>
                <li class="active"><a href="14belum.php" style="color: black;">Belum Lulus</a></li>
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
                $data = mysqli_query($db,"select * from pkl join mahasiswa on mahasiswa.pkl_id = pkl.pkl_id where status ='belum'");
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