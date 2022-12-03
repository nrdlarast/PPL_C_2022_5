<?php include'header.html' ?>
<?php
session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
<?php error_reporting(0) ?>
  <div class="row">
    <div class="col-sm">
    <?php include 'navbaradmin.php' ?>
    </div>
    <?php include 'dosen.php' ?>

   