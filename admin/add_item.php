<?php include('header.php'); ?>

 <?php
require "includes/functions.php";
$items = get_item_category();
// print_r($items);
  ?>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-6">
                        
        <form action="insert_item.php?id=<?= $id; ?>" method="post" enctype="multipart/form-data">
                             
            <div class="c-field u-mb-medium">
                   <label class="c-field__label">Items</label>

                        <!-- Select2 jquery plugin is used -->
                <input class="c-input" id="input1" name="item" type="text">
                        
                    </div>
                    
                    <div class="c-field">
                <label class="c-field__label" for="input1">Price</label>

                <input class="c-input" id="input1" name="price" type="text" placeholder="price">
                    </div>

                    <div class="c-field">
                <label class="c-field__label" for="input1">Category</label>

                 <select name="cat_item" class="c-select">
                        <?php foreach($items as $item):?>
                        <option value="<?= $item['cat_item'] ?>"><?= $item['cat_item'] ?></option>
                    <?php endforeach; ?>
                 </select>
                    </div>
<br/>
                    <div class="c-field">
                <label class="c-field__label" for="input1">Image</label>

                <input class="c-input" id="input1" name="image" type="file" required />
                    </div>

                
                            
                            <button class="c-btn c-btn--success u-mt-small" type="submit">SUBMIT</button>
                        </form>
                    </div>
                  
                </div>

               

                <div class="row">
                   
                </div><!-- // .row -->

</div>     

            <?php include('footer.php'); ?>