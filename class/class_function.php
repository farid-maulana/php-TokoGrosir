<?php
	class class_function{
		
		//buka koneksi
		public function __construct(){
			$koneksi = mysqli_connect('localhost', 'root', '') or die("gagal connect");
			mysqli_select_db($koneksi, "vaganza");
		}

		//show data
		public function data($tabel) {
			$data = mysqli_query("select * from $tabel");
			$row = mysqli_num_rows($data);
			while($d = mysqli_fetch_array($data)) {
				$hasil[] = $d;
			}
			if ($row >= 1) {
				return $hasil;
			}
		
		}
		public function datawhere($table,$where){
			//print_r("SELECT * from ".$table." WHERE ".$where);
			//die();
			$query = mysqli_query("SELECT * from ".$table." WHERE ".$where);
			if ($query) {
				$row = mysqli_num_rows($query);
				while($d = mysqli_fetch_array($query)) {
					$hasil[] = $d;
				}
				if ($row >= 1) {
					return $hasil;
				}
			}else{
			}
		}
		
		//insert
		public function insert($tabel,$data){
			$fields = "(";
			$values = "(";
			$index = 0;
			foreach($data as $key=>$val) {
				$fieldname = ($index < count($data)-1) ? $key . " , " : $key . ")";
				$valuedata = ($index < count($data)-1) ? "'" .$val . "' , " : "'" . $val . "')";
			
				$fields .= $fieldname;
				$values .= $valuedata;
				$index++;
			}
			$query = "insert into " . $tabel . "  " .$fields . " values " . $values . " ";
			// print_r($query);
			// die();
			mysqli_query($query);
		}
		
		//delete
		public function hapus($tabel,$baris,$id){
			$data = mysqli_query("delete from $tabel where $baris='$id'");
		}
	
		//update
		public function update($table , $data , $where){
			foreach ( $data as $kolom => $row ){
				$set[]= $kolom."='".$row."'" ;
			}
			$set = implode(',',$set);
			$query1 = "UPDATE ".$table." SET ".$set." WHERE ".$where ;
			mysqli_query($query1);
		}

		//format tanggal	
		function tanggal($tanggal, $cetak_hari = false){
			$hari = array (1=>	'Senin',
								'Selasa',
								'Rabu',
								'Kamis',
								'Jumat',
								'Sabtu',
								'Minggu'
					);
			$bulan = array (1=> 'Januari',
								'Februari',
								'Maret',
								'April',
								'Mei',
								'Juni',
								'Juli',
								'Agustus',
								'September',
								'Oktober',
								'November',
								'Desember'
					);
			$split 	  = explode('/', $tanggal);
			$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
			if ($cetak_hari) {
				$num = date('N', strtotime($tanggal));
				return $hari[$num] . ', ' . $tgl_indo;
			}
			return $tgl_indo;
		}

		//Penghitungan rows
		function sumrows($tabel,$where){
			$query = mysqli_query("SELECT * from ".$tabel." WHERE ".$where);
			if ($query != "") {
				$row = mysqli_num_rows($query);
				if ($row >= 1) {
					return $row;
				}else{
					return $row;
				}
			}else{
				echo 0;
			}
		}
		function sumtbl($tabel){
			$query = mysqli_query("SELECT * from ".$tabel);
			if ($query != "") {
				$row = mysqli_num_rows($query);
				if ($row >= 1) {
					return $row;
				}else{
					return $row;
				}
			}else{
				echo 0;
			}
		}
		
		//ecrypsi
		function encryptIt( $q ) {
			$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
			$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
			return( $qEncoded );
		}

		function decryptIt( $q ) {
			$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
			$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
			return( $qDecoded );
		}
		
		//chart
		function jumlah($awal,$akhir,$table,$where){
			$query = mysqli_query("SELECT * from ".$table." where ".$where." BETWEEN  '".$awal."' AND  '".$akhir."'");
			$rs = mysqli_num_rows($query);
			if($rs != 0){
				while($rs){
					return $rs;
				}
			} else {
				$rs = 0;
				return $rs;
			}
		}
		function Total($tahun,$table,$where){
			$data = array(
				$this->jumlah($tahun.'-01-01',$tahun.'-01-31',$table,$where),
				$this->jumlah($tahun.'-02-01',$tahun.'-02-31',$table,$where),
				$this->jumlah($tahun.'-03-01',$tahun.'-03-31',$table,$where),
				$this->jumlah($tahun.'-04-01',$tahun.'-04-31',$table,$where),
				$this->jumlah($tahun.'-05-01',$tahun.'-05-31',$table,$where),
				$this->jumlah($tahun.'-06-01',$tahun.'-06-31',$table,$where),
				$this->jumlah($tahun.'-07-01',$tahun.'-07-31',$table,$where),
				$this->jumlah($tahun.'-08-01',$tahun.'-08-31',$table,$where),
				$this->jumlah($tahun.'-09-01',$tahun.'-09-31',$table,$where),
				$this->jumlah($tahun.'-10-01',$tahun.'-10-31',$table,$where),
				$this->jumlah($tahun.'-11-01',$tahun.'-11-31',$table,$where),
				$this->jumlah($tahun.'-12-01',$tahun.'-12-31',$table,$where)
			);
			echo  $json_encode = json_encode($data);
		}
		function Sum($awal,$akhir,$table,$where){
			$query = mysqli_query("SELECT * from ".$table." where ".$where." BETWEEN  '".$awal."' AND  '".$akhir."'");
			$rt = mysqli_num_rows($query);
			if($rt != 0){
				while($rt){
					return $rt;
				}
			} else {
				$rt = 0;
				return $rt;
			}
		}
		function bulan($tahun,$table,$where,$bulan){
			$a = array(
				$this->Sum($tahun.'-'.$bulan.'-01 00:00:00',$tahun.'-'.$bulan.'-01 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-02 00:00:00',$tahun.'-'.$bulan.'-02 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-03 00:00:00',$tahun.'-'.$bulan.'-03 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-04 00:00:00',$tahun.'-'.$bulan.'-04 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-05 00:00:00',$tahun.'-'.$bulan.'-05 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-06 00:00:00',$tahun.'-'.$bulan.'-06 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-07 00:00:00',$tahun.'-'.$bulan.'-07 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-08 00:00:00',$tahun.'-'.$bulan.'-08 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-09 00:00:00',$tahun.'-'.$bulan.'-09 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-10 00:00:00',$tahun.'-'.$bulan.'-10 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-11 00:00:00',$tahun.'-'.$bulan.'-11 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-12 00:00:00',$tahun.'-'.$bulan.'-12 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-13 00:00:00',$tahun.'-'.$bulan.'-13 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-14 00:00:00',$tahun.'-'.$bulan.'-14 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-15 00:00:00',$tahun.'-'.$bulan.'-15 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-16 00:00:00',$tahun.'-'.$bulan.'-16 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-17 00:00:00',$tahun.'-'.$bulan.'-17 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-18 00:00:00',$tahun.'-'.$bulan.'-18 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-19 00:00:00',$tahun.'-'.$bulan.'-19 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-20 00:00:00',$tahun.'-'.$bulan.'-20 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-21 00:00:00',$tahun.'-'.$bulan.'-21 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-22 00:00:00',$tahun.'-'.$bulan.'-22 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-23 00:00:00',$tahun.'-'.$bulan.'-23 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-24 00:00:00',$tahun.'-'.$bulan.'-24 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-25 00:00:00',$tahun.'-'.$bulan.'-25 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-26 00:00:00',$tahun.'-'.$bulan.'-26 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-27 00:00:00',$tahun.'-'.$bulan.'-27 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-28 00:00:00',$tahun.'-'.$bulan.'-28 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-29 00:00:00',$tahun.'-'.$bulan.'-29 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-30 00:00:00',$tahun.'-'.$bulan.'-30 23:59:59',$table,$where),
				$this->Sum($tahun.'-'.$bulan.'-31 00:00:00',$tahun.'-'.$bulan.'-31 23:59:59',$table,$where),
			);
			echo  $json_encode = json_encode($a);
		}
		function report($table,$where,$between){
			$query = mysqli_query("SELECT * from ".$table." where sn='".$where."' AND scan_date BETWEEN  '".$between."'");
			$mesin = mysqli_num_rows($query);
			if($mesin != 0){
				while($mesin){
					return $mesin;
				}
			} else {
				$mesin = 0;
				return $mesin;
			}
		}
		function mesin($table,$between){
			foreach($this->data("device_app") as $d){
				$a[] = $this->report($table,$d['sn'],$between);
			}
			$m = $a;
			echo  $json_encode = json_encode($m);
		}
		function jumlah_inven($table,$kolom,$kolom2){
			//print_r("SELECT SUM(".$kolom.") from ".$table." group by ".$kolom2);
			//die();
			$query = mysqli_query("SELECT SUM(".$kolom.") from ".$table."group by ".$kolom2);
			if ($query) {
				$row = mysqli_num_rows($query);
				while($d = mysqli_fetch_array($query)) {
					$hasil[] = $d;
				}
				if ($row >= 1) {
					return $hasil;
				}
			}else{
			}
		}
	}
?>