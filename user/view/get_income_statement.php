<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Income Statement</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default noprint">
       <div class="panel-heading">
           Income Statement List

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

            <?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");
                error_reporting(0);
$create_date1 = $_REQUEST['create_date1'];
$create_date2 = $_REQUEST['create_date2'];

    $create_date11 = date("Y-m-d", strtotime($create_date1));

    $create_date22 = date("Y-m-d", strtotime($create_date2));


/*
                if($project_entry_id==''){
                $result = mysql_query("SELECT * FROM `pre_budget_form_step1` WHERE `id`='$id'");
                } */
                //if($project_entry_id!=''){
                $result = mysql_query("SELECT * FROM `payment` WHERE `id`='$id' AND `date` BETWEEN '$create_date11' AND '$create_date22'");
               // }

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    // payment 	type 	voucher_no 	received_by 	paid_by 	note 	date
                    $count = $count + 1;
                    $pre_budget_form_step1_id = $row['pre_budget_form_step1_id'];
                     $payment = $row['payment'];
                     $type = $row['type'];
                    $voucher_no = $row['voucher_no'];
                    $received_by = $row['received_by'];
                    $paid_by = $row['paid_by'];
                    $note = $row['note'];
                    $date = $row['date'];

                    $result009 = mysql_query("SELECT * FROM `pre_budget_form_step1` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
$row009 = mysql_fetch_array($result009);

                    $project_entry_id = $row009['project_entry_id'];
                    $director_entry_id = $row009['director_entry_id'];
                    $camera_man = $row009['camera_man'];
                    $script_writer = $row009['script_writer'];
                    $shooting_location = $row009['shooting_location'];
                    $shooting_date = $row009['shooting_date'];
                    $total_days = $row009['total_days'];
                    $type = $row009['type'];
                    $date1 = $row009['date'];

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

            <table class="table table-striped table-hover">
              <tr>
                <td width="38%">Project Name :  <?php echo $project_name;?></td>
                <td width="38%">Bill no.: <?php echo $voucher_no;?></td>
                <td>Date: <?php echo $date;?></td>
              </tr>
              <tr>
                <td>Received By: <?php echo $received_by;?></td>
                <td>Paid by: <?php echo $paid_by;?></td>
                <td width="24%"><?php echo $payment;?> BDT</td>
              </tr>
            </table>
<font size="-1">Note : <?php echo $note;?></font><hr>
             <?php
$paid = $payment + $paid;
                }
                ?>
<table width="100%" border="0">

  <tr>
    <td align="right">Total Income : </td>
    <td width="24%"><?php echo $paid;?> BDT</td>
  </tr>
</table>

        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.row -->
</div>