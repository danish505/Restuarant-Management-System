<?php include('header.php'); 

require 'includes/functions.php';
$data = get_order_detail();

 
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

                <tr class="c-table__row">
                    <form method="get" action="search_list.php?table=<?= $_GET['table'];?>">
                    <td class="c-table__cell c-table__cell--head">
                                <select name="table" class="c-select">
                                <option value="table1">Table1</option>
                                <option value="table2">Table2</option>
                                <option value="table3">Table3</option>
                                <option value="table4">Table4</option>
                                <option value="table5">Table5</option>
                                <option value="table6">Table6</option>
                                </select>
                    </td>
                    <td class="c-table__cell c-table__cell--head">
                        <input type="submit" class="c-btn c-btn--success">
                    </td>

                </tr>
                <tr class="c-table__row">
                    <th class="c-table__cell c-table__cell--head">id</th>

                    <th class="c-table__cell c-table__cell--head">Table</th>
                    <th class="c-table__cell c-table__cell--head">Time</th> 
                    <th class="c-table__cell c-table__cell--head">Order Key</th>
                    <th class="c-table__cell c-table__cell--head">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php  if(isset($data)):
                 foreach($data as $dat): ?>
                <tr class="c-table__row">
                    <td class="c-table__cell"><span class="u-text-mute">
                            <?= $dat['id']; ?></span></td>

                    <td class="c-table__cell"><span class="u-text-mute">
                            <?= $dat['table'];?>
                    </td>
                    

                    

                    <td class="c-table__cell"><span class="u-text-mute">
                            <?= date('Y-m-d h:i',$dat['created_at']);?>
                    </td>

                    <td class="c-table__cell">
                        <span class="u-text-mute">
                               <?= $dat['order_key'];?>
                               <!-- <?php foreach($price as $pre): 
                                        if($pre['id']==$dat['item_id']){
                                           $final_price =  $dat['qty']*$pre['price'];
                                           echo $final_price;
                                        } endforeach; ?> -->
                                            
                                        </span>
                    </td>
 
                    <td class="c-table__cell">
                        <a class="u-text-mute" href="#">
                            <a href="edit_order.php?id=<?= $dat['order_key'];?>" class="c-btn c-btn-primary"><i class="fa fa-edit"></i>
                                Edit</a>

                            <a href="delete_order.php?id=<?= $dat['order_key']; ?>" class="c-btn c-btn--danger"><i
                                    class="fa fa-edit"></i> Delete </a>
                        </a>
                    </td>
                </tr><!-- // .table__row -->
                <?php endforeach; 
            endif; ?>

               

            </tbody>
        </table>
    </div><!-- // .c-card -->
</div>

<!-- Button trigger modal -->


<!-- Modal -->



<?php include('footer.php'); ?>
<script>    
    setInterval(function() {
    window.location.reload();
}, 120000); 
</script>