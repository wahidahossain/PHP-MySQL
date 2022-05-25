<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Payment Listing</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default noprint">
        <form action="give_payment.php" method="post">
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
                    <th>Director</th>
                    <th>Total Amount</th>
                    <th>Approved Budget</th>
                    <th>Surplus</th>
                    <th>Total Paid</th>
                    <th class="noprint">Payment History</th>
                    <th class="noprint">Give Payment</th>
                </tr>
                </thead>
                <tbody>
                <?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");
                error_reporting(0);
$project_entry_id = $_REQUEST['project_entry_id'];

                if($project_entry_id==''){
                $result = mysql_query("SELECT * FROM `pre_budget_form_step1` WHERE `id`='$id'");
                }
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
                    <td><?php echo $payment_total;?></td>
                    <td class="noprint"><a href="form_detail.php?pre_budget_form_step1_id=<?php echo $pre_budget_form_step1_id;?>"><i
                            class="fa fa-edit fa-fw"></i>View Detail</a></td>
                    <td class="noprint"><a href="pay_now.php?pre_budget_form_step1_id=<?php echo $pre_budget_form_step1_id;?>"><i
                            class="fa fa-edit fa-fw"></i>Pay Now</a></td>
                    
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
                    <th>Total Paid : </th>
                    <th><?php echo $paid;?></th>
                    <th class="noprint"></th>
                    <th class="noprint"></th>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.row -->
</div>