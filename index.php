<?php 
	include "code-lib-php/init.php";
	
	$app = new lib;

	$data_users = $app->get_session("users");

	if($app->req("act") == "login")
	{
			if($app->validate("username,password"))
			{
				$app->direct("index.php");
				exit;
			}
			
			$username = $app->req("username");
			$password = $app->req("password");
			
			$param = array("table"=>USERS, "where"=>"username='". $username ."' AND password='". $password ."'");
			if($db->nr($param) > 0)
			{
				$data = $db->find($param);
				$app->set_session("users",$data);
				
				$app->direct("index.php");
			}
			else
			{
				echo "Data tidak sesuai.";
			}
	}
	elseif($app->req("act") == "logout")
	{
		$app->unset_session("users");
		$app->direct("index.php");
	}
	else
	{
		if(!empty($data_users))
		{
			echo "Login berhasil.";
			echo "\n\r";
			echo "<a href='index.php?act=logout'>Logout</a>";
		}
		else
		{
			$pesan_usr = $app->get_msg("username");
			$pesan_psw = $app->get_msg("password");

			include "login.html";
		}
		
	}
	
?>