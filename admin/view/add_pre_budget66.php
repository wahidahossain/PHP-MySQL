<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pre Budget Form (Continue step 6)</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pre Budget Information - Step 6
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_pre_budget66.php">


                                <div class="form-group">
                                    <label>Crew</label>
                                    <select class="form-control" name="crew_person">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <?php
                                        include ("model/connect.php");
                                        $result = mysql_query("SELECT * FROM `crew_entry`  WHERE `id`= '$id'");
                                        $count = 0;
                                        while ($row = mysql_fetch_array($result))
                                        {

                                            $crew_entry_id = $row['crew_entry_id'];
                                            $crew_type = $row['crew_type'];
                                            ?>
                                            <option value="<?php echo $crew_entry_id;?>"><?php echo $crew_type;?></option>
                                            <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input class="form-control" placeholder="Enter text" name="rate" type="number"
                                           min="1"
                                           required="required">
                                </div>

                                <div class="form-group">
                                    <label>Days</label>
                                    <input class="form-control" placeholder="Enter text" name="days" type="number"
                                           min="1"
                                           required="required">
                                </div>

                                        <?php
                                                                        $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
                                ?>
                                <input type="hidden" name="pre_budget_form_step1_id"
                                       value="<?php echo $pre_budget_form_step1_id;?>">

                                <button type="submit" class="btn btn-default">Add</button>

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
    <div class="panel-heading">
        <a href="add_pre_budget77.php?pre_budget_form_step1_id=<?php echo $pre_budget_form_step1_id;?>"><i
                class="fa fa-edit fa-fw"></i>Final Step - 7</a>

    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Crew Type</th>
                    <th>Rate</th>
                    <th>Days</th>
                    <th>Total</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                                        <?php
                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                                        include ("model/connect.php");

                                        $result = mysql_query("SELECT * FROM `pre_budget_form_step6` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");

                                        $count = 0;
                                        while ($row = mysql_fetch_array($result))
                                        {
                                            $count = $count + 1;
                                            $pre_budget_form_step6_id = $row['pre_budget_form_step6_id'];
                                            $crew_person = $row['crew_person'];

                                            $result1 = mysql_query("SELECT * FROM `crew_entry`  WHERE `crew_entry_id` = '$crew_person'");
                                            $row1 = mysql_fetch_array($result1);
                                            $crew_type = $row1['crew_type'];
                                            $rate = $row['rate'];
                                            $days = $row['days'];
                                            $total = $row['total'];
                                            ?>

                                        <tr>

                                            <td><?php echo $count;?></td>
                                            <td><?php echo $crew_type;?></td>
                                            <td><?php echo $rate;?></td>
                                            <td><?php echo $days;?></td>
                                            <td><?php echo $total;?></td>
                                            <td>
                                                <a href="model/delete_step6.php?pre_budget_form_step6_id=<?php echo $pre_budget_form_step6_id;?>&pre_budget_form_step1_id=<?php echo $pre_budget_form_step1_id;?>"
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
    <!-- /.row -->
</div>