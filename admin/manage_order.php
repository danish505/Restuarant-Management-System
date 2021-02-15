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
                                        <th class="c-table__cell c-table__cell--head">id</th>
                                         
                                        <th class="c-table__cell c-table__cell--head">Table</th>
                                        <th class="c-table__cell c-table__cell--head">Time</th>
                                        <th class="c-table__cell c-table__cell--head">Order Key</th>
                                        <th class="c-table__cell c-table__cell--head">
                                            <span class="u-hidden-visually"> Actions</span>
                                        </th>
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
                                        
                                       
                                         
                                        <td class="c-table__cell">
                                            <span class="u-text-mute"><?= $dat['table'];?></span>
                                        </td>
                                        <td class="c-table__cell">
                                          <?php $dat['created_at'] = date('Y-m-d H:i a',$dat['created_at']); ?>

                                          <?= $dat['created_at'];?>
                                            
                                        </td>
                                        <td class="c-table__cell">
                                          <?= $dat['order_key'];?>
                                            
                                        </td>
 
                                        <td class="c-table__cell u-text-right">
                                             
                                             
                                        </td>
                                        <td class="c-table__cell">
                                            <a class="u-text-mute" href="#">
                                                <a href="edit_order.php?id=<?=$dat['order_key'];?>" class="c-btn c-btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="generate_pdf.php?id=<?= $dat['order_key'];?>" class="c-btn c-btn--success" target="_blank">
                                                    <i class="fa fa-file-o"></i> Generate Bill</a>
                                                 <a href="delete_order.php?id=<?= $dat['order_key'];?>" class="c-btn c-btn--danger"><i class="fa fa-edit"></i> Delete</a>
                                            </a>
                                        </td>
                                    </tr><!-- // .table__row -->
                                    <?php endforeach; ?>

                                      
                                </tbody>
                            </table>
                        </div><!-- // .c-card -->
                    </div>
                
<?php include('footer.php'); ?>