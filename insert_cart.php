<?php 


require 'admin/includes/functions.php';


$tbl_name = $_POST['user'];
// $email = $_POST['email'];
$user_id = $_POST['user_id'];
$data = array(
'items'=>$_POST['item_id'],
'qty'=>$_POST['quantity'],
'dates'=>strtotime(date('Y-m-d')),
'order_key'=> uniqid()
);

 
$data_lenght= count($data['items']);
 

// print_r($data['items'][1]);
// print_r($data['qty']);
// print_r($data['dates']);
// print_r($data['tbl_name']);
// print_r($data['order_key']);
// echo $data_lenght;


$m_items = "items";
$m_qty = "qty";



 

for ($i = 0; $i < $data_lenght; $i++){

	$sql = "INSERT INTO orders (`item_id`, `user_id`, `qty`, `table`, `created_at`, `order_key`) VALUES ('".$data[$m_items][$i]."','".$user_id."','".$data[$m_qty][$i]."','".$tbl_name."','".$data['dates']."','".$data['order_key']."')";

 
	
	$db_result = mysqli_query($db, $sql);

}
	

if($db_result){
session_start();
	$_SESSION['success'] = "Order Placed successfully";
	header('location:index.php');
}
else{
	echo 'error occurred';
}
 

 
// $insert = insert_cart($data)