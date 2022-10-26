<?php
require_once('db_login.php');
$id = $_GET['id'];



?>

<img src="img/darwin.jpg" class="rounded darwin " alt="" height="200px" width="200px">
            <div class="col">
                <div class="d-flex justify-content-center tombol ">
                    <button type="button" class="btn bedit border border-secondary">Ganti</button>
                    <button type="button" class="btn bedit border border-secondary">Hapus</button>
                </div>
            
                <div class="d-flex justify-content-center">
                    <a href="srs10.php?id=<?= $row->ID ?>">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary bup">Update</button>
                    </a>
                    
                </div>
            </div>