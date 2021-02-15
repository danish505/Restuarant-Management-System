 <?php

 require 'includes/functions.php';

$id = $_GET['id'];

$data = array(
'items'=>$_POST['items'],
'qty'=>$_POST['qty'],
'order_key'=> $id,
'xm_id'=>$_POST['x_id']
);

$items = $_POST['items'];
$qty = $_POST['qty'];

$data_lenght = count($items); 
 
$m_items = "items";
$m_qty = "qty";

 
for($i = 0; $i < $data_lenght; $i++){

	print_r($data['xm_id'][$i]);
	$sql = "UPDATE orders SET item_id =".$data[$m_items][$i].", qty=".$data[$m_qty][$i]." WHERE order_key ='".$data['order_key']."' AND id='".$data['xm_id'][$i]."'";
 	
	$db_result = mysqli_query($db, $sql);

}
	// die();
 


if($db_result){
	header('location:manage_order.php');
}
else{
	echo 'error occurred';
}
