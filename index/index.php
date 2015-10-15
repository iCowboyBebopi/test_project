<?php
require '../functions/functions.php';

session_start();

$conn = db_connect();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$login=trim($_POST['name']);
	$password=trim($_POST['password']);
	
	$row = db_get_regInfo("SELECT login,password,activation FROM registInfo WHERE login LIKE :login AND password LIKE :pas",
							array('login'=>$login, 'pas'=>$password),$conn);

	
	if($row)
	{
		foreach ($row as $key) {
			if($key['activation']==NULL){
				$status1 = "Please confirm you email address";
			}
		}	
		if(!$status1){
			$_SESSION['username'] = $_POST['name'];
			header('location:../userPage.php');
		}
	}else $status = 'Wrong login or password';
	
}


require '../index.tmpl.php';
?>