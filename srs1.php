<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets.css">
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- As a heading -->

<!-- <nav class="navbar sticky-top border-bottom mb-1"> -->
<nav class="navbar border-bottom border-secondary">
  <div class="container-fluid justify-content-center ">
    <span>UNIVERSITAS DIPONEGORO</span>
  </div>
</nav>

<div class="cotitle container-lg ps-5">
  <span class="title">Data</span>
  <span class="title title2">Mahasiswa</span>
  
  <form class="font-form"action="" method="post">

  <div class="row">
    <div class="col-2">
      <div class="form-group col">
        <label for="nim" class="col-form-label">NIM</label>
      </div>
      <div class="form-group col">
        <label for="nama" class="col-form-label">Nama Lengkap</label>
      </div>
      <div class="form-group col">
        <label for="angkatan" class="col-form-label">Angkatan</label>
      </div>
      <div class="form-group col">
        <label for="status" class="col-form-label">Status</label>
      </div>
    </div>
    <div class="col-6">
      <div class="col form-group">
        <input type="text" id="nim" name="nim"class="form-control" >
      </div>
      <div class="col form-group">
        <input type="text" id="nama" name="nama"class="form-control" >
      </div>
      <div class="col form-group">
        <select class="form-select" id="angkatan" name="angkatan" >
          <option selected>Angkatan</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
        </select>
      </div>
      <div class="col form-group">
        <select class="form-select" id="status" name="status">
          <option selected>Status</option>
          <option value="aktif">Aktif</option>
          <option value="cuti">Cuti</option>
        </select>
      </div>
      </div>
    <div class="col pfp">
      <img src="img/darwin.jpg" class="rounded float-right " alt="" height="200px" width="200px">
      <div class="col">
        <div class="d-flex justify-content-center tombol ">
          <button type="button" class="btn bedit border border-secondary">Ganti</button>
          <button type="button" class="btn bedit border border-secondary">Hapus</button>
        </div>
        
        <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary bup">Update</button>
        </div>
      </div>
        
    </div>
  </div>
  
  <!-- <div class="row g-3 align-items-center">
    <div class="form-group col">
      <label for="inputPassword6" class="col-form-label">NIM</label>
    </div>
    <div class="col form-group">
      <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </div>
  </div>

  <div class="row g-3 align-items-center">
    <div class="form-group col">
      <label for="inputPassword6" class="col-form-label">Nama Lengkap</label>
    </div>
    <div class="col form-group">
      <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </div>
  </div>

  <div class="row g-3 align-items-center">
    <div class="form-group col">
      <label for="inputPassword6" class="col-form-label">Angkatan</label>
    </div>
    <div class="col form-group">
      <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </div>
  </div>

  <div class="row g-3 align-items-center">
    <div class="form-group col">
      <label for="inputPassword6" class="col-form-label">Status</label>
    </div>
    <div class="col form-group">
      <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </div>
  </div> -->
  </form>
</div>

  
</body>
</html>