<?php
require '../functions/functions.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
	//connecting to db
	$conn = db_connect();
	//serch matching email 
	$match = db_get_regInfo("SELECT email,login,password,activation FROM registInfo WHERE email=:email",array('email'=>$_POST['email']),$conn);



	if ($match)
	{
		//search for unconfirm email
		foreach ($match as $key) 
		{
			if($key['activation']==NULL)
			{
				$status1 = "Please confirm you email address";
			}
		}	
		if(!$status1)
		{
			foreach ($match as $key) {
				$username = $key['login'];
				$password = $key['password'];
			}
			//sent lost password to email
			lostpass_email($_POST['email'],$username,$password);
			$status2 = "We sent a message. Chek your email.";
		}
	}else $status = "Unregistred Email";	
}

require 'forgotPass.tmpl.php';
?>