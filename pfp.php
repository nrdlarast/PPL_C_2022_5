<?php

// session_start();
if(!isset($_SESSION["login"]) ) {
    // header("Location: login.php");
    // exit;
}

?>
<?php
    // Include our login information
    require_once('db_login.php');
    
    $query = "SELECT * FROM mahasiswa 
    WHERE email='$_SESSION[email]'";
    $result = $db -> query($query);
    if (!$result){
        die ("Could not query the database: <br/>". $db->error ."<br>Query: ".$query);
    } else { 
        while ($row = $result->fetch_object()) {
            $foto = $row->foto;
            }
        }
            
?>

<img src="img/<?php echo $foto ?>" class="rounded darwin " alt="" height="200px" width="200px">
            <div class="col">
                <div class="d-flex justify-content-center tombol ">
                    <button type="button" class="btn bedit border border-secondary">Ganti</button>
                    <button type="button" class="btn bedit border border-secondary">Hapus</button>
                </div>
            
                <div class="d-flex justify-content-center">
                    <!-- <a href="srs10.php?id=<?= $row->ID ?>"> -->
                    <!-- <button onclick="location.href='srs10.php'" type="button" name="submit" value="submit" class="btn btn-primary bup"> Update</button> -->
                    <a class="btn btn-warning btn-sm" href="srs10.1.php?id=' . $row->ID.'">Update</a>&nbsp;&nbsp;
                    <!-- </a> -->
                    
                </div>
            </div>