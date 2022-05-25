<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Give Payment</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pay Now
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/paynow.php">

                                <div class="form-group">
                                    <label>Payment Type</label>
                                    <select class="form-control" name="type">
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Amount</label>
                                    <input class="form-control" type="number" placeholder="Enter number" name="payment"
                                           required="required">
                                    <input class="form-control" value="<?php
                                    $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
                                    echo $pre_budget_form_step1_id;?>" placeholder="Enter number" type="hidden"
                                           name="pre_budget_form_step1_id">
                                </div>

                                <div class="form-group">
                                    <label>Bill/Voucher No.</label>
                                    <input class="form-control" placeholder="Enter Text"
                                           name="voucher_no">

                                </div>
                                <div class="form-group">
                                    <label>Received By</label>
                                    <input class="form-control" placeholder="Enter Text"
                                           name="received_by">

                                </div>
                                <div class="form-group">
                                    <label>Paid By</label>
                                    <input class="form-control" placeholder="Enter Text" name="paid_by">

                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <input class="form-control" placeholder="Enter Text" name="note">

                                </div>

                                <div class="form-group">
                                    <label>Paid Date :</label>
                                    <input type="text" name="date" id="datepicker"/>
                                </div>


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
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Operation</th>
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
                                                                           $date = $row['date'];
                                                                           ?>

                                                                       <tr>
                                                                           <form action="model/edit_artist.php"
                                                                                 method="post">
                                                                               <td><?php echo $count;?></td>
                                                                               <td><?php echo $payment;?>
                                                                               </td>
                                                                               <td><?php echo $date;?></td>
                                                                               <td>
                                                                                   <a href="model/delete_payment.php?payment_id=<?php echo $payment_id;?>&pre_budget_form_step1_id=<?php echo $pre_budget_form_step1_id;?>"
                                                                                      onclick="return confirm('Are you sure you want to delete?')"><i
                                                                                           class="fa fa-eraser fa-fw"></i>Delete</a>
                                                                                   <!--<a href="model/user_delete.php?new_customer_id=<?php //echo$new_customer_id;?>">Edit</a> -->
                                                                                   <!--<a href="user_update.php?new_customer_id=<?php //echo$new_customer_id;?>"><img src="design/ico-done.gif" width="16" height="16" /></a>-->
                                                                               </td>

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

</div>