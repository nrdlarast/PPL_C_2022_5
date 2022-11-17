<?php
include "db_login.php";
// echo 'test';
if (isset($_POST)) {
    // Query from database table irs, get the ips value
    // Find from id and semester
    $query = "SELECT * FROM irs WHERE irs_id = '$_POST[id]' AND semester_aktif = '$_POST[smt]'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
    } else {
        while ($row = $result->fetch_object()) {
            $ips = $row->ip_semester;
        }
        echo '<input class="form-control" id="ip_semester" type="text" name="ip_semester" value="' . $ips . '">';
    }
}
