<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pre Budget Form (Continue step 4)</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pre Budget Information - Step 4
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_pre_budget44.php">


                                <div class="form-group">
                                    <label>Post production</label>
                                    <select class="form-control" name="post_production_id">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <?php
                                        include ("model/connect.php");
                                        $result = mysql_query("SELECT * FROM `post_production` WHERE `id`='$id'");


                                        while ($row = mysql_fetch_array($result))
                                        {

                                            $post_production_id = $row['post_production_id'];
                                            $post_production_name = $row['post_production_name'];
                                            ?>
                                            <option value="<?php echo $post_production_id;?>"><?php echo $post_production_name;?></option>
                                            <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input class="form-control" placeholder="Enter text" name="rate" type="number"
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
        <a href="add_pre_budget55.php?pre_budget_form_step1_id=<?php echo $pre_budget_form_step1_id;?>"><i
                class="fa fa-edit fa-fw"></i>Next Step - 5</a>

    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Post production</th>
                    <th>Rate</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                                        <?php
                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                                        include ("model/connect.php");

                                        $result = mysql_query("SELECT * FROM `pre_budget_form_step4` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");

                                        $count = 0;
                                        while ($row = mysql_fetch_array($result))
                                        {
                                            $count = $count + 1;
                                            $pre_budget_form_step4_id = $row['pre_budget_form_step4_id'];
                                            $post_production_id = $row['post_production_id'];

                                            $result1 = mysql_query("SELECT * FROM `post_production` WHERE `post_production_id` = '$post_production_id'");
                                            $row1 = mysql_fetch_array($result1);
                                            $post_production_name = $row1['post_production_name'];


                                            $rate = $row['rate'];
                                            ?>

                                        <tr>

                                            <td><?php echo $count;?></td>
                                            <td><?php echo $post_production_name;?></td>
                                            <td><?php echo $rate;?></td>
                                            <td>
                                                <a href="#"
                                                   ><i class="fa fa-eraser fa-fw"></i>Delete</a>

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