<?php 
// session_start();
require 'includes/functions.php';

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password = md5($password);

check_login($email,$password);

?>