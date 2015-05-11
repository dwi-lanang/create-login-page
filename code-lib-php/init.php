<?php
require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR .'config.php' );
//KUMPULAN FUNGSI APLIKASI
require_once( BASE .'lib.php' );
//KUMPULAN FUNGSI APLIKASI AKSES DATABASE
require_once( BASE .'db.php' );
//DEKLASI VARIABLE TABLE DARI DATABASE
require_once( BASE .'table.php' );

//DEKLARASI CLASS `lib`
$app 	= new lib;
//DEKLARASI CLASS `db -> host, user, password untuk akses database dan nama database`
$db 	= new db(HOST, USER, PASSWORD, DATABASE);

?>