<?php
require '../functions/functions.php';
session_start();
$conn = db_connect();

// chek sent data or not
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

// do only when ol input have value
if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])){
//search data in db
$row1 = db_get_regInfo("SELECT login FROM registInfo WHERE login LIKE :login",
                            array('login'=>$_POST['login']),$conn);
if($row1){
    $status1 = "login: {$_POST['login']}. All ready exist";
}

$row2 = db_get_regInfo("SELECT email FROM registInfo WHERE login LIKE :email",
                            array('email'=>$_POST['email']),$conn);

//validate email adrres
$validateEmail = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);

if(!$validateEmail){
    $status2_1 = "Enter the correct email adress please";
}

if($row2){
    $status2 = "email: {$_POST['email']}. All ready exist";
}
//if not same value than writ into the database
if (!isset($status1) && !isset($status2) && !isset($status2_1))
{
    $row = db_insert_regInfo("INSERT INTO registInfo(login,password,email,date) VALUES(:login,:password,:email,NOW())",
                            array('login'=>$_POST['login'],
                                  'password'=>$_POST['password'],
                                  'email'=>$_POST['email']),
                                   $conn);
    $_SESSION['username'] = $_POST['login'];
    activation_email($_POST['email']);
    header('location:../activationPage.php');
}
}
}

require 'registrate.tmpl.php';
?>
