<?php include'header.html' ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbardosen.php' ?>
    </div>
	    <div class="col-10">
        <div class="roq">
             
            <div class="batas" style="text-align: center;font-size: 25px;font-weight: 200;">
                <h2>Rekap Skripsi Mahasiswa Informatika  <br>
                    Fakultas Sains dan Matematika UNDIP <br> </h2> <br>
            </div> 
        </div>
        <div class="">
            <div class="row "style=" font-size: 20px;font-weight: 200; padding-left: 40px;" >
                <div class="col"style="padding-left: 100px; padding-right: 100px;">
					<div class="col" style="margin-top: 10px;margin-bottom: 10px;"> <br>
                        <label>Angkatan</label>
						<select class="form-control" id="jalur_masuk" name="jalur_masuk">
							<option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
						</select>
                    </div>
                    <div>
                    	<button type="button" class="btn btn-primary bup" >Lihat Detail</button>
                	</div>
				</div>

                <div class="col" style="padding-left: 100px; padding-right: 100px;">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="status">Sudah Lulus Skripsi</label>
					</div>
                    <div class="col">
                        <div class="box" style="width: 200px; height: 200px; background-color: #EFEFEF;" >
                            <div style="margin-top: 25px;text-align:center; font-size: 75px;font-weight: 200;"> 
                                <h1> 60 </h1>
                            </div>
                            <div style="margin-bottom: 10px;text-align:center; font-size: 20px;font-weight: 200;"> 
                                <h1> Mahasiswa </h1>
                            </div>
                        </div>
                    </div>

				</div>
                <div class="col" style="padding-left: 100px; padding-right: 100px;">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="status">Belum Lulus Skripsi</label>
					</div>
                    <div class="col" >
                        <div class="box" style="width: 200px; height: 200px; background-color: #EFEFEF;" >
                            <div style="margin-top: 25px;text-align:center; font-size: 75px;font-weight: 200;"> 
                                <h1> 72 </h1>
                            </div>
                            <div style="margin-bottom: 10px;text-align:center; font-size: 20px;font-weight: 200;"> 
                                <h1> Mahasiswa </h1>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>    
    </div>
</div>

