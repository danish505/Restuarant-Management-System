<?php 

require 'DB.php';

 

function create_user($post){
	if(insert_record('users',$post)){
	return true;
	}
	return false;
}
function get_order_key(){
	global $db;

// $user_id = $_SESSION['id'];
	$query = "SELECT orders.order_key from orders group by order_key";
	 
			$query = $db->query($query);
	if($query->num_rows > 0){
		$result = array();
		while($data= $query->fetch_assoc()){
			$result[] = $data;
		}
		return $result;
	}
	else{
		return false;
	}
}

function get_order_time(){
	global $db;

$user_id = $_SESSION['id'];
	$query = "SELECT orders.created_at from orders group by created_at";
	 
			$query = $db->query($query);
	if($query->num_rows > 0){
		$result = array();
		while($data= $query->fetch_assoc()){
			$result[] = $data;
		}
		return $result;
	}
	else{
		return false;
	}
}

function get_all_order_a($id){
global $db;
	$query = "SELECT orders.id,orders.table,orders.qty,orders.created_at,menus.items,menus.price from orders LEFT JOIN menus ON orders.item_id = menus.id where orders.order_key = '$id' ORDER BY orders.created_at ";
	 
	$query = $db->query($query);
	if($query->num_rows > 0){
		$result = array();
		while($data= $query->fetch_assoc()){
			$result[] = $data;
		}
		return $result;
	}
	else{
		return array();
	}
}

function insert_order($dat){

global $db;

$items = $dat['items'];
// echo $items;
$qty = $dat['qty'];
$table = $dat['table'];
$created_at = $dat['created_at'];
$order_key = $dat['order_key'];


$query = "INSERT INTO orders (item_id, `qty`, `table`, `created_at`, `order_key`) VALUES
(`$items`,`$qty`,`$table`,$created_at,$order_key)";
 
 die();
 $query = $db->query($query);
 if($query){
 	return true;
 }
 else{
 	return false;
 }

}

function get_order(){

	global $db;
$data['date1'] = date('Y-10-01');
$data['date1'] = strtotime($data['date1']);

$data['date2'] = date('Y-m-30');
$data['date2'] = strtotime($data['date2']);

	$sql = "SELECT menus.price FROM menus LEFT JOIN orders on orders.item_id = menus.id where orders.created_at BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
	 
	$sql = $db->query($sql);
	if($sql->num_rows > 0){
		$result = array();
		while($data= $sql->fetch_assoc()){
			$result[] = $data;
		}

		return $result;
	}
	else
	{
		return array();
	}


}

function update_comments($data,$comment_id){
	if(update('comments',$data,"where id= $comment_id")){
		return true;
	}
	return false;
}



function search_order($data){
	
	// $date1 = $data['date1'];
	// $date2 = $data['date2'];
		
		global $db;
	$sql ="SELECT orders.id,menus.id,menus.items,orders.table,orders.qty,menus.price,orders.created_at FROM orders LEFT JOIN menus ON menus.id=orders.item_id WHERE orders.created_at BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";

	
	
	$sql = $db->query($sql);
	
	if($sql->num_rows > 0){
		$result = array();
		while($data= $sql->fetch_assoc()){
			$result[] = $data;
		}

		return $result;
		die();
	}
	else
	{
		return array();
	}

}


function getall_comment_details($limit=50){
	
	global $db;

	$query = "SELECT comments.id as id,comments.title,comments.comment,comments.user_id,comments.rating,comments.status,comments.created_at,users.id,users.table as table,users.username FROM comments LEFT JOIN users ON comments.user_id = users.id where comments.status=1 ORDER BY comments.created_at DESC limit $limit";
	
	$query = $db->query($query);
	if($query->num_rows > 0){
		$result = array();
		while($data= $query->fetch_assoc()){
			$result[] = $data;
			
		}
		
		return $result;
	}
	else
	{
		return false;
	}
}

function get_all_order_detail(){
	global $db;
	$query = "SELECT orders.id,orders.qty,orders.table,orders.created_at,orders.order_key,menus.items,menus.price,menus.image from orders LEFT JOIN menus ON orders.item_id = menus.id ORDER BY orders.created_at";

	$query = $db->query($query);
	if($query->num_rows > 0){
		$result = array();
		while($data= $query->fetch_assoc()){
			$result[] = $data;
		}
		return $result;
	}
	else{
		return false;
	}
}


function get_order_detail(){
	global $db;
	$query = "SELECT * from orders group by order_key";
	$query = $db->query($query);
	if($query->num_rows > 0){
		$result = array();
		while($data= $query->fetch_assoc()){
			$result[] = $data;
		}
		return $result;
	}
	else{
		return false;
	}
}


function get_item_category(){
global $db;
	$query = "SELECT cat_item from menus group by cat_item";
	$query = $db->query($query);
	if($query->num_rows > 0){
		$result = array();
		while($data= $query->fetch_assoc()){
			$result[] = $data;
		}
		return $result;
	}
	else{
		return false;
	}

}


function get_all_order_pdf($id){
global $db;
	$query = "SELECT orders.id,orders.table,orders.item_id,orders.qty,orders.created_at,menus.items,menus.price,menus.image from orders LEFT JOIN menus ON orders.item_id = menus.id where orders.order_key = '$id' ORDER BY orders.created_at ";
	 
	$query = $db->query($query);
	if($query->num_rows > 0){
		$result = array();
		while($data= $query->fetch_assoc()){
			$result[] = $data;
		}
		return $result;
	}
	else{
		return false;
	}
}




function update_item($id,$data){
	global $db;
	$item = $data['item'];
	$price = $data['price'];
	$image = $data['image'];
	$cat_item  = $data['cat_item'];


	$query ="UPDATE menus SET items = '$item', price = $price, image = '$image' , cat_item = '$cat_item' WHERE id = $id";
 

	$query = $db->query($query);
	
	if($query){
		return true;
	}
	else{
		return false;
	}

}







function check_login($table,$password){

	global $db;

 $query="SELECT * FROM admin WHERE table = '$table' AND password = '$password'";
	
	$query = $db->query($query);
	$rows = mysqli_fetch_array($query,MYSQLI_ASSOC); 

	$count = mysqli_num_rows($query);
	if($rows>0){
	
	$_SESSION['table'] = $table;
	header('location: dashboard.php');
	}
	else{

	header('location: ../login.php');

	}
}

function search_comments($title,$status,$rating){

	global $db;

	 $query = "SELECT comments.id,comments.title,comments.comment,comments.status,comments.created_at,users.id as userid,users.table  FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE status = $status and title LIKE '%$title%' and rating LIKE '%$rating%'";

	$query = $db->query($query);

	if($query){
		$result = array();

		while ($data = $query->fetch_assoc()) {
			$result[] = $data;
		}
		return $result;
	}
	else{
		return array();
	}
}

function paginate($limit){


	global $db;
	$query ="SELECT count(comments.id) FROM comments";
	$query = $db->query($query);
	
			// $result = array();
	if($query){

		$row = $query->fetch_row();
		$total_records = $row[0];
		$total_pages = ceil($total_records/$limit);

		$paglink = "<ul class='pagination'>";
		for($i=1; $i<=$total_pages; $i++){
			$paglink .= "<li class='page-item'><a class='page-link' href='manage_comments.php?page=".$i."'>".$i."</a></li>";
		}
		echo $paglink . "</ul>";
	 
}
}


function show_star($rating){
	if($rating==5){
		echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
	}
	else if($rating==4){
		echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star lightgray'></i>";
	}
	else if($rating==3){
		echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star lightgray'></i><i class='fa fa-star lightgray'></i>";
	}
	else if($rating==2){
		echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star lightgray'></i><i class='fa fa-star lightgray'></i><i class='fa fa-star lightgray'></i>";
	}
	else if($rating==1 or $rating==0 or $rating==""){
		echo "<i class='fa fa-star'></i><i class='fa fa-star lightgray'></i><i class='fa fa-star lightgray'></i><i class='fa fa-star lightgray'></i><i class='fa fa-star lightgray'></i>";
	}
}

function logout(){
  $_SESSION = array();
	session_destroy();

	header('location: login.php');
	exit();
}



 


