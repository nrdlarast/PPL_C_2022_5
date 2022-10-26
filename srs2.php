<?php include'header.html'?>

<div class="container">
  <div class="navMenu">
    <?php include 'navbarmhs.php' ?>
  </div>
  <div class="batas">
    <h1>Pengaturan Profile</h1>
      <form method="POST" onsubmit="return submitForm()" name="form">
        
      
    <div class="row khusus1 profile">
      
    <div class="col-5" style="padding-right: 70px;">
    <form method="POST" onsubmit="return submitForm()" name="form">
      <div class="form-group col"> 
        <label for="nim">NIM</label>
        <input type="text" class="form-control profile" name="nim" id="nim">
        <small class="form-text text-danger" id="nim_error"></small>
      </div>

      <div class="form-group col">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama">
        <small class="form-text text-danger" id="nama_error"></small>
      </div>

      <div class="form-group col">
        <label for="angkatan">Angkatan</label>
        <input type="text" class="form-control" name="angkatan" id="angkatan">
        <small class="form-text text-danger" id="angkatan_error"></small>
      </div>

      <div class="form-group">
      <div class="row">

        <div class="col">
          <label for="jalur_masuk">Jalur Masuk</label>
          <select class="form-control" id="jalur_masuk" name="jalur_masuk">
            <option value="">-- pilih provinsi --</option>
            <option value="sbmptn">SBMPTN</option>
            <option value="mandiri">MANDIRI</option>
            <option value="snmptn">SNMPTN</option>
          </select>
          <small class="form-text text-danger" id="jalur_masuk_error"></small>
        </div>

        <div class="col">
          <label for="status">status</label>
          <select class="form-control" id="status" name="status">
            <option value="">-- pilih status --</option>
            <option value="aktif">AKTIF</option>
            <option value="cuti">CUTI</option>
          </select>
          <small class="form-text text-danger" id="status_error"></small>
        </div>
      </div>

        <div class="form-group col">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email">
          <small class="form-text text-danger" id="email_error"></small>
        </div>

        <div class="form-group col">
          <label for="nohandphone">No.Handphone</label>
          <input type="text" class="form-control" name="nohandphone" id="nohandphone">
          <small class="form-text text-danger" id="nohandphone_error"></small>
        </div>
      
      </div>

    </div>

    </form>

    <div class="col-5">
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat"></textarea>
        <small class="form-text text-danger" id="alamat_error"></small>
      </div>

      <div class="form-group col">
          <label for="kabkot">Kabupaten/Kota</label>
          <input type="text" class="form-control" name="kabkot" id="kabkot">
          <small class="form-text text-danger" id="kabkot_error"></small>
        </div>

        <div class="form-group col">
          <label for="provinsi">Provinsi</label>
          <input type="text" class="form-control" name="provinsi" id="provinsi">
          <small class="form-text text-danger" id="provinsi_error"></small>
        </div>
    </div>

    <div class="col">
      <?php include 'pfp.php'?>
    </div>
  </div>
    
  </div>
  
</div>