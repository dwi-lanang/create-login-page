<?php 
class lib{
	var $caption;
	function run($acc = 0)
    {
		if($acc == 0) echo "Library berhasil terkoneksi.";
    }
    //REQUEST VARIABLE
	function req($name)
    {
		if($name) return $_REQUEST[$name];
        else return $_REQUEST;
    }
    
    //SESSION
    function get_session($name)
    {
    	if(isset($_SESSION) AND !empty($_SESSION[$name]))
    	{
    		return $_SESSION[$name];
    	}
		else
		{
			return null;
		}
    }
    function set_session($name,$param)
    {
    	$_SESSION[$name] = $param;
    }
    function unset_session($name)
    {
    	unset($_SESSION[$name]);
    }
    function direct($location)
    {
		header("location: ". $location);
    }
    
    //MESSAGE
	function get_msg($param)
    {
		$out = null;
		if(!empty($_SESSION['error_message']))
        {
			$out = ucwords($_SESSION['error_message'][$param]);
        }
        else
        {
			$this->reset_msg($param);
        }
		$this->reset_msg($param);
		return $out;
    }
	function set_msg($param,$komen,$acc = true)
    {
		$_SESSION['error_message'][$param] = ($acc==true?$param . " ":null). $komen;
    }
    function reset_msg($param)
    {
		$_SESSION['error_message'][$param] = null;
    }
	function build_msg($nama,$pesan){
		$this->set_msg($nama,$pesan,false);
	}
    
    //VALIDATE
    function validate($param){
		$fields = explode(',',$param);
		if(count($fields) > 0){
			foreach($fields as $field){
				if(empty($_POST[$field])){
					$this->set_msg($field,"harus di isi.");
					$acc_ = true;
				}else{
					$field = null;
					$this->reset_msg($field);
					$acc_ = false;
				}
			}
			return $acc_;
		}else{
			return false;
		}
	}
	function save_file($filename, $folder)
	{
		//$new_name = strtoupper(md5(uniqid(rand(), true))) . substr($_FILES[$filename]['name'], -4, 4);

		if (!@copy($_FILES[$filename]['tmp_name'], $folder.'/'. $_FILES[$filename]['name'])){
			$this->build_msg('upload',"Upload gagal.");
		}
		return $_FILES[$filename]['name'];
	}
	public function set_caption($caption){
		$this->caption = $caption;
	}
	public function get_caption(){
		return $this->caption;
	}
}
?>