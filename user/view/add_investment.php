<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Investment Entry</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row noprint">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Investment Amount
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_investment.php">
                                <div class="form-group">
                                    <label>Investment Amount</label>
                                    <input class="form-control" placeholder="Enter Number here"
                                           name="investment_entry_amount"
                                           required="required" type="number">

                                    <p class="help-block">Give here Investment Amount</p>
                                </div>

                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" name="date" id="datepicker"/>

                                    <p class="help-block">Give here date</p>
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
                    <th>Investment Amount</th>
                    <th>Investment Amount Given On</th>
                    <th class="noprint">Operation</th>
                </tr>
                </thead>
                <tbody>


                <?php
                //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");
                error_reporting(0);
                $result = mysql_query("SELECT * FROM `expenses_entry`  WHERE `id`= '$id' and `expenses_type_id` = 'investment'");

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    $count = $count + 1;
                    $expenses_type_id = $row['expenses_type_id'];
                    $amount = $row['amount'];
                    $date = $row['date'];
                    ?>

                <tr>

                    <td><?php echo $count;?></td>
                    <td><?php echo $amount;?></td>
                    <td><?php echo $date;?></td>
                    <td class="noprint">
                        <a href="model/delete_investment.php?expenses_type_id=<?php echo $expenses_type_id;?>"><i
                                class="fa fa-eraser fa-fw"></i>Delete</a>

                        <!--<a href="model/user_delete.php?new_customer_id=<?php //echo$new_customer_id;?>">Edit</a> -->
                        <!--<a href="user_update.php?new_customer_id=<?php //echo$new_customer_id;?>"><img src="design/ico-done.gif" width="16" height="16" /></a>-->
                    </td>


                </tr>
                    <?php
$grand = $amount + $grand;
                }
                ?>
                <tr>
                    <th>Total</th>
                    <th><?php echo $grand;?></th>
                    <th colspan="2"></th>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.row -->
</div>