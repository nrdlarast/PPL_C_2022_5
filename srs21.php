<?php include'header.html' ?>
<?php error_reporting(0) ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbaradmin.php' ?>

    </div>
        <div class="col-10">
        <div class="roq">
             
            <div class="batas" style="text-align: center;font-size: 25px;font-weight: 200;">
                <h2>Selamat Datang di Sistem Akademik Perkuliahan  <br>
                    Departemen Ilmu Komputer/Informatika <br>
                    Fakultas Sains dan Matematika <br>
                    2022/2023</h2> <br>
            </div> 
        </div>
        
        <form action="" method="post">
        <a class="btn btn-primary" href="registrasimahasiswa.php">+ Add Mahasiswa</a>
        <a class="btn btn-primary" href="registrasidosen.php">+ Add Dosen</a> <br><br>
          <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Password</th>
              <th>Peran</th>
            </tr>

            <?php
            $no = 1;
            $data = mysqli_query($db,"select * from user");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['email']; ?></td>
                  <td><?php echo $d['password']; ?></td>
                  <td><?php echo $d['peran']; ?></td>
                          </tr>
                          <?php } ?>
          </table>
          </form>