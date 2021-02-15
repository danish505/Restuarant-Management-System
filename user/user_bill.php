<?php include('header.php'); 

require 'includes/functions.php';
 $data = get_order_detail_time();
 
 
 $price = get_record('menus');
 
?>


                    <div class="col-md-12">
 
                        <div class="c-table-responsive@wide">
                            <table class="c-table">
                                <caption class="c-table__title">
                                    Orders
                                </caption>
                                <!-- <a href="add_order.php" class="c-btn c-btn--success">Add Order</a> -->
                       
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        
                                         
                                        <th class="c-table__cell c-table__cell--head">Table</th>
                                        <th class="c-table__cell c-table__cell--head">Time</th>
                                         
                                    </tr>
                                </thead>

                                <tbody>
                                        <form method="post" action="generate_bill.php"> 
                                    <tr class="c-table__row">
                                        <td class="c-table__cell"> 
                                            
                                          <select name="table" class="c-select">
                                <option value="Table1">Table1</option>
                                <option value="Table2">Table2</option>
                                <option value="Table3">Table3</option>
                                <option value="Table4">Table4</option>
                                <option value="Table5">Table5</option>
                                <option value="Table6">Table6</option>
                                </select>
                                              </td>

                                            <td class="c-table__cell"> 
                                                    <select name="date" class="c-select">
                                                 <?php foreach($data as $key):

                                                    $key['created_at'] = date('F j, Y, g:i a',$key['created_at']);
                                                    
                                                    ?>
                                              <option value="<?= $key['created_at']; ?>">
                                                <?= $key['created_at']; ?>  
                                              </option>
                                                 <?php endforeach; ?>
                                                    </select>
                                            </td>
                                             <td class="c-table__cell">
                                    <input type="submit" class="c-btn c-btn--success"/>
                                            </td>
                                        
                                    
                                    </tr><!-- // .table__row -->
                       </form>

                                      
                                </tbody>
                            </table>
                        </div><!-- // .c-card -->
                    </div>
                    
                    <!-- Button trigger modal -->
                    

                    <!-- Modal -->
                
                
          
<?php include('footer.php'); ?>