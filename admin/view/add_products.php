<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="model/add_product.php">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" placeholder="Enter text" name="product_name" required="required">
                                            <p class="help-block">Give here product name</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Unit Price</label>
                                            <input class="form-control" placeholder="Enter numbers"  type="text" required="required" name="unit_price">
                                            <p class="help-block">Give here product unit price</p>
                                        </div>

                                        <!--<div class="form-group">
                                            <label>Product Quantity</label>
                                            <input class="form-control"  placeholder="Enter numbers" required="required" type="number" name="product_quantity">
                                            <p class="help-block">Give here product quantity</p>
                                        </div> -->

                                        
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
//new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
include ("model/connect.php");

$result = mysql_query("SELECT * FROM `product`");

        $count=0;
while($row = mysql_fetch_array($result))
  { $count=$count+1;
      $product_id=$row['product_id'];
      $product_name=$row['product_name'];
      $unit_price=$row['unit_price'];
      ?>

                                        <tr>
                                            <form action="model/edit_product.php" method="post">
                                            <td><?php echo $count;?></td>
                                            <td><input type="text" value="<?php echo $product_name;?>" name="product_name">
                                                <input type="hidden" value="<?php echo $product_id;?>" name="product_id">
                                            </td>
                                            <td><input type="text" value="<?php echo $unit_price;?>" name="unit_price"></td>
                                            <td><input type="submit" value="Edit">

                                                <!--<a href="model/user_delete.php?new_customer_id=<?php //echo$new_customer_id;?>">Edit</a> -->
                                                    <!--<a href="user_update.php?new_customer_id=<?php //echo$new_customer_id;?>"><img src="design/ico-done.gif" width="16" height="16" /></a>-->
                                            </td>

</form>
                                        </tr>
      <?php
}
    ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
            <!-- /.row -->
        </div>