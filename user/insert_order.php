<?php 

require 'includes/functions.php';

$tbl_name = $_POST['table'];

$data = array(
'items'=>$_POST['items'],
'qty'=>$_POST['qty'],
'date'=> strtotime($_POST['date']),

'order_key'=> $_POST['order_key']
);
 
 

$data_lenght = count($data['items']);
 

// print_r($data['items'][1]);
// print_r($data['qty']);
// print_r($data['dates']);
// print_r($data['tbl_name']);
// print_r($data['order_key']);
// echo $data_lenght;


$m_items = "items";
$m_qty = "qty";

session_start();
for ($i = 0; $i < $data_lenght; $i++) {


	$sql = "INSERT INTO `orders`(`item_id`,  `qty`, `table`, `user_id`,`created_at`, `order_key`) VALUES ('".$data[$m_items][$i]."','".$data[$m_qty][$i]."','".$tbl_name."','".$_SESSION['id']."','".$data['date']."','".$data['order_key']."')";
	 
	$db_result = mysqli_query($db, $sql);

	 
}
 

if($db_result){
	header('location:manage_order.php');
}
else{
	echo 'error occurred';
}

