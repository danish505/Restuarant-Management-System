<?php include('header.php'); ?>


<?php
require 'includes/functions.php';
$orders = get_order();
$total_orders = get_all_order_detail();


?>


<div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="c-graph-card" data-mh="graph-cards">
                            <div class="c-graph-card__content">
                                <h3 class="c-graph-card__title">Total Earnings</h3>
                                <p class="c-graph-card__date">In Year</p>
                               <?php  if(isset($total_orders)):?>
                                    <?php $total_price = 0; ?>
                                    <?php foreach($total_orders as $price):?>
                                    <?php $total_price += $price['price']; ?>
                                    <?php endforeach; ?>
                                    
                                <h4 class="c-graph-card__number"><?= $total_price; ?></h4>
                        <?php endif;?>
                            </div>
                            <div class="c-graph-card__chart">
                                <canvas id="js-chart-payout" width="300" height="74"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="c-graph-card" data-mh="graph-cards">
                            <div class="c-graph-card__content">
                                <h3 class="c-graph-card__title">Total Earnings</h3>
                                <p class="c-graph-card__date">In Months</p>
                                <?php  if(isset($orders)):?>
                                    <?php $total = 0; ?>
                                    <?php foreach($orders as $order):?>
                                    <?php $total += $order['price']; ?>
                                    <?php endforeach; ?>
                                    
                                <h4 class="c-graph-card__number"><?= $total; ?></h4>
                            <?php  endif; ?>
                            </div>
                            <div class="c-graph-card__chart">
                                <canvas id="js-chart-earnings" width="300" height="74"></canvas>
                            </div>
                        </div>
                    </div>                  
                </div>

               

                <div class="row">
                        <div class="col-md-12">
                                <div class="cart-table c-table-responsive@tablet">
                                    <table class="c-table">
                                        <thead class="c-table__head">
                                            <tr class="c-table__row">
                                                <th class="c-table__cell c-table__cell--head">SELECT DATE FROM</th>
                                                <th class="c-table__cell c-table__cell--head">SELECT  DATE TO</th>
                                                <th class="c-table__cell c-table__cell--head">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="post" action="search.php">
                                       <tr class="c-table__row">
                                                
                                                <td class="c-table__cell">
                                                    <!-- Select with Search Enabled Select -->
                                                    <div class="c-field u-mb-medium">
                                                        <label class="c-field__label" for="select1">FROM</label>
                                                          <?php $date = date('Y-m-d'); ?>
                                                        <input type="date" name="date1" max='<?= $date;?>' class="c-input" value="<?= date('Y-m-01');?>"/>
                                                         
                                                    </div>
                                                </td>
                                                <td class="c-table__cell">
                                                        <div class="c-field u-mb-medium">
                                                            <label class="c-field__label" for="select2">TO</label>
                                                            <!-- Select2 jquery plugin is used -->
                                                          
                                                            <input type="date" name="date2" max='<?= $date;?>' value='<?= $date;?>' class="c-input"/>
                                                        </div>
                                                </td>
                                               <td class="c-table__cell">
                                                        <div class="c-field u-mb-medium">
                                                            <label class="c-field__label" for="select2"></label>
                                                            <!-- Select2 jquery plugin is used -->
                                            <button type="submit" class="c-btn c-btn--success">Generate Bill</button>
                                                        </div>
                                                </td>
                                            </tr>
                                            </form>

                           
                            </div>
                </div><!-- // .row -->

     

            </div><!-- // .container -->
            
        </main>
<?php include('footer.php'); ?>