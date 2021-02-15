<?php
require 'admin/includes/functions.php';
 
@$p_id   = trim($_REQUEST['p_id']);
//$_SESSION['product_cart'] = array();

     @$quantity = $_REQUEST['quantity'];
     if(!empty($p_id)){
         $query = "select * from menus where id = '".$p_id."'";
        
         $rs = mysqli_query($db,$query) or die("failed".mysql_error());
         // $quantity = $_POST['quantity'];
         $product_data = mysqli_fetch_assoc($rs);

         $product = array("id"=>$product_data['id'],"item"=>$product_data['items'],"price"=>$product_data['price'],"image"=>$product_data['image'],"quantity"=>$quantity);
        
        if(isset($_SESSION['product_cart']) && !empty($_SESSION['product_cart']))
        {
            if(!array_key_exists($product_data['id'],$_SESSION['id']))
            {
           
                $_SESSION['product_cart'][$product_data['id']] = $product;
            }
            else{
                
                $_SESSION['product_cart'][$product_data['id']]['price'] = $_SESSION['product_cart'][$product_data['id']]['price'] + ($product_data['product_price']*$quantity);
                $_SESSION['product_cart'][$product_data['id']]['quantity'] = $_SESSION['product_cart'][$product_data['id']]['quantity']+$quantity;
            }        
        }
        else{
          $_SESSION['product_cart'][$product_data['id']] = $product;
        }
    }    

// if($action == "delete"){
//     unset($_SESSION['product_cart'][$p_id]);
// }

// if($action == "empty"){
//     session_destroy();
// }
?>

<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="cart.png" style="width:40px" > <?php echo count(@$_SESSION['product_cart']); ?> - Items<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-cart" role="menu">


          <?php

          $users = get_record('users');
          if(isset($_SESSION['product_cart'])){
          foreach($_SESSION['product_cart'] as $data){
            // print_r($data);
          ?>
            <form method="post" action="insert_cart.php">
              <li>
                  <span class="item">
                    <span class="item-left" style="color:#0000" >
                        <img src="img/<?php echo $data['image']; ?>" alt="" style="width:60px;" /><br/>
                        <span class="item-info" style="color:#000;" >
                            <span><?php echo $data['item']; ?></span>
                            <input type="hidden" name="item_id[]" value="<?= $data['id'];?>"/>
                           <br/> <span>Quantity : <?php echo $data['quantity']; ?></span>
                            <input type="hidden" name="quantity[]" value="<?= $data['quantity'];?>"/>
                           <br/> <span>Price : <?php echo $data['price']; ?> PKR</span>
                          <label>Waiter</label>
                          <select name="user_id">
                            <?php foreach($users as $user): ?>
                            <option value="<?= $user['id'];?>"><?= $user['username'];?></option>
                        <?php endforeach; ?>
                          </select>
                          
                          
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right" onclick="remove_cart('<?php echo $data['p_id']; ?>')" >x</button>
                    </span>
                </span>
              </li>
                            <li> <select name="user">
                                <option value="Table1">Table1</option>
                                <option value="Table2">Table2</option>
                                <option value="Table3">Table3</option>
                                <option value="Table4">Table4</option>
                                <option value="Table5">Table5</option>
                                <option value="Table6">Table6</option>
                                </select>
                                </li>
              <li class="divider"></li>

              <li><button class="c-btn c-btn--success text-center order" type="submit">Place Order</button></li>
          </form>
              <li><a class="text-center" href="#"  onclick="empty_cart();" >Empty Cart</a></li>
          <?php }  } ?>
