<?php 

require 'includes/functions.php';

$id = $_GET['id'];
$remove = remove_menus($id);
if($remove){
	header('Location:manage_item.php');
}
else{
	echo "error occurred";
}