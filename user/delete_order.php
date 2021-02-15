<?php 
 require('includes/functions.php');
$id = $_GET['id'];
 
$remove_data = remove_where('orders',$id);
header('location: manage_order.php');

?>