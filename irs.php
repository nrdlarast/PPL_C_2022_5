<?php
include "db_login.php";
// echo 'test';
if (isset($_POST)) {
    // Query from database table irs, get the sks value
    // Find from id and semester
    $query = "SELECT * FROM irs WHERE irs_id = '$_POST[id]' AND semester_aktif = '$_POST[smt]'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
    } else {
        while ($row = $result->fetch_object()) {
            $sks = $row->jumlah_sks;
        }
        echo '<input class="form-control" id="jumlah_sks" type="text" name="jumlah_sks" value="' . $sks . '">';
    }
}
