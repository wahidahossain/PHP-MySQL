<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pre Budget Form List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>

                    <th>#</th>
                    <th>Project</th>
                    <th>Director</th>
                    <th>Camera Man</th>
                    <th>Script Writer</th>
                    <th>Shooting Location</th>
                    <th>Shooting Date</th>
                    <th>Total Days</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");

                $result = mysql_query("SELECT * FROM `pre_budget_form_step1` WHERE `id`='$id'");

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

                    ?>


                <tr>

                        <td><?php echo $count;?></td>
                        <td><?php echo $project_name;?></td>
                        <td><?php echo $director_entry_name;?></td>
                        <td><?php echo $camera_man;?></td>
                        <td><?php echo $script_writer;?></td>
                        <td><?php echo $shooting_location;?></td>
                        <td><?php echo $shooting_date;?></td>
                        <td><?php echo $total_days;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $date;?></td>
                        <td><a href="form_detail.php?pre_budget_form_step1_id=<?php echo $pre_budget_form_step1_id;?>"><i class="fa fa-edit fa-fw"></i>View Full Form</a>
                           <!--<br> <a href="model/delete_project.php?pre_budget_form_step1_id=<?php echo $pre_budget_form_step1_id;?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser fa-fw"></i>Delete</a> -->

                            <!--<a href="model/user_delete.php?new_customer_id=<?php //echo$new_customer_id;?>">Edit</a> -->
                            <!--<a href="user_update.php?new_customer_id=<?php //echo$new_customer_id;?>"><img src="design/ico-done.gif" width="16" height="16" /></a>-->
                        </td>


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