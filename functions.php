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

    function ubah($data){
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
        $kota_kab = htmlspecialchars($data["kota_kab"]);
        $foto = htmlspecialchars($data["foto"]);
    
    
        $query = "UPDATE mahasiswa SET
                    nama = '$nama',
                    angkatan = '$angkatan',
                    jalur_masuk = '$jalur_masuk',
                    status_mahasiswa = '$status_mahasiswa',
                    email = '$email',
                    no_hp = '$no_hp',
                    alamat = '$alamat',
                    nama_provinsi = '$nama_provinsi',
                    kota_kab = '$kota_kab',
                    foto = '$foto'
                    WHERE nim = $nim
            ";
    
        mysqli_query($db,$query);
    
        return mysqli_affected_rows($db);
    }

    // function irs($data){
    //     global $db;
    
    //     $irs_id = htmlspecialchars($data["irs_id"]);
    //     $semester_aktif = htmlspecialchars($data["semester_aktif"]);
    //     $jumlah_sks = htmlspecialchars($data["jumlah_sks"]);
    
    
    //     $query = "INSERT INTO irs
    //     VALUES ('$irs_id','$semester_aktif','$jumlah_sks','')
    //         ";
    
    //     mysqli_query($db,$query);
    
    //     return mysqli_affected_rows($db);
    // }
