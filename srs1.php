<?php include 'header.html' ?>

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
      <?php include 'pfp.html'?>
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