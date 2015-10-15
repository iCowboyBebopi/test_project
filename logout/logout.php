<?php

session_start();

//destroy session
session_destroy();

//unset session variables
$_SESSION = [];

header('location:../index/index.php');
?>