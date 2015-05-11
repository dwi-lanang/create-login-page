<?php 
class db{

	function __construct($host, $user, $password, $database) {
		$conn = mysql_connect($host, $user, $password);
		mysql_select_db( $database , $conn);
		if (!$conn) {
		   echo "Tidak dapat konek ke DB: " . mysql_error();
		   exit;
		}
		if (!mysql_select_db($database)) {
		   echo "Tidak dapat memilih database ". $database .": " . mysql_error();
		   exit;
		}
	}
	/*function connect()
    {
		$koneksi = mysql_connect(HOST, USER, PASSWORD);
		mysql_select_db( DATABASE , $koneksi);
		if (!$koneksi) {
		   echo "Tidak dapat konek ke DB: " . mysql_error();
		   exit;
		}
		if (!mysql_select_db(DATABASE)) {
		   echo "Tidak dapat memilih database ". DATABASE .": " . mysql_error();
		   exit;
		}
    }*/
    function query($query)
    {
		return @mysql_query($query);
    }
    function fetch($res){
    	return @mysql_fetch_assoc($res);
    }
    function num_rows($res){
    	return @mysql_num_rows($res);
    }
	function find($param)
    {
		$SQL 	= "SELECT * FROM  ". $param['table'] ." WHERE ". $param['where'] ." LIMIT 1";
		$RES 	= $this->query($SQL);
		$ROW 	= $this->fetch($RES);

		return $ROW;
    }
    function nr($param)
    {
		$SQL 	= "SELECT * FROM  ". $param['table'] ." WHERE ". $param['where'] ."";
		$RES 	= $this->query($SQL);
		$NUM 	= $this->num_rows($RES);

		return $NUM;
    }
    function look($param)
    {
        $where = null;
        if($param['where']) $where = "WHERE ". $param['where'];
        
		$SQL 	= "SELECT ". $param['field'] ." FROM  ". $param['table'] ." ". $where ." LIMIT 1";
		$RES 	= $this->query($SQL);
		$ROW 	= $this->fetch($RES);

		return $ROW[$param['field']];
    }
}
?>