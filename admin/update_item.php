<?php 


require('includes/functions.php');


$id = $_GET['id'];

$data['item'] = $_POST['item'];

$data['price'] = $_POST['price'];

$data['image'] = $_FILES['image']['name'];
$data['cat_item'] =  $_POST['cat_item'];
 
$tmp_name = $_FILES['image']['tmp_name'];
 
$tmp_file_path = "uploads/";

$update = update_item($id,$data);
 

if($update){
	move_uploaded_file($tmp_name, $tmp_file_path);

	return header("Location:manage_item.php");
}


