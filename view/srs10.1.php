<?php include'header.html' 
?>
<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
<?php
    // Include our login information
    require_once('db_login.php');
    $query = "SELECT * FROM mahasiswa
    join kelurahan on mahasiswa.kelurahan_id = kelurahan.kelurahan_id
    join kecamatan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
    join kota_kab on kecamatan.kode_kotakab = kota_kab.kode_kotakab
    join provinsi on kota_kab.kode_provinsi = provinsi.kode_provinsi
    WHERE email='$_SESSION[email]'";
    $result = $db -> query($query);
    if (!$result){
        die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
    } else { 
        while ($row = $result->fetch_object()) {
            $nama = $row->nama; 
            $nim = $row->nim; 
            $email = $row->email;
            $no_hp = $row->no_hp;
            $ipk = $row->ipk;
            $foto = $row->foto;
            $jalur_masuk = $row->jalur_masuk;
            $angkatan = $row->angkatan;
            $status_mahasiswa = $row->status_mahasiswa;
            $alamat = $row->alamat;
            $nama_kotakab = $row->nama_kotakab;
            $nama_provinsi = $row->nama_provinsi;
            $kecamatan = $row->kecamatan;
            $kelurahan = $row->kelurahan;
            $kode_pos = $row->kode_pos; 
            }
        }
     
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
                    <!-- <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id=' .$id; ?>"></form> -->
                <img src="img/<?php echo $foto ?>" class="darwin " alt="" height="200px" width="200px" style="border-radius: 20px">
					<div class="col" style="margin-top: 10px;margin-bottom: 10px;">
                        <label for="status">IPK</label>
                        <textarea class="form-control" id="ipk" name="ipk" rows="1" cols="10" readonly style="font-size: 85px;text-align: center;min-height: calc(1.5em + (.75rem + 2px));"><?php echo $ipk;?></textarea>
                        <div class="error"><?php if(isset($error_ipk)) echo $error_ipk;?></div>
                    </div>
                    <div>
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" id="status" value="<?php echo $status_mahasiswa; ?>" readonly>
                        <div class="error"><?php if (isset($error_status)) echo $error_status;?></div>
					</div>
				</div>

                <div class="col-4">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="status">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" readonly>
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
					</div>
                    <div class="col form-group">
                        <label for="status">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>" readonly>
                        <div class="error"><?php if(isset($error_nim)) echo $error_nim;?></div>
                    </div>
                    <div class="col form-group">
                        <label for="status">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" id="angkatan" value="<?php echo $angkatan; ?>"readonly>
                        <div class="error"><?php if (isset($error_angkatan)) echo $error_jangkatan;?></div>
                    </div>
				</div>
                <div class="col-5" style="padding-left: 40px;">
					<div class="col" style="margin-top: 25px;margin-bottom: 10px;">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>"readonly>
                        <div class="error"><?php if(isset($error_email)) echo $error_email;?></div>
					</div>

                    <div class="form-group col">
                        <label for="nohandphone">No.Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>"readonly>
                        <div class="error"><?php if(isset($error_no_hp)) echo $error_no_hp;?></div>
                    </div>

                    <div class="form-group col">
                        <label for="jalur_masuk">Jalur Masuk</label>
                        <input type="text" class="form-control" name="jalur_masuk" id="jalur_masuk" value="<?php echo $jalur_masuk; ?>"readonly>
                        <div class="error"><?php if (isset($error_jalur_masuk)) echo $error_jalur_masuk;?></div>
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
                        <label for="address">Address: </label>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label for="address">Provinsi:</label>
                    </div>
				</div>
                <div class="col-5">
                    <div class="form-group">
                        <textarea class="form-control" id="alamat" name="alamat" rows="5" readonly><?php echo $alamat;?></textarea>
                        <div class="error"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" value="<?php echo $nama_provinsi; ?>"readonly>
                        <div class="error"><?php if (isset($error_nama_provinsi)) echo $error_nama_provinsi;?></div>
                    </div>
				</div>
                <div class="col-sm offset-1">
                    <div class="form-group">
                        <label for="address">Kota/Kabupaten:</label>
                        <input type="text" class="form-control" id="nama_kotakab" name="nama_kotakab" value="<?php echo $nama_kotakab; ?>"readonly>
                        <div class="error"><?php if (isset($error_nama_kotakab)) echo $error_nama_kotakab;?></div>
                    </div>
                    <div class="form-group">
                        <label for="address">Kecamatan:</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $kecamatan; ?>"readonly>
                        <div class="error"><?php if (isset($error_kecamatan)) echo $error_kecamatan;?></div>
                    </div>
                    <div class="form-group">
                        <label for="address">Kelurahan:</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo $kelurahan; ?>"readonly>
                        <div class="error"><?php if (isset($error_kelurahan)) echo $error_kelurahan;?></div>
                    </div>
                    <div class="form-group">
                        <label for="address">Kode Pos:</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo $kode_pos; ?>"readonly>
                        <div class="error"><?php if (isset($error_kode_pos)) echo $error_kode_pos;?></div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input = $(this).val();
            // alert(input);

            if(input != ""){
                $.ajax({
                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                    }
                });
            } else{
                $("#searchresult").css("display","none");
            }
        });
    });
</script>