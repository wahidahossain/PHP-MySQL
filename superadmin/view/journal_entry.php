<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Journal Information</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row noprint">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Journal
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/journal_entry.php">
                                <div class="form-group">
                                    <label>Journal Type</label>

                                    <select class="form-control" name="journal_type_id">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <?php
                                        include ("model/connect.php");
                                        $result = mysql_query("SELECT * FROM `journal_type`");


                                        while ($row = mysql_fetch_array($result))
                                        {
                                            //journal_type_id 	journal_type 	date
                                            $journal_type_id = $row['journal_type_id'];
                                            $journal_type = $row['journal_type'];
                                            ?>
                                            <option value="<?php echo $journal_type_id;?>"><?php echo $journal_type;?></option>
                                            <?php } ?>
                                    </select>
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

    <div class="panel panel-default noprint">
        <div class="panel-heading">
            Journal

            <button onclick="myFunction()" class="btn btn-default">Print Report</button>
            <script>
                function myFunction() {
                    window.print();
                }
            </script>

        </div>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Journal Type</th>
                    <th>Amount</th>
                    <th>Received By</th>
                    <th>Paid By</th>
                    <th>Adj Amount</th>
                    <th>Date</th>
                    <th class="noprint">Action</th>
                </tr>
                </thead>
                <tbody>


                                        <?php
                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                                        include ("model/connect.php");
                                        error_reporting(0);
                                        //$result = mysql_query("SELECT * FROM `expenses_entry`  WHERE `id`= '$id'");
                                        $result = mysql_query("SELECT * FROM `journal_entry`");

                                        $count = 0;
                                        while ($row = mysql_fetch_array($result))
                                        {
                                            $count = $count + 1;
                                            $journal_entry_id = $row['journal_entry_id'];
                                            $journal_type_id2 = $row['journal_type_id'];


                                            $result12 = mysql_query("SELECT * FROM `journal_type` WHERE `journal_type_id`= '$journal_type_id2'");
                                            $row12 = mysql_fetch_array($result12);
                                            $journal_type = $row12['journal_type'];
                                            $amount = $row['amount'];
                                            $rcv_by = $row['rcv_by'];
                                            $paid_by = $row['paid_by'];

                                            $result13 = mysql_query("SELECT SUM(`amount`) as 'total' FROM `adjustment` WHERE `journal_entry_id` = '$journal_entry_id'");
                                            $row13 = mysql_fetch_array($result13);
                                            $total = $row13['total'];

                                            $date = $row['date'];
                                            ?>

                                        <tr>

                                            <td><?php echo $count;?></td>
                                            <td><?php echo $journal_type;?></td>
                                            <td><?php echo $amount;?></td>
                                            <td><?php echo $rcv_by;?></td>
                                            <td><?php echo $paid_by;?></td>
                                            <td><?php echo $total;?></td>
                                            <td><?php echo $date;?></td>
                                            <td class="noprint">
                                                <a href="adjustment.php?journal_entry_id=<?php echo $journal_entry_id;?>"><i
                                                        class="fa fa-circle fa-fw"></i>Adjustment</a>
                                                <a href="model/delete_journal_entry.php?journal_entry_id=<?php echo $journal_entry_id;?>"
                                                   onclick="return confirm('Are you sure you want to delete?')"><i
                                                        class="fa fa-eraser fa-fw"></i>Delete</a>

                                            </td>

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