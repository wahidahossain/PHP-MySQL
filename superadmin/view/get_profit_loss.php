<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Profit & Loss Statement</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default noprint">
        <div class="panel-heading">
            Profit & Loss Statement List

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

                ?>
<div align="center"><h3 align="center">Ad Firm Management<br>Profit & Loss Statement</h3>From <?php echo $create_date1;?> To <?php echo $create_date2;?></div>
                <table width="100%"  class="table table-striped table-hover">
  <tr>
    <td valign="top" width="50%">
    <strong>Expenses:</strong>
    <table width="100%" border="0" class="table table-bordered table-hover">
  <tr>
    <th>Expenses Area</th>
    <th>Amount</th>
  </tr>

         <?php
//if($project_entry_id!=''){
            $result003 = mysql_query("SELECT * FROM `expenses_entry` WHERE `id`='$id' AND `date` BETWEEN '$create_date11' AND '$create_date22' and `expenses_type_id`!='investment' ");
            // }

            $count = 0;
            while ($row = mysql_fetch_array($result003))
            {
                //   expenses_entry 	id 	expenses_type_id 	person_entry_id 	voucher_no 	amount 	rcv_by 	paid_by 	date
                $count = $count + 1;
                $expenses_entry = $row['expenses_entry'];
                $expenses_type_id = $row['expenses_type_id'];
                $person_entry_id = $row['person_entry_id'];
                $voucher_no = $row['voucher_no'];
                $amount = $row['amount'];
                $rcv_by = $row['rcv_by'];
                $paid_by = $row['paid_by'];
                $date = $row['date'];

                $result009 = mysql_query("SELECT * FROM `person_entry` WHERE `person_entry_id`='$person_entry_id'");
                $row009 = mysql_fetch_array($result009);
                $person_name = $row009['person_name'];
// expenses_type 	date
                $result008 = mysql_query("SELECT * FROM `expenses_type` WHERE `expenses_type_id`='$expenses_type_id'");
                $row008 = mysql_fetch_array($result008);
                $expenses_type = $row008['expenses_type'];
         ?>

        <tr>
    <td><?php echo $expenses_type;?><br>
      <h6> Paid to:   <?php echo $person_name;?></h6>
    </td>
    <td>+ <?php echo $amount;?></td>
  </tr>
                 <?php
                $total_expenses = $amount + $total_expenses;
}
                ?>
        <tr>
    <th>Total</th>
    <th><?php echo $total_expenses;?></th>
  </tr>

</table>

    </td>
    <td valign="top" width="50%"><strong>Income:</strong>
     <table width="100%" border="0" class="table table-bordered table-hover">
  <tr>
    <th>Party/Particular</th>
    <th>Amount</th>
  </tr>

            <?php
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

                $result009 = mysql_query("SELECT * FROM `project_sale` WHERE `project_sale_id`='$pre_budget_form_step1_id'");
                $row009 = mysql_fetch_array($result009);

                // project_sale_id 	id 	channel_entry_id 	project_entry_id 	amount 	date

                $channel_entry_id = $row009['channel_entry_id'];
                $project_entry_id = $row009['project_entry_id'];
                $amount = $row009['amount'];
                $date = $row009['date'];

                $result_chan = mysql_query("SELECT `channel_name` FROM `channel_entry` WHERE `channel_entry_id`= '$channel_entry_id'");
                $row_chan = mysql_fetch_array($result_chan);
                $channel_name = $row_chan['channel_name'];

                $result1 = mysql_query("SELECT * FROM `project_entry` WHERE `project_entry_id`= '$project_entry_id'");
                $row1 = mysql_fetch_array($result1);
                $project_name = $row1['project_name'];
         ?>


         <tr>
    <td><?php echo $channel_name;?><br>
       <h6> Project : <?php echo $project_name;?></h6>
    </td>
    <td> + <?php echo $payment;?></td>
  </tr>
                <?php
                $total_income = $payment + $total_income;
}
                ?>
         <tr>
    <th>Total</th>
    <th><?php echo $total_income;?></th>
  </tr>

</table>
</td>
  </tr>
</table>
                <?php
                $profit = $total_income - $total_expenses;

            ?>
            <table width="100%" border="0">
                <tr>
                    <td align="right">Net Income : </td>
                    <td width="24%">
                <font size="-1"><?php echo $total_income;?> TK.</font>
               </td>
</tr>
                  <tr>  <td align="right">Total Expenses : </td>
                    <td width="24%">
                

            <font size="-1">(-)<?php echo $total_expenses;?> TK.</font>
               </td>
                </tr>
<tr>
                    <td  colspan="2"><hr></td>
                </tr>
                <tr>
                    <td align="right">Total Profit/Loss :</td>
                    <td width="24%"><?php echo $profit;?> BDT</td>
                </tr>
            </table>

        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.row -->
</div>