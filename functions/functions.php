<?php
require '../con/con.php';
require_once '../vendor/autoload.php';

//set settings to email
function activate_male()
{
	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
	  ->setUsername('icowboybebopi@gmail.com')
	  ->setPassword('nR3say2210s5')
	  ;
	$mailer = Swift_Mailer::newInstance($transport);
	return $mailer;
}

//sendmail to confirm email
function ativation_email($email,$hash)
{
	$mailer = activate_male();
	$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array('icowboybebopi@gmail.com' => 'Piter inc'))
  ->setTo(array($email => "New fighter"))
  ->setBody("Hello stranger, to continue registration clisk the activation linck: http://localhost:8000/applyEmail/applyEmail.php?id=$hash")
  ;
  $result = $mailer->send($message);
} 

function lostpass_email($email, $name, $pass)
{
	$mailer = activate_male();
	$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array('icowboybebopi@gmail.com' => 'Piter inc'))
  ->setTo(array($email => "New fighter"))
  ->setBody("Hello $name, $here is your password: $pass")
  ;
  $result = $mailer->send($message);
}

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

