<?php 
include "db_login.php";
if (isset($_POST["input"])){

    $input = $_POST["input"];
    $no = 1;
    $query = "SELECT * FROM mahasiswa
            WHERE nama LIKE '{$input}%' OR
            nim LIKE '{$input}%'";
    $result = mysqli_query($db,$query);

    if(mysqli_num_rows($result) >0 ){?>

        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>More</th>
            </tr>
        <?php
        while($row = mysqli_fetch_assoc($result)){ 
            $nama = $row['nama'];
            $nim = $row['nim'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $nim; ?></td>
                <td>
                    <a class="button" href="srs8.3.php?nim=<?= $row['nim']; ?>">More</a>
                </td>
            </tr>
        <?php } ?>
    </table>
        
    <?php
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }
}
    ?>