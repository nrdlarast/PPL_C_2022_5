<?php include'header.html'?>

<div class="container">
  <div class="navMenu">
    <?php include 'navbarmhs.php' ?>
  </div>
  <div class="batas">
    <h1>Data Praktek Kerja Lapangan</h1>
      <form method="POST" onsubmit="return submitForm()" name="form">
        
      
    <div class="row khusus1 profile">
        <form method="POST" onsubmit="return submitForm()" name="form">
        <div class="col-5" style="padding-right: 70px;">
            <label for="statuspkl">Status PKL</label>
            <select class="form-control" id="statuspkl" name="statuspkl">
                <option value="">-- pilih --</option>
                <option value="belum">belum ambil</option>
                <option value="sedang">sedang ambil</option>
                <option value="lulus">lulus</option>
            </select>
            <small class="form-text text-danger" id="jalur_masuk_error"></small>
        

            <div class="form-group col"> 
                <label for="nilaipkl">Nilai PKL</label>
                <input type="text" class="form-control profile" name="nilaipkl" id="nilaipkl">
                <small class="form-text text-danger" id="nilaipkl_error"></small>
            </div>
        </div>

        </form>
        <div class="col-5">
                <label for="status">Scan Berita Acara Seminar PKL</label>
            <div class="file has-name is-boxed">
                <label class="file-label">
                    <input class="file-input" type="file" name="resume">

                    <span class="file-cta">
                        <span class="file-icon">
                            <!-- <i class="fas fa-upload"></i> -->
                            <!-- <i class="fa-solid fa-upload"></i> -->
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                    </span>

                    <!-- <span class="file-name">
                        Screen Shot 2017-07-29 at 15.54.25.png
                    </span> -->
                    
                </label>

            </div>
        </div>
        <div class="col">
            <?php include 'pfp.php'?>
        </div>
    </div>
</div>