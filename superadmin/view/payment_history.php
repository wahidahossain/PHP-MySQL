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

                Search (Project/Party) : <select class="form-control" name="project_entry_id">
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
                    <th>Director</th>
                    <th>Total Amount</th>
                    <th>Approved Budget</th>
                    <th>Due</th>
                    <th>Added By</th>
                    <th>Total Paid</th>

                </tr>
                </thead>
                <tbody>
                <?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");
                error_reporting(0);
$project_entry_id = $_REQUEST['project_entry_id'];
/*
                if($project_entry_id==''){
                $result = mysql_query("SELECT * FROM `pre_budget_form_step1` WHERE `id`='$id'");
                } */
                if($project_entry_id!=''){
                $result = mysql_query("SELECT * FROM `pre_budget_form_step1` WHERE `project_entry_id`='$project_entry_id'");
                }

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    $count = $count + 1;
                    $pre_budget_form_step1_id = $row['pre_budget_form_step1_id'];
                    $project_entry_id = $row['project_entry_id'];
                    $director_entry_id = $row['director_entry_id'];
                    $camera_man = $row['camera_man'];
                    $script_writer = $row['script_writer'];
                    $shooting_location = $row['shooting_location'];
                    $shooting_date = $row['shooting_date'];
                    $total_days = $row['total_days'];
                    $type = $row['type'];
                    $date = $row['date'];
                    $id1 = $row['id'];

                                            $result123 = mysql_query("SELECT * FROM `user` WHERE `id`='$id1'");
                                            $row123 = mysql_fetch_array($result123);
                                            $company_name = $row123['company_name'];

                    $result1 = mysql_query("SELECT * FROM `project_entry` WHERE `project_entry_id`= '$project_entry_id'");
                    $row1 = mysql_fetch_array($result1);
                    $project_name = $row1['project_name'];


                    $result12 = mysql_query("SELECT * FROM `director_entry` WHERE `director_entry_id`= '$director_entry_id'");
                    $row12 = mysql_fetch_array($result12);
                    $director_entry_name = $row12['director_entry_name'];

                    $sql1 = mysql_query("SELECT SUM( `rate` ) AS 'artist' FROM `pre_budget_form_step2` WHERE `pre_budget_form_step1_id` ='$pre_budget_form_step1_id'");
$row_sql1 = mysql_fetch_array($sql1);
$artist_total = $row_sql1['artist'];

$sql2 = mysql_query("SELECT (
`director_remunation` + `assistant_director` + `script` + `make_up_man_rate` + ( `foods_days` * `foods_rate` ) + ( `props_days` * `props_rate` )
) AS 'all' FROM `pre_budget_form_step3` WHERE `pre_budget_form_step1_id` ='$pre_budget_form_step1_id'");
$row_sql2 = mysql_fetch_array($sql2);
$all = $row_sql2['all'];

$sql3 = mysql_query("SELECT (`rate` * `days`) as 'instrument' FROM `pre_budget_form_step5`
WHERE `pre_budget_form_step1_id` = '$pre_budget_form_step1_id'");
$row_sql3 = mysql_fetch_array($sql3);
$instrument_total = $row_sql3['instrument'];

$sql4 = mysql_query("SELECT SUM(`total`) as 'crew_total' FROM `pre_budget_form_step6` WHERE `pre_budget_form_step1_id` = '$pre_budget_form_step1_id'");
$row_sql4 = mysql_fetch_array($sql4);
$crew_total = $row_sql4['crew_total'];

$sql5 = mysql_query("SELECT SUM( `rate` ) AS 'other_total' FROM `pre_budget_form_step7` WHERE `pre_budget_form_step1_id`  = '$pre_budget_form_step1_id'");
$row_sql5 = mysql_fetch_array($sql5);
$other_total = $row_sql5['other_total'];


$sql6 = mysql_query("SELECT SUM(`rate`) as 'rate_total' FROM `pre_budget_form_step4` WHERE `pre_budget_form_step1_id` ='$pre_budget_form_step1_id'");
$row_sql6 = mysql_fetch_array($sql6);
$rate_total = $row_sql6['rate_total'];


$grand_total = $artist_total + $all + $instrument_total + $crew_total + $other_total + $rate_total;

$sql6 = mysql_query("SELECT `amount` FROM `approve` WHERE `pre_budget_form_step1_id`  = '$pre_budget_form_step1_id'");
$row_sql6 = mysql_fetch_array($sql6);
$amount_total = $row_sql6['amount'];
$surplus = $grand_total - $amount_total;

$sql7 = mysql_query("SELECT SUM(`payment`) as 'payment_total' FROM `payment` WHERE `pre_budget_form_step1_id` = '$pre_budget_form_step1_id'");
$row_sql7 = mysql_fetch_array($sql7);
$payment_total = $row_sql7['payment_total'];

                    ?>


                <tr>

                    <td><?php echo $count;?></td>
                    <td><?php echo $project_name;?></td>
                    <td><?php echo $director_entry_name;?></td>
                    <td><?php echo $grand_total;?></td>
                    <td><?php echo $amount_total;?></td>
                    <td><?php echo $surplus;?></td>
                    <td><?php echo $company_name;?></td>
                    <td><?php echo $payment_total;?></td>

                    
                </tr>
                    <?php
$paid = $payment_total + $paid;
                }
                ?>
                <tr>

                    <th></th>
                    <th></th>
                    <th></th>
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
                    <th>Added By</th>
                    <th>Note</th>
                    <th>Date</th>

                </tr>
                </thead>
                <tbody>


                <?php
                //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");

                $result = mysql_query("SELECT * FROM `payment` WHERE `pre_budget_form_step1_id`= '$pre_budget_form_step1_id'");

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
                    $id2 = $row['id'];

                    $result123 = mysql_query("SELECT * FROM `user` WHERE `id`='$id2'");
                                            $row123 = mysql_fetch_array($result123);
                                            $company_name2 = $row123['company_name'];
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
                        <td><?php echo $company_name2;?></td>
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