<?php
require '../functions/functions.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$conn = db_connect();
	$match = db_get_regInfo("SELECT email,login,password,activation FROM registInfo WHERE email=:email",array('email'=>$_POST['email']),$conn);

	if ($match)
	{
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
			lostPass_email($_POST['email'],$username,$password);
			$status2 = "We sent a message. Chek your email.";
		}
	}else $status = "Unregistred Email";	
}

require 'forgotPass.tmpl.php';
?>