<?php
//update
if (!isset($_SESSION['nama_user'])) {
    header("location:login.php");
}
$connect = mysqli_connect("localhost", "root", "", "vaganza");
$aksi = $_GET['aksi'];
if ($aksi == 'barang') {
	$query = "UPDATE barang SET ".$_POST["name"]." = '".$_POST["value"]."' WHERE kd_barang = '".$_POST["pk"]."'";
	mysqli_query($connect, $query);
} elseif ($aksi == 'pembeli') {
	$query = "UPDATE pembeli SET ".$_POST["name"]." = '".$_POST["value"]."' WHERE id_pembeli = '".$_POST["pk"]."'";
	mysqli_query($connect, $query);
}
?>