<?php include('header.php'); 

require 'includes/functions.php';
 $data = get_table_detail();
  
 
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
                                        <th class="c-table__cell c-table__cell--head">id</th>
                                         
                                        <th class="c-table__cell c-table__cell--head">Table</th>
                                        <th class="c-table__cell c-table__cell--head">Item</th>
                                        <th class="c-table__cell c-table__cell--head">Price</th>
                                        
                                        <th class="c-table__cell c-table__cell--head">
                                            <span class="u-hidden-visually"></span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php  foreach($data as $dat): ?>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell"><span class="u-text-mute">
                                            <?= $dat['id']; ?></span></td>

                                            <td class="c-table__cell"><span class="u-text-mute">
                                                <?= $dat['table'];?>
                                            </td>
                                             <td class="c-table__cell"><span class="u-text-mute">
                                                <?= $dat['items'];?>
                                            </td>
                                        
                                       
                                        
                                       
                                        <td class="c-table__cell">
                                            <span class="u-text-mute"><?= $dat['price'];?></span>
                                        </td>
                                        
                                       <!--  <td class="c-table__cell">
                                              
                                            <?php foreach($price as $pre): 
                                        if($pre['id']==$dat['item_id']){
                                           $final_price =  $dat['qty']*$pre['price'];
                                           echo $final_price;
                                        }
                                        endforeach; ?>
                                            
                                   
                                        </td> -->
 
                                         
                                         
                                    </tr><!-- // .table__row -->
                                    <?php endforeach; ?>

                                      
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