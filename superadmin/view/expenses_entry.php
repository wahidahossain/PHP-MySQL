<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Expenses Information</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Expenses
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/expenses_entry.php">
                                <div class="form-group">
                                    <label>Expenses Type</label>

                                    <select class="form-control" name="expenses_type_id">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <?php
                                        include ("model/connect.php");
                                        $result = mysql_query("SELECT * FROM `expenses_type` WHERE `id`='$id'");


                                        while ($row = mysql_fetch_array($result))
                                        {

                                            $expenses_type_id = $row['expenses_type_id'];
                                            $expenses_type = $row['expenses_type'];
                                            ?>
                                            <option value="<?php echo $expenses_type_id;?>"><?php echo $expenses_type;?></option>
                                            <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Person/Employee</label>

                                    <select class="form-control" name="person_entry_id">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <?php
                                        include ("model/connect.php");
                                        $result = mysql_query("SELECT * FROM `person_entry` WHERE `id`='$id'");


                                        while ($row = mysql_fetch_array($result))
                                        {

                                            $person_entry_id = $row['person_entry_id'];
                                            $person_name = $row['person_name'];
                                            ?>
                                            <option value="<?php echo $person_entry_id;?>"><?php echo $person_name;?></option>
                                            <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Voucher No.</label>
                                        <?php
                                        include ("model/connect.php");
                                    $result99 = mysql_query("SELECT MAX( `expenses_entry` ) as 'max'
FROM `expenses_entry` WHERE `id`='$id'");
                                    $row99 = mysql_fetch_array($result99);
                                    $max = $row99['max'] + 1;
                                    ?>
                                    <input class="form-control" placeholder="Enter text" name="voucher_no" readonly="readonly"
                                           value="<?php echo $max;?>">


                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input class="form-control" placeholder="Enter text" name="amount"
                                           required="required">
                                </div>
                                <div class="form-group">
                                    <label>Received By</label>
                                    <input class="form-control" placeholder="Enter text" name="rcv_by">
                                </div>
                                <div class="form-group">
                                    <label>Paid By</label>
                                    <input class="form-control" placeholder="Enter text" name="paid_by">
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
                    <th>Expenses Type</th>
                    <th>Person</th>
                    <th>Voucher No.</th>
                    <th>Amount</th>
                    <th>Received By</th>
                    <th>Paid By</th>
                    <th>Entry By</th>
                    <th>Date</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>


                                        <?php
                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                                        include ("model/connect.php");

                                        //$result = mysql_query("SELECT * FROM `expenses_entry`  WHERE `id`= '$id'");
                                        $result = mysql_query("SELECT * FROM `expenses_entry`");

                                        $count = 0;
                                        while ($row = mysql_fetch_array($result))
                                        {
                                            $count = $count + 1;
                                            $expenses_entry = $row['expenses_entry'];
                                            $expenses_type_id = $row['expenses_type_id'];
                                            $person_entry_id1 = $row['person_entry_id'];

                                            $result1 = mysql_query("SELECT * FROM `person_entry` WHERE `person_entry_id`= '$person_entry_id1'");
                                            $row1 = mysql_fetch_array($result1);
                                            $person_name = $row1['person_name'];


                                            $result12 = mysql_query("SELECT * FROM `expenses_type` WHERE `expenses_type_id`= '$expenses_type_id'");
                                            $row12 = mysql_fetch_array($result12);
                                            $expenses_type = $row12['expenses_type'];


                                            $voucher_no = $row['voucher_no'];
                                            $amount = $row['amount'];
                                            $rcv_by = $row['rcv_by'];
                                            $paid_by = $row['paid_by'];
                                            $id = $row['id'];

                                            $result123 = mysql_query("SELECT * FROM `user` WHERE `id`='$id'");
                                            $row123 = mysql_fetch_array($result123);
                                            $company_name = $row123['company_name'];

                                            $date = $row['date'];
                                            ?>

                                        <tr>

                                            <td><?php echo $count;?></td>
                                            <td><?php echo $expenses_type;?></td>
                                            <td><?php echo $person_name;?></td>
                                            <td><?php echo $voucher_no;?></td>
                                            <td><?php echo $amount;?></td>
                                            <td><?php echo $rcv_by;?></td>
                                            <td><?php echo $paid_by;?></td>
                                            <td><?php echo $company_name;?></td>
                                            <td><?php echo $date;?></td>
                                            <td><a href="model/delete_expenses_entry.php?expenses_entry=<?php echo $expenses_entry;?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser fa-fw"></i>Delete</a></td>


                                            <!--<a href="model/user_delete.php?new_customer_id=<?php //echo$new_customer_id;?>">Edit</a> -->
                                            <!--<a href="user_update.php?new_customer_id=<?php //echo$new_customer_id;?>"><img src="design/ico-done.gif" width="16" height="16" /></a>-->


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