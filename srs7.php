<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardosen.php' ?>
    </div>
    <div class="col-10">
        <div class="roq">
            <div class="batas">
                <h1>Verifikasi Berkas</h1>
                <h1>Mahasiswa</h1>
            </div> <br>
			<div class="col" style="margin-top: 25px;padding-left: 40px; ">
                    <h1>Nama Mahasiswa:</h1> <br>
        		    <input type="text" id="nama" name="nama"class="form-control" > <br>
			</div> <br>
        </div>
        <div class="">
            <div class="row "style="text-align: center; font-size: 20px;font-weight: 600;">
                <div class="col-sm verif border-r"style="padding-top: 50px;padding-bottom: 50px;">
					<h1 class="verifikasi">Verifikasi IRS</h1>

					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
						<label for="jalur_masuk" style="justify-content: left;padding: 0px 130px 0px 0px;font-size: 15px; font-weight: 500;">Status IRS</label>
						<select class="form-control" id="jalur_masuk" name="jalur_masuk">
							<option value="disetujui">Disetujui</option>
							<option value="belum disetujui">Belum disetujui</option>
						</select>
						<small class="form-text text-danger" id="jalur_masuk_error"></small>
					</div>
					
					<div class="d-flex justify-content-center">
                    	<button type="button" class="btn btn-primary bup" >Lihat Detail</button>
                	</div>
					<div class="d-flex justify-content-center">
                    	<button type="button" class="btn btn-primary bup" style="">Update</button>
                	</div>
				</div>

                <div class="col-sm verif border-r" style="padding-top: 50px;padding-bottom: 50px;">
					<h1 class="verifikasi">Verifikasi KHS</h1>

					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
						<label for="jalur_masuk" style="justify-content: left;padding: 0px 130px 0px 0px;font-size: 15px; font-weight: 500;">Status KHS</label>
						<select class="form-control" id="jalur_masuk" name="jalur_masuk">
							<option value="disetujui">Disetujui</option>
							<option value="belum disetujui">Belum disetujui</option>
						</select>
						<small class="form-text text-danger" id="jalur_masuk_error"></small>
					</div>
					
					<div class="d-flex justify-content-center">
                    	<button type="button" class="btn btn-primary bup" >Lihat Detail</button>
                	</div>
					<div class="d-flex justify-content-center">
                    	<button type="button" class="btn btn-primary bup" style="">Update</button>
                	</div>
				</div>

                <div class="col-sm verif border-r" style="padding-top: 50px;padding-bottom: 50px;">
					<h1 class="verifikasi">Verifikasi PKL</h1>

					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
						<label for="jalur_masuk" style="justify-content: left;padding: 0px 130px 0px 0px;font-size: 15px; font-weight: 500;">Status PKL</label>
						<select class="form-control" id="jalur_masuk" name="jalur_masuk">
							<option value="disetujui">Disetujui</option>
							<option value="belum disetujui">Belum disetujui</option>
						</select>
						<small class="form-text text-danger" id="jalur_masuk_error"></small>
					</div>
					
					<div class="d-flex justify-content-center">
                    	<button type="button" class="btn btn-primary bup" >Lihat Detail</button>
                	</div>
					<div class="d-flex justify-content-center">
                    	<button type="button" class="btn btn-primary bup" style="">Update</button>
                	</div>
				</div>

                <div class="col-sm verif border-r" style="padding-top: 50px;padding-bottom: 50px;">
					<h1 class="verifikasi">Verifikasi Skripsi</h1>

					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
						<label for="jalur_masuk" style="justify-content: left;padding: 0px 130px 0px 0px;font-size: 15px; font-weight: 500;">Status Skripsi</label>
						<select class="form-control" id="jalur_masuk" name="jalur_masuk">
							<option value="disetujui">Disetujui</option>
							<option value="belum disetujui">Belum disetujui</option>
						</select>
						<small class="form-text text-danger" id="jalur_masuk_error"></small>
					</div>
					
					<div class="d-flex justify-content-center">
                    	<button type="button" class="btn btn-primary bup" >Lihat Detail</button>
                	</div>
					<div class="d-flex justify-content-center">
                    	<button type="button" class="btn btn-primary bup" style="">Update</button>
                	</div>
				</div>
            </div>
            </div>
    </div>
  </div>



<!-- Component Start -->
	<!-- Component End  -->