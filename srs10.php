<?php include'header.html' 

// require_once('db_login.php');
// $id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

// $query = " SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid ";
//                     $result = $db->query($query);

// if (!$result) {
//     die("Could not the query the database: <br />" . $db->error . "<br>Query: " . $query);
// }
// $i = 1;
// while ($row = $result->fetch_object())

?>
<div class="container">
    <?php include 'navbarmhs.php' ?>
  <div class="row">
    <div class="col-sm">
    <div class="flex flex-col items-center h-full overflow-hidden border-r border-grey-400 text-gray-700" style="border-color: black;">
		</div>
	</div>

    </div>
        <div class="col">
        <div class="roq">
            <div class="batas">
                <h1>Profil Akun</h1>
            </div>
        </div>
        <div class="">
            <div class="row "style=" font-size: 20px;font-weight: 200; padding-left: 40px; padding-top: 20px; padding-bottom: 30px;" >
                <div class="col-2">
                    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id=' .$id; ?>"></form>
                <img src="img/darwin.jpg" class="darwin " alt="" height="200px" width="200px" style="border-radius: 20px">
					<div class="col" style="margin-top: 10px;margin-bottom: 10px;">
                        <label for="status">IPK</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="status">Status</label>
                        <select class="form-select" id="status" name="status">
                        <option selected>Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="cuti">Cuti</option>
				        </select>
					</div>
				</div>

                <div class="col-4">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="status">Nama Lengkap</label>
        		        <input type="text" id="nama" name="nama"class="form-control" value="<?php echo $name;?>">
					</div>
                    <div class="col form-group">
                        <label for="status">NIM</label>
                        <input type="text" id="nim" name="nim"class="form-control" >
                    </div>
                    <div class="col form-group">
                        <label for="status">Angkatan</label>
                            <select class="form-select" id="angkatan" name="angkatan" >
                                <option selected>Angkatan</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                    </div>
				</div>
                <div class="col-5" style="padding-left: 40px;">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                        <small class="form-text text-danger" id="email_error"></small>
					</div>

                    <div class="form-group col">
                        <label for="nohandphone">No.Handphone</label>
                        <input type="text" class="form-control" name="nohandphone" id="nohandphone">
                        <small class="form-text text-danger" id="nohandphone_error"></small>
                    </div>

                    <div class="form-group col">
                        <label for="jalur_masuk">Jalur Masuk</label>
                        <select class="form-control" id="jalur_masuk" name="jalur_masuk">
                            <option value="">-- pilih jalur masuk --</option>
                            <option value="sbmptn">SBMPTN</option>
                            <option value="mandiri">MANDIRI</option>
                            <option value="snmptn">SNMPTN</option>
                        </select>
                        <!-- <small class="form-text text-danger" id="jalur_masuk_error"></small> -->
                    </div>
				</div>
            </div>
            <div class="border-bottom"></div>
        </div>
        <div class="col-10">
        <div class="roq">
            <div class="batas">
                <h1>Alamat</h1>
            </div>
        </div>
        <div class="">
            <div class="row "style=" font-size: 20px;font-weight: 200; padding-left: 40px;" >
                <div class="col-2">
                    <div class="form-group">
                        <label for="address">Alamat asal:</label>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label for="address">Provinsi:</label>
                    </div>
				</div>
                <div class="col-5">
                    <div class="form-group">
                        <textarea class="form-control" id="address" name="address" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="provinsi" id="provinsi">
                    </div>
				</div>
                <div class="col-sm offset-1">
                    <div class="form-group">
                        <label for="address">Kota/Kabupaten:</label>
                        <input type="text" class="form-control" name="kotakabupaten" id="kotakabupaten">
                    </div>
                    <div class="form-group">
                        <label for="address">Kecamatan:</label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                    </div>
                    <div class="form-group">
                        <label for="address">Kelurahan:</label>
                        <input type="text" class="form-control" name="kelurahan" id="kelurahan">
                    </div>
                    <div class="form-group">
                        <label for="address">Kode Pos:</label>
                        <input type="text" class="form-control" name="kodepos" id="kodepos">
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>

