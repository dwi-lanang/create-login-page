<?php  
	session_start();

	ini_set("display_errors", 0);

	define('HOST', 'localhost'); //HOST DATABASE
	define('USER', 'root'); //USER DATABASE 
	define('PASSWORD', ''); //PASSWORD DATABASE 
	define('DATABASE', 'appdemo'); //NAMA DATABASE 
	define('PREFIX', 'app_'); //ALIAS ATAU AWALAN NAMA TABLE PADA DATABASE 

	define('BASE', dirname(__FILE__) . DIRECTORY_SEPARATOR); //FOLDER TEMPAT KUMPULAN CLASS BESERTA FUNGSI APLIKASI
	
?>