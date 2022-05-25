<div id="page-wrapper">
<div class="row noprint">
    <div class="col-lg-12">
        <h1 class="page-header">Expenses Report</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="panel panel-default noprint">
    <div class="panel-heading">
        Expenses Report

        <button onclick="myFunction()" class="btn btn-default">Print Report</button>
        <script>
            function myFunction() {
                window.print();
            }
        </script>

    </div>
</div>
<?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
include ("model/connect.php");
error_reporting(0);
$create_date1 = $_REQUEST['create_date1'];
$create_date2 = $_REQUEST['create_date2'];

$create_date11 = date("Y-m-d", strtotime($create_date1));
$create_date22 = date("Y-m-d", strtotime($create_date2));
$expenses_type_id = $_REQUEST['expenses_type_id'];
?>
<div class="panel-body">
<div class="table-responsive">
<table border="1" class="table table-bordered">
<tr>
    <td colspan="2" align="center"><h3>Ad Firm Management</h3>
        Expense Statement<br>
        Date: <?php echo $create_date11;?> to Date: <?php echo $create_date22;?></td>
</tr>
<tr>

<td valign="top">
    <h3>Expenses</h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Date</th>
            <th>Expenses Type</th>
            <th>Received by</th>
            <th>Paid by</th>
            <th>Amount</th>
            <th>Voucher No.</th>
            <!--<th>Person</th>-->

        </tr>

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

        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
        include ("model/connect.php");

        $result = mysql_query("SELECT * FROM `expenses_entry`  WHERE `expenses_type_id`= '$expenses_type_id' AND `date` BETWEEN '$create_date11' AND '$create_date22'");

        $count = 0;
        while ($row = mysql_fetch_array($result))
        {
            $count = $count + 1;
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
            $date = $row['date'];


            ?>


            <tr>

                <td><?php echo $date;?></td>
                <td><?php echo $expenses_type;?></td>
                <td><?php echo $rcv_by;?></td>
                <td><?php echo $paid_by;?></td>
                <td><?php echo $amount;?> BDT</td>
                <td><?php echo $voucher_no;?></td>
                <!--<td><font size="-1"><?php echo $note;?></font></td>-->

            </tr>


            <?php
            $paid = $amount + $paid;
        }
        ?>
        <th></th>
        <th></th>
        <th></th>
        <th>Total Expenses :</th>
        <th><?php echo $paid;?> BDT</th>
        <th></th>

    </table>

</td>
</tr>
</table>


</div>
<!-- /.table-responsive -->
</div>
<!-- /.row -->
</div>