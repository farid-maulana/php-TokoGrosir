<?php
spl_autoload_register(function($class){
	include"class/".$class.".php";
});
$db = new class_function();
	if(isset($_POST['submit'])){
		if(empty($_POST['username']) || empty($_POST['password'])){
			echo "error";
		}
		else{
			$pass = $db->encryptIt($_POST['password']);
			$user = $db->encryptIt($_POST['username']);
			$pass = mysql_real_escape_string($pass);
			$user = mysql_real_escape_string($user);
			if ($db->datawhere("admin","password='".$pass."' AND binary username ='".$user."'") != "") {
				foreach ($db->datawhere("admin","password='".$pass."' AND binary username ='".$user."'") as $a);
				$_SESSION['nama_user'] = $a['nama'];
					header('location:index.php');
					exit();
			}
		}
	}
?>