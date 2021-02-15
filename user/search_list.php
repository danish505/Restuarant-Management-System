<?php  include("header.php");?>
<?php
require "includes/functions.php";


$data['table'] = $_GET['table'];

$search = get_search_order($data);
$price = get_record('menus');


 ?>
<div class="col-md-12">

    <div class="c-table-responsive@wide">
        <table class="c-table">
            <caption class="c-table__title">
                Orders
            </caption>
            <a href="add_order.php" class="c-btn c-btn--success">Add Order</a>

            <thead class="c-table__head c-table__head--slim">

 <?php  if(!empty($search)){
                 foreach($search as $key): ?>
                <tr class="c-table__row">
                    <td class="c-table__cell"><span class="u-text-mute">
                            <?= $key['id']; ?></span></td>

                    <td class="c-table__cell"><span class="u-text-mute">
                            <?= $key['table'];?>
                    </td>
                    

                    

                    <td class="c-table__cell"><span class="u-text-mute">
                            <?= date('Y-m-d h:i',$key['created_at']);?>
                    </td>

                    <td class="c-table__cell">
                        <span class="u-text-mute">
                               <?php foreach($price as $pre): 
                                        if($pre['id']==$key['item_id']){
                                           $final_price =  $key['qty']*$pre['price'];
                                           echo $final_price;
                                        } endforeach; ?></span>
                    </td>

          


                    <td class="c-table__cell">
                        <a class="u-text-mute" href="#">
                            <a href="edit_order.php?id=<?= $key['order_key'];?>" class="c-btn c-btn-primary"><i class="fa fa-edit"></i>
                                Edit</a>

                            <a href="delete_order.php?id=<?= $key['order_key']; ?>" class="c-btn c-btn--danger"><i
                                    class="fa fa-edit"></i> Delete </a>
                        </a>
                    </td>
                </tr><!-- // .table__row -->
                <?php endforeach;
            }
            else{
                echo "<tr class='c-table__row'><td class='c-table__cell'>No records found</td></tr>";
                } ?>


            </tbody>
        </table>
    </div><!-- // .c-card -->
</div>
<?php  include("footer.php");?>