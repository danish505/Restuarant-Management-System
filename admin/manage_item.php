<?php include('header.php'); 

require 'includes/functions.php';

$data = get_record('menus');

?>
                    <div class="col-md-12">
                        <div class="c-table-responsive@wide">
                            <table class="c-table">
                                <caption class="c-table__title">
                                    Menus
                                </caption>
                                <a href="add_item.php" class="c-btn c-btn--success">Add Item</a>
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head">id</th>
                                        <th class="c-table__cell c-table__cell--head">Items</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php  foreach($data as $dat): ?>
                                    <tr class="c-table__row">
                             <td class="c-table__cell"><span class="u-text-mute"><?= $dat['id']; ?></span></td>
                                        
                                        <td class="c-table__cell">
                                            <span class="u-text-mute"><?= $dat['items']; ?></span>
                                        </td>
                                        <td class="c-table__cell">
                                            <a class="u-text-mute" href="#">
                                <a href="edit_item.php?id=<?= $dat['id']; ?>" class="c-btn c-btn-primary"><i class="fa fa-edit"></i> Edit</a>
                           <a href="delete_item.php?id=<?= $dat['id'];?>" class="c-btn c-btn--danger"><i class="fa fa-edit"></i> Delete</a>
                                            </a>
                                        </td>
                                    </tr><!-- // .table__row -->
                                    <?php endforeach; ?>

                                      
                                </tbody>
                            </table>
                        </div><!-- // .c-card -->
                    </div>
                
<?php include('footer.php'); ?>