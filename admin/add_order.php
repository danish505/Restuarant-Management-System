<?php include('header.php'); ?>
<?php
require 'includes/functions.php';
 $data = get_record('menus'); 

$time = get_order_time();
$vals = get_order_key();

 ?>

<div class="row">
    <div class="col-md-12">
<form method="post" action="insert_order.php">

        <div class="cart-table c-table-responsive@tablet">
            <table class="c-table">
                <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">ITEM NAME</th>
                        <th class="c-table__cell c-table__cell--head">CUSTOMER</th>
                        <th class="c-table__cell c-table__cell--head">QUANTITY</th>
                        <th class="c-table__cell c-table__cell--head">ORDER KEY</th>
                        <th class="c-table__cell c-table__cell--head">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="c-table__row">
                        <td class="c-table__cell">
                            <div class="c-field u-mb-medium">
                                <label class="c-field__label" for="0">&nbsp;</label>

                                <!-- Select2 jquery plugin is used -->
                                <select class="select_style" name="items[]" id="0">
                                    <?php foreach($data as $dat): ?>
                                    <option value="<?= $dat['id']; ?>">
                                        <?= $dat['items'];?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                <?php $i=0; foreach($data as $dat): ?>
       <input type="hidden" name="x_id" value="<?= $data[$i]['id'];?>"/>
        <?php $i++; endforeach; ?>
                     </div>

                    <td class="c-table__cell">
                            <div class="c-field u-mb-medium">
                                <label class="c-field__label" for="0">&nbsp;</label>
                                

                                <!-- Select2 jquery plugin is used -->
                               <select class="c-select" name="table">
                                <option value="table1">Table1</option>
                                <option value="table2">Table2</option>
                                <option value="table3">Table3</option>
                                <option value="table4">Table4</option>
                                <option value="table5">Table5</option>
                                <option value="table6">Table6</option>
                                </select>
                            </div>


                            
                        </td>
                        <td class="c-table__cell">
                            <div class="c-field">
                                <input class="c-input" name="qty[]" id="input1" type="number" min="0" placeholder="QTY">
                            </div>
                        </td>
                       
                        <td class="c-table__cell">
                            <div class="action-btn">
                             
                             <select class="c-select" name="date">
                        <?php foreach($time as $key):  
             $key['created_at'] = date('F j, Y, g:i a',$key['created_at']);
                                         ?>
                                    <option value="<?= $key['created_at']; ?>"><?= $key['created_at']?></option>
                                    <?php endforeach;?> 

                                </select>
                            </div>
                        </td>

                        <td class="c-table__cell">
                            <div class="c-field">
                               <select name="order_key" class="c-select">
                                <?php foreach($vals as $val):?>
                                   <option value="<?= $val['order_key'];?>"><?= $val['order_key'];?></option>
                                    <?php endforeach;?> 
                               </select>
                            </div>
                        </td>

                    </tr>


                </tbody>
            </table>
            <br />
            <div class="pull-right">
                <div class="container">
                    <input type="submit" class="c-btn c-btn--success" value="Place Order" /></div>
            </div>
        </div>
    </form>
    </div>
</div>



  <?php include('footer.php'); ?>

<script>
var items_num = new Array();
var items_names = new Array();

<?php foreach($data as $dat): ?>

items_num.push("<option value='<?php echo $dat['id']; ?>'>"+<?php echo json_encode($dat['items']);?>+"</option>");


<?php endforeach; ?>
 var menu_num= items_num.join("");
 var menu_names= items_names.join("");
console.log(menu_names);




$(document).ready(function(){  
     var i=1;  
     $('#add_field_button').click(function(){
        i++;  
       $('.cart-table .c-table tbody').append('<tr id="row'+i+'" class="c-table__row"> <td class="c-table__cell"> <div class="c-field u-mb-medium"><label class="c-field__label" for="'+i+'">Items</label><select class="select_style" name="items[]" id="'+i+'">'+menu_num+'</select></div></td><td class="c-table__cell"> <div class="c-field u-mb-medium"> <label class="c-field__label" for="0">&nbsp;</label>  </div></td> <td class="c-table__cell"><div class="c-field"><input class="c-input" id="input1" name="qty[]" type="number" min="0" placeholder="QTY"></div></td> <td class="c-table__cell"><div class="action-btn"><a id="'+i+'" class="btn_remove c-btn c-btn--danger u-text-xsmall" id="remove_field" href="#">-</a></div></td></tr>')
       });
     $(document).on('click', '.btn_remove', function(){  
          var button_id = $(this).attr("id");   
          $('#row'+button_id+'').remove();  
     });  
    
});  

$('.data-loop .c-table__cell select.c-field').clone().appendTo("body");
d

</script>


<style>

.select_style{
    display: block;
    width: 100%;
    margin: 0;
    padding: 8px 10px;
    transition: all .3s;
    border: 1px solid #dfe3e9;
    border-radius: 4px;
    background-color: #fff;
    color: #354052;
    font-size: .875rem;
    font-weight: 400;
    resize: none;
}
</style>


         