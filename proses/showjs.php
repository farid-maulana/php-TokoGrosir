<?php
spl_autoload_register(function($class){
	include"../../class/".$class.".php";
});
$db = new class1();
$aksi = $_GET['act'];
if ($aksi == "kelas") {
	$count = 0;
	if ($db->datawhere("kelas","idj = '".$_GET['val']."'") != "") {
		foreach ($db->datawhere("kelas","idj = '".$_GET['val']."'") as $d) {
			$count+=1;
?>
	<tr>
		<th style="width: 10px"><input type="checkbox" class="flat-red"  name="dipilih[]" value="<?php echo $d['nama']; ?>"></th>
		<td><?php echo $count; ?></td>
		<td><?php echo $d['nama'];?></td>
	    <td><input type="text" name="wali_kelas<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['wali_kelas'];?>"></td>
	    <td><?php echo $d['tingkatan'];?></td>
        <input type="hidden" name="nama<?php echo $count; ?>" value="<?php echo $d['nama'] ?>">
	    <input name="row[]" value="<?php echo $count; ?>" type="hidden">
   	    <input type="hidden" name="tabel[field]" value="nama">
		<input type="hidden" name="tabel[tabel]" value="kelas">
		<input type="hidden" name="tabel[url]" value="kelas">
        <input type="hidden" name="tabel[akses]" value="admin">
	</tr>
<?php
		}
	}else{
?>
		<tr class="odd">
			<td valign="top" align="center" colspan="5" class="dataTables_empty">No data available in table</td>
		</tr>
<?php 
	}
} elseif ($aksi == "lab") {
	$count = 0;
	if ($db->datawhere("ruangan","idj = '".$_GET['val']."'") != "") {
		foreach ($db->datawhere("ruangan","idj = '".$_GET['val']."'") as $d) {
			$count+=1;
?>
	<tr>
		<th style="width: 10px"><input type="checkbox" class="flat-red"  name="dipilih[]" value="<?php echo $d['id']; ?>"></th>
		<td><?php echo $count; ?></td>
	    <td><input type="text" name="nama<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['nama'];?>"></td>
	    <td><input type="text" name="kapasitas<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['kapasitas'];?>"></td>
		<td><input type="text" name="jml_alt<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['jml_alt'];?>"></td>
        <input type="hidden" name="id<?php echo $count; ?>" value="<?php echo $d['id'] ?>">
	    <input name="row[]" value="<?php echo $count; ?>" type="hidden">
   	    <input type="hidden" name="tabel[field]" value="id">
		<input type="hidden" name="tabel[tabel]" value="ruangan">
		<input type="hidden" name="tabel[url]" value="lab">
        <input type="hidden" name="tabel[akses]" value="admin">
	</tr>
<?php
		}
	}else{
?>
		<tr class="odd">
			<td valign="top" align="center" colspan="5" class="dataTables_empty">No data available in table</td>
		</tr>
<?php 
	}
} elseif ($aksi == "inventaris") {
	$count = 0;
	if ($db->datawhere("inventaris","idj = '".$_GET['val']."'") != "") {
		foreach ($db->datawhere("inventaris","idj = '".$_GET['val']."'") as $d) {
			$count+=1;
?>
	<tr>
		<th style="width: 10px"><input type="checkbox" class="flat-red"  name="dipilih[]" value="<?php echo $d['no_reg']; ?>"></th>
		<td><?php echo $count; ?></td>
		<td><?php echo $d['no_reg']; ?></td>
	    <td><input type="text" name="nama<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['nama'];?>"></td>
	    <td><input type="text" name="tempat<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['tempat'];?>"></td>
		<td><input type="text" name="jumlah<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['jumlah'];?>"></td>
		<td><input type="text" name="tgl_beli<?php echo $count ;?>" class="form-control datepicker" style="border:none;;" value="<?php echo $d['tgl_beli'];?>"></td>
        <input type="hidden" name="no_reg<?php echo $count; ?>" value="<?php echo $d['no_reg'] ?>">
	    <input name="row[]" value="<?php echo $count; ?>" type="hidden">
   	    <input type="hidden" name="tabel[field]" value="no_reg">
		<input type="hidden" name="tabel[tabel]" value="inventaris">
		<input type="hidden" name="tabel[url]" value="inventaris">
        <input type="hidden" name="tabel[akses]" value="admin">
	</tr>
<?php
		}
	}else{
?>
		<tr class="odd">
			<td valign="top" align="center" colspan="5" class="dataTables_empty">No data available in table</td>
		</tr>
<?php 
	}
} elseif ($aksi == "guru") {
	$count = 0;
	if ($db->data("guru") != "") {
		foreach ($db->data("guru") as $d) {
			$count+=1;
?>
	<tr>
		<th style="width: 10px"><input type="checkbox" class="flat-red"  name="dipilih[]" value="<?php echo $d['nip']; ?>"></th>
		<td><?php echo $count; ?></td>
		<td><?php echo $d['nip']; ?></td>
	    <td><input type="text" name="nama<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['nama'];?>"></td>
	    <td><input type="text" name="alamat<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['alamat'];?>"></td>
        <input type="hidden" name="nip<?php echo $count; ?>" value="<?php echo $d['nip'] ?>">
	    <input name="row[]" value="<?php echo $count; ?>" type="hidden">
   	    <input type="hidden" name="tabel[field]" value="nip">
		<input type="hidden" name="tabel[tabel]" value="guru">
		<input type="hidden" name="tabel[url]" value="guru">
        <input type="hidden" name="tabel[akses]" value="admin">
	</tr>
<?php
		}
	}else{
?>
		<tr class="odd">
			<td valign="top" align="center" colspan="5" class="dataTables_empty">No data available in table</td>
		</tr>
<?php 
	}
} elseif ($aksi == "mapel") {
	$count = 0;
	if ($db->data("mapel") != "") {
		foreach ($db->data("mapel") as $d) {
			$count+=1;
?>
	<tr>
		<th style="width: 10px"><input type="checkbox" class="flat-red"  name="dipilih[]" value="<?php echo $d['kode']; ?>"></th>
		<td><?php echo $count; ?></td>
		<td><?php echo $d['kode']; ?></td>
	    <td><input type="text" name="nama<?php echo $count ;?>" class="form-control" style="border:none; width:100%;" value="<?php echo $d['nama'];?>"></td>
        <input type="hidden" name="kode<?php echo $count; ?>" value="<?php echo $d['kode'] ?>">
	    <input name="row[]" value="<?php echo $count; ?>" type="hidden">
   	    <input type="hidden" name="tabel[field]" value="kode">
		<input type="hidden" name="tabel[tabel]" value="mapel">
		<input type="hidden" name="tabel[url]" value="mapel">
        <input type="hidden" name="tabel[akses]" value="admin">
	</tr>
<?php
		}
	}else{
?>
		<tr class="odd">
			<td valign="top" align="center" colspan="5" class="dataTables_empty">No data available in table</td>
		</tr>
<?php 
	}
} elseif($aksi == "history"){
	$count = 0;
	if($db->data("history") != 0){
		foreach($db->data("history") as $d){
			$count += 1;
?>
	<tr>
		<th style="width: 10px"><input type="checkbox" class="flat-red"  name="dipilih[]" value="<?php echo $d['no']; ?>"></th>
		<td><input type="text" name="tahun<?php echo $count ;?>" class="form-control" style="border:none;" value="<?php echo $d['tahun'];?>"></td>
		<td><input type="text" name="nama<?php echo $count ;?>" class="form-control" style="border:none;" value="<?php echo $d['nama'];?>"></td>
		<td><textarea name="deskripsi<?php echo $count ;?>" class="form-control" style="border:none; resize:none; width:100%"><?php echo $d['deskripsi'];?></textarea></td>
		<input type="hidden" name="no<?php echo $count ;?>" class="form-control" style="border:none;" value="<?php echo $d['no'];?>">
		<input name="row[]" value="<?php echo $count; ?>" type="hidden">
		<input type="hidden" name="tabel[field]" value="no">
		<input type="hidden" name="tabel[tabel]" value="history">
		<input type="hidden" name="tabel[url]" value="history">
	</tr>
<?php
		}
	}else{
?>
		<tr class="odd">
			<td valign="top" align="center" colspan="5" class="dataTables_empty">No data available in table</td>
		</tr>
<?php 
	}
} elseif($aksi == "user"){
	$count = 0;
	if($db->datawhere("admin","level='jurusan'") != 0){
		foreach($db->datawhere("admin","level='jurusan'") as $d){
			 $count += 1;
?>
	<tr>
		<th style="width: 10px"><input type="checkbox" class="flat-red"  name="dipilih[]" value="<?php echo $d['id']; ?>"></th>
		<td><textarea name="nama<?php echo $count ;?>" class="form-control" style="border:none; resize:none; width:100%"><?php echo $d['nama'];?></textarea></td>
		<td><input type="text" name="username<?php echo $count ;?>" class="form-control" style="border:none;" value="<?php echo $db->decryptIt($d['username']);?>"></td>
		<td><input type="password" name="password<?php echo $count ;?>" class="form-control" style="border:none;" value="<?php echo $db->decryptIt($d['password']);?>"></td>
		<input type="hidden" name="id<?php echo $count ;?>" class="form-control" style="border:none;" value="<?php echo $d['id'];?>">
		<input name="row[]" value="<?php echo $count; ?>" type="hidden">
		<input type="hidden" name="tabel[field]" value="id">
		<input type="hidden" name="tabel[tabel]" value="admin">
		<input type="hidden" name="tabel[url]" value="user">
	</tr>
<?php
		}
	}else{
?>
		<tr class="odd">
			<td valign="top" align="center" colspan="5" class="dataTables_empty">No data available in table</td>
		</tr>
<?php 
	}
} 
?>
