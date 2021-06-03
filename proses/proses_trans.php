<?php
spl_autoload_register(function($class){
	include"../class/".$class.".php";
});
$db = new class_function();
$id_pembeli=$_POST['id_pembeli'];
$no_nota=$_POST['no_nota'];
$tgl_transaksi=$_POST['tgl_transaksi'];
$pic=$_POST['pic'];
$total = $_POST['total'];
$query=mysql_query("insert into transaksi values('$no_nota','$id_pembeli','$tgl_transaksi',$total,'$pic')");

foreach ($_POST['count'] as $key => $hitung) {
	$kd_barang=$_POST['kd_barang'.$hitung];
	$jumlah=$_POST['jumlah'.$hitung];
	$subtotal=$_POST['subtotal'.$hitung];
	mysql_query("INSERT INTO detail_transaksi(no_nota,kd_barang,jumlah,total_harga) VALUES ('$no_nota','$kd_barang',$jumlah,$subtotal)");
	
	mysql_query("UPDATE barang SET jumlah=jumlah-$jumlah WHERE kd_barang='$kd_barang'");

	mysql_query("TRUNCATE TABLE cart");
}
header("location:invoice.php");
?>