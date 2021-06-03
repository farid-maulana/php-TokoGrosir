<?php
spl_autoload_register(function($class){
	include "../class/".$class.".php";
});
$db = new class_function();
$data = $_POST['data'];
$tabel = $_POST['tabel'];
$aksi = $_GET['aksi'];

//umum
if($aksi=='tambah'){
	$db->insert($tabel['tabel'],$data);
	header("location:../index.php?menu=".$tabel['url']);
}
elseif($aksi == "update"){
 	$db->update($tabel['tabel'],$data, $tabel['field']." = '". $tabel['val'] ."'");
 	header("location:../index.php?menu=".$tabel['url']);
}

elseif ($aksi == 'tambah_barang') {
	if ($db->datawhere("barang","kd_barang='".$data['kd_barang']."'") == 0) {
		$db->insert($tabel['tabel'],$data);
		header("location:../index.php?menu=".$tabel['url']."&success");
	} else {
		mysql_query("UPDATE barang SET jumlah = jumlah + '".$data['jumlah']."' where kd_barang='".$data['kd_barang']."'");
		header("location:../index.php?menu=".$tabel['url']."&success");
	}
}

elseif ($aksi == 'tambah_pembeli') {
	if ($db->datawhere("pembeli","id_pembeli='".$data['id_pembeli']."'") == 0) {
		$db->insert($tabel['tabel'],$data);
		header("location:../index.php?menu=".$tabel['url']."&success");
	} else {
		header("location:../index.php?menu=".$tabel['url']."&failed");
	}
}

//checkbox
elseif (isset($_POST['hapuscheck'])) {
	$check = $_POST['dipilih'];
	$jml_check = count($check);
	for ($i=0; $i < $jml_check; $i++) { 
		$db->hapus($tabel['tabel'],$tabel['field'],$check[$i]);
	}
	if ($_POST['jrs'] = "jurusan") {
		header("location:../pages/admin/?page=".$tabel['url']."&jurusan=".$data['idj']."&kls=".$data['tingkatan']."&p_del");
	}else{
		header("location:../pages/admin/?page=".$tabel['url']."&p_del");
	}
}
elseif($aksi == "hapuscheck"){
	$check = $_POST['dipilih'];
	$jml_check = count($check);
	for($i=0; $i < $jml_check; $i++) { 
		$db->hapus($tabel['tabel'],$tabel['field'],$check[$i]);
	}
}

//cart
else if($aksi == 'cart'){
	if ($db->datawhere("cart","kd_barang='".$_GET['kd_barang']."'") == 0) {
		$ary = array("kd_barang"=>$_GET['kd_barang'],"jumlah"=>$data['jumlah']);
		$db->insert("cart",$ary);
	} else {
		mysql_query("UPDATE cart SET jumlah = jumlah + 1 where kd_barang='$_GET[kd_barang]'");
	}
}
else if ($aksi == 'hapuscart') {
	mysql_query("DELETE FROM cart WHERE kd_barang='".$_GET['kd']."'");
}

//transaksi
else if ($aksi == 'transaksi') {
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
	header("location:../invoice.php?no_nota=".$no_nota);
}
?>