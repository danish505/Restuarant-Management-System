<?php 
require('includes/functions.php');


$data['price'] = $_POST['price'];
$data['items'] = $_POST['item'];
// $data['email'] = $_POST['email'];

$data['image'] = $_FILES['image']['name'];

$tmp_name = $_FILES['image']['tmp_name'];

$ext = explode('.',$data['image']);
$ext = strtolower(end($ext));

$key = md5(uniqid());
$tmp_file_name = "{$key}.{$ext}";
$tmp_file_path = "uploads/{tmp_file_name}";

 
$run_funct = insert_record('menus',$data);

if($run_funct){

move_uploaded_file($tmp_name, $tmp_file_path);
header("location:manage_item.php");

}





?>