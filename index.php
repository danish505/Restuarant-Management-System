<?php include('header.php'); 
session_start();
// $db=mysqli_connect("localhost","root","","ras");

require 'admin/includes/functions.php';

if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "itemid");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'itemid'        =>   $_GET["id"],  
                     'item_name'     =>   $_POST["item_name"],  
                     'item_price'    =>   $_POST["item_price"],  
                     'item_quantity' =>   $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script> alert("Item Already Added") </script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'itemid'              =>      $_GET["id"],  
                'item_name'           =>      $_POST["item_name"],  
                'item_price'          =>      $_POST["item_price"],  
                'item_quantity'       =>      $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"])){  
      if($_GET["action"] == "delete"){  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["itemid"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }
      if($_GET["action"] == "place_order"){

        
        $data['item_id'] = $_POST['item_id'];
        $data['qty'] = $_POST['qty'];
        $data['created_at'] = strtotime(date('Y-m-d h:i'));
        $tbl_name = $_POST['tbl_name'];
        $order_key = uniqid();
        $user_id= 2;
 
        $data_lenght= count($data['item_id']);
        
        $m_items = "item_id";
        $m_qty = "qty";

        for ($i = 0; $i < $data_lenght; $i++){

    $sql = "INSERT INTO orders (`item_id`, `user_id`, `qty`, `table`, `created_at`, `order_key`) VALUES ('".$data[$m_items][$i]."','".$user_id."','".$data[$m_qty][$i]."','".$tbl_name."','".$data['created_at']."','".$order_key."')";
        echo $sql;
       
    $db_result = mysqli_query($db, $sql);

}
 
 if($db_result){
// session_start();
    // $_SESSION['success'] = "Order Placed successfully";
    session_destroy();
    header('location:index.php');
}
else{
    echo 'error occurred';
}
 
        
      }  
        
 }  
 ?>  


<div id="hero-slider" class="owl-carousel">
    <div class="slides one"></div>
    <div class="slides two"></div>
    <div class="slides three"></div>
    <div class="slides four"></div>
</div>


<section class="cart_box">
<div class="container">
    
<form class="c-table-responsive@wide" method="post" action="index.php?action=place_order">
<br/>
   <div class="row">
    <div class="col-md-6">
    <Select class="c-select" name="tbl_name">
        <option value="table1">table1</option>
        <option value="table2">table2</option>
        <option value="table3">table3</option>
        <option value="table4">table4</option>
        <option value="table5">table5</option>
    </Select>
</div>
 
</div>
    <br>
    <br>
<table class="c-table">
    <thead class="c-table__head">
        <tr class="c-table__row">
            <th class="c-table__cell c-table__cell--head">Item id</th>
            <th class="c-table__cell c-table__cell--head">Item Name</th>
            <th class="c-table__cell c-table__cell--head">Item Quantity</th>
            <th class="c-table__cell c-table__cell--head">Price</th>
            <th class="c-table__cell c-table__cell--head">Action</th>
        </tr>
    </thead>
    <tbody>
            <?php  if(isset($_SESSION['shopping_cart'])):?>
                <?php foreach($_SESSION['shopping_cart'] as $key):?>
        <tr class="c-table__row">
            <td class="c-table__cell"><?= $key['itemid'];?>
            <input type="hidden" name="item_id[]" value="<?= $key['itemid'];?>"/></td>
            <td class="c-table__cell"><?= $key['item_name'];?></td>
            <td class="c-table__cell"><?= $key['item_quantity'];?>
            <input type="hidden" name="qty[]" value="<?= $key['item_quantity']?>"/></td>
            <td class="c-table__cell"><?= $key['item_price'];?></td>
            <td class="c-table__cell">
     <a class="c-btn c-btn--danger" href="index.php?action=delete&id=<?php echo $key['itemid']; ?>">
                <i class="fa fa-trash"></i></a>
            </td>
        
        </tr>
        <?php endforeach; endif; ?>

    </tbody>

    <tr class="c-table__row">

        <th class="c-table__cell c-table__cell--head " colspan="5">Total Price = 
          <?php 
        $total = 0;
        if(isset($_SESSION['shopping_cart'])):
        foreach($_SESSION['shopping_cart'] as $key):
           $total += $key['item_price'] * $key['item_quantity'];
        endforeach;
      else:
        echo "cart is empty";
       endif;

        echo $total;
        ?></th>
    
    </tr>

    <tr class="c-table__row">
        <th class="c-table__cell c-table__cell--head">
          <input type="submit" name="place_order" value="place order" class="c-btn c-btn--success"/></th>
    </tr>

</table>
</form>
</div>
</section>



<section class="menu-section">
    <div class="container">
        <h3>Pizza</h3>
            <div class="row">
                <?php
                $query = "select * from menus where cat_item='pizza'";
                $rs = mysqli_query($db,$query) or die("failed".mysql_error());
                while($dat = mysqli_fetch_assoc($rs)){
                ?>
                <div class="col-md-3">
                    <form method="post" action="index.php?action=add&id=<?= $dat['id'];?>">
                        <div class="menu-item">
                            <input type="hidden" name="item_id" value="<?= $dat['id'];?>">
                            <div class="item-img">
                                <img src="img/<?= $dat['image'];?>" alt="">
                                <input type="hidden" name="item_img" value="<?= $dat['image'];?>">
                            </div>
                            <div class="item-name">
                                <h5>
                                    <?= $dat['items']; ?>
                                    <input type="hidden" name="item_name" value="<?= $dat['items']; ?>">
                                </h5>
                            </div>
                            <div class="item-price">
                                <h6>
                                    <?= $dat['price']; ?>
                                    <input type="hidden" name="item_price" value="<?= $dat['price']; ?>">
                                </h6>

                            </div>

                            <input type="number" min="1" max="10" value="1" placeholder="Quantity" name="quantity" class="c-input quantity" />
                            <div class="item-cart-btn">
                                <button type="submit" name="add_to_cart" value="add to cart" class="c-btn c-btn--primary" ><i
                                        class="fa fa-shopping-cart"></i> Add To Orders</button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php }?>
            </div>
                <h3 class="c-text-center">Burger</h3>
            <div class="row">

                <?php
                $query = "select * from menus where cat_item='burger'";
                $rs = mysqli_query($db,$query) or die("failed".mysql_error());
                while($dat = mysqli_fetch_assoc($rs)){
                ?>
                <div class="col-md-3">
                    <form method="post" action="index.php?action=add&id=<?= $dat['id'];?>">
                        <div class="menu-item">
                            <input type="hidden" name="item_id" value="<?= $dat['id'];?>">
                            <div class="item-img">
                                <img src="img/<?= $dat['image'];?>" alt="">
                                <input type="hidden" name="item_img" value="<?= $dat['image'];?>">
                            </div>
                            <div class="item-name">
                                <h5>
                                    <?= $dat['items']; ?>
                                    <input type="hidden" name="item_name" value="<?= $dat['items']; ?>">
                                </h5>
                            </div>
                            <div class="item-price">
                                <h6>
                                    <?= $dat['price']; ?>
                                    <input type="hidden" name="item_price" value="<?= $dat['price']; ?>">
                                </h6>

                            </div>

                            <input type="number" min="1" max="10" value="1" placeholder="Quantity" name="quantity" class="c-input quantity" />
                            <div class="item-cart-btn">
                                <button type="submit" name="add_to_cart" value="add to cart" class="c-btn c-btn--primary" ><i
                                        class="fa fa-shopping-cart"></i> Add To Orders</button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php }?>
            </div>
            <h3 class="c-text-center">Cold Drinks</h3>
             <div class="row">

                <?php
                $query = "select * from menus where cat_item='drink'";
                $rs = mysqli_query($db,$query) or die("failed".mysql_error());
                while($dat = mysqli_fetch_assoc($rs)){
                ?>
                <div class="col-md-3">
                    <form method="post" action="index.php?action=add&id=<?= $dat['id'];?>">
                        <div class="menu-item">
                            <input type="hidden" name="item_id" value="<?= $dat['id'];?>">
                            <div class="item-img">
                                <img src="img/<?= $dat['image'];?>" alt="">
                                <input type="hidden" name="item_img" value="<?= $dat['image'];?>">
                            </div>
                            <div class="item-name">
                                <h5>
                                    <?= $dat['items']; ?>
                                    <input type="hidden" name="item_name" value="<?= $dat['items']; ?>">
                                </h5>
                            </div>
                            <div class="item-price">
                                <h6>
                                    <?= $dat['price']; ?>
                                    <input type="hidden" name="item_price" value="<?= $dat['price']; ?>">
                                </h6>

                            </div>

                            <input type="number" min="1" max="10" value="1" placeholder="Quantity" name="quantity" class="c-input quantity" />
                            <div class="item-cart-btn">
                                <button type="submit" name="add_to_cart" value="add to cart" class="c-btn c-btn--primary" ><i
                                        class="fa fa-shopping-cart"></i> Add To Orders</button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php }?>
            </div>
        
    </div>
</section>
<?php  include('footer.php'); ?>


