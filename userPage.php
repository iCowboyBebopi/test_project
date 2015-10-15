<?php
session_start();

echo "Hello {$_SESSION['username']}";


echo "<a href='logout/logout.php'>LogOut</a>";