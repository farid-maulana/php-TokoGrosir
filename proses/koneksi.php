<?php
$ip=$_SERVER['HTTP_HOST'];
$url='http://'.$ip.'/proyek4/admin/';
mysql_connect('localhost','root','');
mysql_select_db('sekolah');
error_reporting(E_ALL ^ E_NOTICE);
?>