<?php
require '../con/con.php';

// function to conect ouwer database
function db_connect()
{
	//filter ouer conection, if wrong path haw a nise massege about it
	try{
		$conn = new PDO('mysql:host=localhost;dbname=usersinfo',DB_USERNAME,DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conn;
	}catch (Exception $e){
		return false;
	}
}

// insert data to the database
function db_insert_regInfo($query,$binding,$conn)
{
	$stmt = $conn->prepare($query);
	$stmt->execute($binding);
}

//get rows from database
function db_get_regInfo($query,$binding,$conn)
{
	$stmt = $conn->prepare($query);
	$stmt->execute($binding);
	$row = $stmt->fetchAll();
	return $row ? $row : false;
}

//validation users data
function validate_userData($name,$password)
{
	if ($name !== $key['login'] && $password !== $key['password'])
	{
		$status = 'Wrong login or password';
	}
	return $status ? $status : false;
}

//sent avtivation email
function activation_email($email)
{
	$headers  = "Content-type: text/html; charset=UTF-8" . "\r\n";
	$headers .= "From: Activation apply <icowboybebopi@gmail.com>\r\n"; 
	$subject = "Activation email address";
	$massege = "To activate your email click the linck below. <br>
				<a href = 'http://localhost:8000/index/index.php'>Apply</a>";
	mail($email, $subject, $massege,$headers);
}
?>