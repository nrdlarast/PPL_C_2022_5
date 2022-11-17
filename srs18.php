<?php include'header.html' ?>
<?php error_reporting(0) ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardepartemen.php' ?>

    </div>
    <div class="col-10">
<div class="roq">
     
    <div class="batas" style="text-align: center;font-size: 25px;font-weight: 200;">
        <h2>Data Dosen  <br>
            Departemen Ilmu Komputer/Informatika <br>
            Fakultas Sains dan Matematika <br>
            2022/2023</h2> <br>
    </div> 
</div>

<form action="" method="post">
  <table class="table table-striped">
    <tr>
      <th>No</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>More</th>
    </tr>

    <?php
    $no = 1;
    $data = mysqli_query($db,"select * from dosen");
    while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $d['nip']; ?></td>
          <td><?php echo $d['nama']; ?></td>
          <td>
            <a class="button" href="edit.php?nip=<?php echo $d['nip']; ?>">EDIT</a>
          </td>
                  </tr>
                  <?php } ?>
  </table>
  </form>