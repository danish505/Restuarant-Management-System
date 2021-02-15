<?php include('header.php'); 

require 'includes/functions.php';

$id = $_GET['id'];

$data = get_all_order_pdf($id);

 
$items = get_record('menus');
 

 
 ?>

         
  <form method="post" action='update_order.php?id=<?= $id; ?>'>
<div class="row">
    <div class="col-md-12">
        <div class="cart-table c-table-responsive@tablet">
            <table class="c-table">
                <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Image</th>
                        <th class="c-table__cell c-table__cell--head">ITEM NAME</th>
                        <th class="c-table__cell c-table__cell--head">QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
      
       <?php $i=0; foreach($data as $dat): ?>
       <input type="hidden" name="x_id[]" value="<?= $data[$i]['id'];?>"/>
        <?php $i++; ?>

                <tr class="c-table__row">
                        <td class="c-table__cell">
                            <div class="c-field u-mb-medium">
                              <img src="img/<?= $dat['image'];?>" width="100px"/>
                            </div>
                        </td>

                        <td class="c-table__cell">
                            <div class="c-field u-mb-medium">
                                <label class="c-field__label" for="0">Items</label>

                                <!-- Select2 jquery plugin is used -->
                                <select class="select_style" name="items[]" id="0">
                                    <?php foreach($items as $item): ?>

                                    <option value="<?= $item['id'];?>" <?php if($item['id'] == $dat['item_id']){ echo 'selected';}?>>
                                        <?= $item['items'];?>
                                    </option>
                                <?php endforeach;?>
                                </select>
                            </div>


                            
                        </td>
                        <td class="c-table__cell">
                            <div class="c-field">
                                <input class="c-input" id="input1" type="number" min="0" placeholder="QTY" name="qty[]" value="<?= $dat['qty'];?>">
                            </div>
                        </td>
                       
                         
                        
                    </tr>


    <?php endforeach; ?>

                </tbody>
            </table>
            <br />
            <div class="pull-right">
                <div class="container">
                    <input type="submit" class="c-btn c-btn--success" value="Place Order" /></div>
            </div>
        </div>
    </div>
</div>
</form>



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
       $('.cart-table .c-table tbody').append('<tr id="row'+i+'" class="c-table__row"> <td class="c-table__cell"> <div class="c-field u-mb-medium"><label class="c-field__label" for="'+i+'">Items</label><select class="select_style" name="items[]" id="'+i+'">'+menu_num+'<?php foreach($items as $item): ?> <option value="<?= $item['id'];?>" <?php if($item['id']==$dat['id']){echo 'selected';}?>> <?=$item['items'];?> </option> <?php endforeach;?>
       </select></div> </td>   <td class="c-table__cell"><div class="c-field"><input class="c-input" id="input1" name="qty[]" type="number" min="0" placeholder="QTY"></div></td><td class="c-table__cell"><div class="action-btn"><a id="'+i+'" class="btn_remove c-btn c-btn--danger u-text-xsmall" id="remove_field" href="#">-</a></div></td></tr>')
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

         
 