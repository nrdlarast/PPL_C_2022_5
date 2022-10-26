<?php include'header.html'?>

<div class="container">
  <div class="navMenu">
    <?php include 'navbarmhs.php' ?>
  </div>
  <div class="batas">
    <h1>Data Kartu Hasil Studi</h1>
      <form method="POST" onsubmit="return submitForm()" name="form">
        
      
      
      <div class="row khusus1 profile">
        <form method="POST" onsubmit="return submitForm()" name="form">
        <div class="col-5" style="padding-right: 70px;">
            <label for="smtaktif">Semester Aktif</label>
            <select class="form-control" id="smtaktif" name="smtaktif">
                <option value="">-- pilih semester --</option>
                <option value="sbmptn">semester 1</option>
                <option value="mandiri">semester 2</option>
                <option value="snmptn">semester 3</option>
            </select>
            <small class="form-text text-danger" id="jalur_masuk_error"></small>


            <div class="form-group col"> 
                <label for="jmlsks">Jumlah SKS Semester</label>
                <input type="text" class="form-control profile" name="jmlsks" id="jmlsks">
                <small class="form-text text-danger" id="jmlsks_error"></small>
            </div>
            <div class="form-group col"> 
                <label for="sks_kumulatif">Jumlah SKS Kumulatif</label>
                <input type="text" class="form-control profile" name="sks_kumulatif" id="sks_kumulatif">
                <small class="form-text text-danger" id="sks_kumulatif_error"></small>
            </div>
            <div class="form-group col"> 
                <label for="ip_semester">IP Semester</label>
                <input type="text" class="form-control profile" name="ip_semester" id="ip_semester">
                <small class="form-text text-danger" id="ip_semester_error"></small>
            </div>
            <div class="form-group col"> 
                <label for="ip_kumulatif">IP Kumulatif</label>
                <input type="text" class="form-control profile" name="ip_kumulatif" id="ip_kumulatif">
                <small class="form-text text-danger" id="ip_kumulatif_error"></small>
            </div>
        </div>

        </form>
        <div class="col-5">
                <label for="jmlsks">Scan KHS</label>
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
