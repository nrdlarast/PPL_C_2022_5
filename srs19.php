<?php include'header.html' ?>
<?php error_reporting(0) ?>
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
        </div>

        <form action="" method="post">
          <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>Kode Mata Kuliah</th>
              <th>Mata Kuliah</th>
              <th>More</th>
            </tr>

            <?php
            $no = 1;
            $data = mysqli_query($db,"select * from matakuliah");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['kode']; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td>
                    <a class="button" href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                  </td>
                          </tr>
                          <?php } ?>
          </table>
          </form>