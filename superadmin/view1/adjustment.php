<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Adjustment</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Adjustment
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/adjustment.php">

                                <?php
$Journal_entry_id = $_REQUEST['Journal_entry_id'];
                                ?>

                                <div class="form-group">
                                    <label>Amount</label>
                                    <input class="form-control" placeholder="Enter text" name="amount"
                                           required="required">
                                    <input type="hidden" class="form-control"  name="Journal_entry_id" value="<?php echo $Journal_entry_id;?>"
                                           required="required">
                                </div>
                                
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" name="date" id="datepicker"/>
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
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>


                                        <?php
                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                                        include ("model/connect.php");
error_reporting(0);
                                        //$result = mysql_query("SELECT * FROM `expenses_entry`  WHERE `id`= '$id'");
                                        $result = mysql_query("SELECT * FROM `Adjustment` WHERE `Journal_entry_id`='$Journal_entry_id'");

                                        $count = 0;
                                        while ($row = mysql_fetch_array($result))
                                        {
                                            $count = $count + 1;
                                            $Adjustment_id = $row['Adjustment_id'];
                                            $amount = $row['amount'];
                                            $date = $row['date'];
                                            ?>

                                        <tr>

                                            <td><?php echo $count;?></td>
                                            <td><?php echo $amount;?></td>
                                            <td><?php echo $date;?></td>


                                            <!--<a href="model/user_delete.php?new_customer_id=<?php //echo$new_customer_id;?>">Edit</a> -->
                                            <!--<a href="user_update.php?new_customer_id=<?php //echo$new_customer_id;?>"><img src="design/ico-done.gif" width="16" height="16" /></a>-->


                                        </tr>
                                            <?php
$gtotal = $amount + $gtotal;
                                        }
                                        ?>
                 <tr>

                    <th>Total : </th>
                    <th><?php echo $gtotal;?></th>
                     <th></th>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.row -->
</div>