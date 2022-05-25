<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Payment Listing</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default noprint">
        <form action="receive_payment.php" method="post">
            <div class="panel-heading">

                Search (Project) : <select class="form-control" name="project_entry_id">
                <option value="0" selected="selected">----Select One Option----</option>
                <?php
                include ("model/connect.php");
                $result = mysql_query("SELECT * FROM `project_entry` WHERE `id`='$id'");


                while ($row = mysql_fetch_array($result))
                {
                    $project_entry_id = $row['project_entry_id'];
                    $project_name = $row['project_name'];
                    $project_information = $row['project_information'];
                    ?>
                    <option value="<?php echo $project_entry_id;?>"><?php echo $project_name;?></option>
                    <?php } ?>

            </select>
                <button type="submit" class="btn btn-default">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>


        </form>


        <div class="panel-heading">
            Payment List

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
                    <th>Channel</th>
                    <th>Selling Price</th>
                    <th>Received</th>
                    <th>Due</th>

                    <th class="noprint">Give Payment</th>
                </tr>
                </thead>
                <tbody>
                <?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");
                error_reporting(0);
                $project_entry_id = $_REQUEST['project_entry_id'];
// project_sale_id 	id 	channel_entry_id 	project_entry_id 	amount 	date 
                if ($project_entry_id == '') {
                    $result = mysql_query("SELECT * FROM `project_sale` WHERE `id`='$id'");
                }
                if ($project_entry_id != '') {
                    $result = mysql_query("SELECT * FROM `project_sale` WHERE `id`='$id' and `project_entry_id`='$project_entry_id'");
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
                    <td><?php echo $channel_name;?></td>
                    <td><?php echo $amount;?></td>
                    <td><?php echo $payment_total;?></td>
                    <td><?php echo $surplus;?></td>

                    <td class="noprint"><a
                            href="receive_payment2.php?project_sale_id=<?php echo $project_sale_id;?>"><i
                            class="fa fa-edit fa-fw"></i>Receive payment</a></td>

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
                    <th>Total = </th>
                    <th><?php echo $sale_total;?> TK.</th>
                    <th><?php echo $paid;?> TK.</th>
                    <th><?php echo $due;?> TK.</th>
                    

                    <th class="noprint"></th>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.row -->
</div>