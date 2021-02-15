<?php 

require 'DB.php';

 

function create_user($post){
	if(insert_record('users',$post)){
	return true;
	}
	return false;
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


function get_search_order($data){
	global $db;

	$table = $data['table'];

	$query = "SELECT * FROM `orders` WHERE `table` LIKE '$table' ";
 
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
 echo $query;
 die();
 $query = $db->query($query);
 if($query){
 	return true;
 }
 else{
 	return false;
 }

}

function update_comments($data,$comment_id){
	if(update('comments',$data,"where id= $comment_id")){
		return true;
	}
	return false;
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
		return array();
	}
}


function get_table_detail(){
global $db;
	$query = "SELECT orders.id, orders.item_id,orders.qty,orders.table,orders.created_at,orders.order_key,menus.items,menus.price,menus.image from orders LEFT JOIN menus ON orders.item_id = menus.id ORDER BY orders.id DESC";
	
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

function get_order_detail(){
	global $db;

$user_id = $_SESSION['id'];
	$query = "SELECT * from orders where user_id = $user_id group by order_key";
	 
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



function get_order_key(){
	global $db;

$user_id = $_SESSION['id'];
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

function get_order_detail_time(){
	global $db;

	$user_id = $_SESSION['id'];
	$query = "SELECT orders.created_at from orders where user_id = $user_id group by created_at";
	 
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

function get_order_table_detail($data){
	global $db;


		 $table = $data['table'];
	 $date = $data['date']; 

	// $user_id = $_SESSION['id'];
	$query = "SELECT orders.id,orders.table,orders.qty,orders.created_at,menus.items,menus.price from orders LEFT JOIN menus ON orders.item_id = menus.id where (orders.table = '$table' AND orders.created_at = $date)";
	 
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


function get_all_order_pdf($id){
global $db;
	$query = "SELECT orders.id,orders.qty,orders.table,orders.item_id,orders.created_at,menus.items,menus.price,menus.image from orders LEFT JOIN menus ON orders.item_id = menus.id where orders.order_key = '$id' ORDER BY orders.created_at ";
	 
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


	$query ="UPDATE menus SET items = '$item', price = $price, image = '$image' WHERE id = $id";
 

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



 


