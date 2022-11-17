<?php 
    $db = mysqli_connect("localhost","root","","ppl");

    function query($query){
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[] =$row;
        }
        return $rows;
    }

    function cari($keyword){
        $query = "SELECT NIM,nama,status_irs,status_khs,status_pkl,status_skripsi,persetujuan,nama_doswal
        FROM irs INNER JOIN mahasiswa
        ON irs.id_mhs = mahasiswa.id_mhs INNER JOIN khs
        ON khs.id_mhs = mahasiswa.id_mhs INNER JOIN pkl
        ON pkl.id_mhs = mahasiswa.id_mhs INNER JOIN skripsi
        ON skripsi.id_mhs = mahasiswa.id_mhs WHERE 
                  nama LIKE '%$keyword%' OR
                  NIM LIKE '%$keyword%' ";
        return query($query);
    }

    function profil($data){
        global $db;
    
        $nim = $data["nim"];
        $nama = htmlspecialchars($data["nama"]);
        $angkatan = htmlspecialchars($data["angkatan"]);
        $jalur_masuk = htmlspecialchars($data["jalur_masuk"]);
        $status_mahasiswa = ($data["status_mahasiswa"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $nama_provinsi = htmlspecialchars($data["nama_provinsi"]);
    
    
        $query = "UPDATE mahasiswa SET
                    nama = '$nama',
                    angkatan = '$angkatan',
                    jalur_masuk = '$jalur_masuk',
                    status_mahasiswa = '$status_mahasiswa',
                    email = '$email',
                    no_hp = '$no_hp',
                    alamat = '$alamat',
                    nama_provinsi = '$nama_provinsi',
                    nama_kotakab = '$nama_kotakab',
                    WHERE nim = $nim
            ";
    
        mysqli_query($db,$query);

        //upload foto
        
        if(!file_exists($_FILES['nama_foto']['tmp_name']) || !is_uploaded_file($_FILES['nama_foto']['tmp_name'])) {
            echo"
              <script>
                  alert('data berhasil diubah!');
                  document.location.href='srs10.1.php';
              </script>
          ";

        } else {
            $direktori = "img/";
            $file_name = $_FILES['nama_foto']['name'];
            move_uploaded_file($_FILES['nama_foto']['tmp_name'],$direktori.$file_name);

            mysqli_query($db, "UPDATE mahasiswa SET foto = '$file_name'
                        WHERE nim = $nim
            ");
        }
        
        return mysqli_affected_rows($db);
    }
     
    // function foto($data){
    //     $direktori = "img/";
    //     $file_name = $_FILES['nama_foto']['name'];
    //     move_uploaded_file($_FILES['nama_foto']['tmp_name'],$direktori.$file_name);

    //     mysqli_query($db, "UPDATE mahasiswa SET foto = '$file_name'
    //                 WHERE nim = $nim
    //     ");
    // }

    function irs($data){
        global $db;
        
        //update data to database
        $irs_id = htmlspecialchars($data["irs_id"]);
        $semester_aktif = htmlspecialchars($data["semester_aktif"]);
        $jumlah_sks = htmlspecialchars($data["jumlah_sks"]);

        $query = "UPDATE irs SET 
            jumlah_sks = '$jumlah_sks'
            WHERE irs_id = $irs_id AND semester_aktif = $semester_aktif
        ";
    
        mysqli_query($db,$query);

        //upload file
        $direktori = "uploadIRS/";
        $file_name = $_FILES['nama_file']['name'];
        move_uploaded_file($_FILES['nama_file']['tmp_name'],$direktori.$file_name);

        mysqli_query($db, "UPDATE irs SET berkas_irs = '$file_name'
                    WHERE irs_id = $irs_id
        ");
    
        return mysqli_affected_rows($db);
    }

    function khs($data){
        global $db;
        
        //update data to database
        $irs_id = htmlspecialchars($data["irs_id"]);
        // $semester_aktif = htmlspecialchars($data["semester_aktif"]);
        // $jumlah_sks = htmlspecialchars($data["jumlah_sks"]);

        // $query = "UPDATE irs SET 
        //     jumlah_sks = '$jumlah_sks'
        //     WHERE irs_id = $irs_id AND semester_aktif = $semester_aktif
        // ";
    
        // mysqli_query($db,$query);

        //upload file
        $direktori = "uploadKHS/";
        $file_name = $_FILES['nama_file_khs']['name'];
        move_uploaded_file($_FILES['nama_file_khs']['tmp_name'],$direktori.$file_name);

        mysqli_query($db, "UPDATE irs SET berkas_khs = '$file_name'
                    WHERE irs_id = $irs_id
                    ");
    
        return mysqli_affected_rows($db);
    }

    function pkl($data){
        global $db;
    
        $pkl_id = htmlspecialchars($data["pkl_id"]);
        $status_pkl = htmlspecialchars($data["status_pkl"]);
        $nilai = htmlspecialchars($data["nilai"]);

        $query = "UPDATE pkl SET 
            status_pkl = '$status_pkl',
            nilai = '$nilai'
            WHERE pkl_id = $pkl_id
        ";
    
        mysqli_query($db,$query);
    
        //upload file
        $direktori = "uploadPKL/";
        $file_name = $_FILES['nama_file']['name'];
        move_uploaded_file($_FILES['nama_file']['tmp_name'],$direktori.$file_name);

        mysqli_query($db, "UPDATE pkl SET berkas_pkl = '$file_name'
                    WHERE pkl_id = $pkl_id
        ");

        return mysqli_affected_rows($db);
    }

    function skripsi($data){
        global $db;
    
        $skripsi_id = htmlspecialchars($data["skripsi_id"]);
        $status_skripsi = htmlspecialchars($data["status_skripsi"]);
        $nilai = htmlspecialchars($data["nilai"]);

        $query = "UPDATE skripsi SET 
            status_skripsi = '$status_skripsi',
            nilai = '$nilai'
            WHERE skripsi_id = $skripsi_id
        ";
    
        mysqli_query($db,$query);

        //upload file
        $direktori = "uploadSKRIPSI/";
        $file_name = $_FILES['nama_file']['name'];
        move_uploaded_file($_FILES['nama_file']['tmp_name'],$direktori.$file_name);

        mysqli_query($db, "UPDATE skripsi SET berkas_skripsi = '$file_name'
                    WHERE skripsi_id = $skripsi_id
        ");
    
        return mysqli_affected_rows($db);
    }

    function tambahData($data){
        global $db;
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $status_mahasiswa = htmlspecialchars($data["status_mahasiswa"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $angkatan = htmlspecialchars($data["angkatan"]);
        $jalur_masuk = htmlspecialchars($data["jalur_masuk"]);
        $foto = htmlspecialchars($data["nama_foto"]);
        $ipk = htmlspecialchars($data["ipk"]);
        $email_dosenwali = htmlspecialchars($data["email_dosenwali"]);
        $email_dosenpkl = htmlspecialchars($data["email_dosenpkl"]);
        $email_dosenskripsi = htmlspecialchars($data["email_dosenskripsi"]);
        $kelurahan_id = htmlspecialchars($data["kelurahan"]);
        $irs_id = htmlspecialchars($data["irs_id"]);
        $khs_id = htmlspecialchars($data["khs_id"]);
        $pkl_id = htmlspecialchars($data["pkl_id"]);
        $skripsi_id = htmlspecialchars($data["skripsi_id"]);
        $password = htmlspecialchars($data["password"]);
        $peran = htmlspecialchars($data["peran"]);
        $query = "INSERT INTO mahasiswa
                VALUES (
                    '$nim','$nama','$email','$status_mahasiswa','$alamat','$no_hp','$angkatan','$jalur_masuk','$foto','$ipk','$email_dosenwali','$email_dosenpkl','$email_dosenskripsi','$kelurahan_id','$irs_id','$khs_id','$pkl_id','$skripsi_id'
                )";
        // mysqli_query($db,$query)
        $query1 = "INSERT INTO user
                VALUES (
                    '$nama','$email','$password','$peran'
                )";
        // mysqli_query($db,$query)
        $result = $db -> query($query);
        $result1 = $db -> query($query1);
        return mysqli_affected_rows($db);
    
        $direktori = "img/";
        $file_name = $_FILES['nama_foto']['name'];
        move_uploaded_file($_FILES['nama_foto']['tmp_name'],$direktori.$file_name);
    
        mysqli_query($db, "UPDATE mahasiswa SET foto = '$file_name'
                    WHERE nim = $nim
        ");
    }