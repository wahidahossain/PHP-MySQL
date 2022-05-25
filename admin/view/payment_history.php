<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Party Ledger</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default noprint">
        <form action="payment_history.php" method="post">
            <div class="panel-heading">

                Search (Project/Party) : <select class="form-control" name="channel_entry_id">
                <option value="0" selected="selected">----Select One Option----</option>
                <?php
                include ("model/connect.php");
                $result = mysql_query("SELECT * FROM `channel_entry` WHERE `id`='$id'");


                while ($row = mysql_fetch_array($result))
                {
                    $channel_entry_id = $row['channel_entry_id'];
                    $channel_name = $row['channel_name'];
                    ?>
                    <option value="<?php echo $channel_entry_id;?>"><?php echo $channel_name;?></option>
                    <?php } ?>

            </select>
                <button type="submit" class="btn btn-default">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>


        </form>


        <div class="panel-heading">
           Party Payment List

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
                    <th>Project</th>

                    <th>Sale Price</th>
                    <th>Total Paid</th>
                    <th>Surplus</th>


                </tr>
                </thead>
                <tbody>
                <?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");
                error_reporting(0);
$channel_entry_id = $_REQUEST['channel_entry_id'];
/*
                if($project_entry_id==''){
                $result = mysql_query("SELECT * FROM `pre_budget_form_step1` WHERE `id`='$id'");
                } */
                if ($channel_entry_id == '') {
                    $result = mysql_query("SELECT * FROM `project_sale` WHERE `id`='$id'");
                }
                if ($channel_entry_id != '') {
                    $result = mysql_query("SELECT * FROM `project_sale` WHERE `id`='$id' and `channel_entry_id`='$channel_entry_id'");
                }

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    $count = $count + 1;
                    $project_sale_id = $row['project_sale_id'];
                    $channel_entry_id1 = $row['channel_entry_id'];
                    $project_entry_id = $row['project_entry_id'];
                    $amount = $row['amount'];
                    $date = $row['date'];


                    $result1 = mysql_query("SELECT * FROM `project_entry` WHERE `project_entry_id`= '$project_entry_id'");
                    $row1 = mysql_fetch_array($result1);
                    $project_name = $row1['project_name'];


                    $result12 = mysql_query("SELECT * FROM `director_entry` WHERE `director_entry_id`= '$director_entry_id'");
                    $row12 = mysql_fetch_array($result12);
                    $director_entry_name = $row12['director_entry_name'];

                    $result1 = mysql_query("SELECT * FROM `project_entry` WHERE `project_entry_id`= '$project_entry_id'");
                    $row1 = mysql_fetch_array($result1);
                    $project_name = $row1['project_name'];


                    $result12 = mysql_query("SELECT * FROM `channel_entry` WHERE `channel_entry_id` = '$channel_entry_id1'");
                    $row12 = mysql_fetch_array($result12);
                    $channel_name = $row12['channel_name'];


                    $sql7 = mysql_query("SELECT SUM( `payment` ) AS 'payment_total' FROM `payment` WHERE `pre_budget_form_step1_id` = '$project_sale_id'");
                    $row_sql7 = mysql_fetch_array($sql7);
                    $payment_total = $row_sql7['payment_total'];
                    $surplus = $amount - $payment_total;

                    ?>


                <tr>

                    <td><?php echo $count;?></td>
                    <td><?php echo $project_name;?></td>

                    <td><?php echo $amount;?></td>
                    <td><?php echo $payment_total;?></td>
                    <td><?php echo $surplus;?></td>

                    
                </tr>
                    <?php
 $sale_total = $sale_total + $amount;
$paid = $payment_total + $paid;
                    $due = $due + $surplus;
                }
                ?>
                <tr>

                    
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total Paid : </th>
                    <th><?php echo $paid;?></th>
                </tr>

                </tbody>
            </table>
            <table class="table table-striped table-bordered table-hover">
                <thead>


                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Payment Type</th>
                    <th>Voucher no/Bill No.</th>
                    <th>Received By</th>
                    <th>Paid By</th>
                    <th>Note</th>
                    <th>Date</th>

                </tr>
                </thead>
                <tbody>


                <?php
                //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");

                $result = mysql_query("SELECT * FROM `payment` WHERE `pre_budget_form_step1_id`= '$project_sale_id'");

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    
                    $count = $count + 1;
                    $payment_id = $row['payment_id'];
                    $payment = $row['payment'];
                    $type = $row['type'];
                    $voucher_no = $row['voucher_no'];
                    $received_by = $row['received_by'];
                    $paid_by = $row['paid_by'];
                    $note = $row['note'];
                    $date = $row['date'];
                    ?>

                <tr>
                    <form action="model/edit_artist.php" method="post">
                        <td><?php echo $count;?></td>
                        <td><?php echo $payment;?>
                        </td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $voucher_no;?></td>
                        <td><?php echo $received_by;?></td>
                        <td><?php echo $paid_by;?></td>
                        <td><?php echo $note;?></td>
                        <td><?php echo $date;?></td>


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