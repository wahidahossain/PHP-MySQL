<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Crew Person Information</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Crew Person
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_crew_person.php">

                                <div class="main">
                                    <label>Crew Type</label>
                                    <select class="form-control" name="crew_entry_id">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <?php
                                        include ("model/connect.php");
                                        $result = mysql_query("SELECT * FROM `crew_entry` WHERE `id`='$id'");


                                        while ($row = mysql_fetch_array($result))
                                        {
                                            
                                            $crew_entry_id = $row['crew_entry_id'];
                                            $id = $row['id'];
                                            $crew_type = $row['crew_type'];
                                            ?>
                                            <option value="<?php echo $crew_entry_id;?>"><?php echo $crew_type;?></option>
                                            <?php } ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Crew Person Name</label>
                                    <input class="form-control" placeholder="Enter text" name="crew_person_name"
                                           required="required">

                                    <p class="help-block">Give here Crew Person Name</p>
                                </div>
                                <div class="form-group">
                                    <label>Crew Person Information</label>
                                    <textarea class="form-control" placeholder="Enter numbers"
                                              name="crew_person_info"></textarea>

                                    <p class="help-block">Give here Person Information</p>
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
                    <th>Crew Type</th>
                    <th>Crew Person</th>
                    <th>Person Information</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                                        <?php
                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                                        include ("model/connect.php");

                                        $result = mysql_query("SELECT * FROM `crew_person_entry`  WHERE `id`= '$id'");

                                        $count = 0;
                                        while ($row = mysql_fetch_array($result))
                                        {
                                            $count = $count + 1;
                                            $crew_person_entry_id = $row['crew_person_entry_id'];
                                            $crew_entry_id = $row['crew_entry_id'];

                                            $result1 = mysql_query("SELECT * FROM `crew_entry` WHERE `crew_entry_id`= '$crew_entry_id'");
                                            $row1 = mysql_fetch_array($result1);
                                            $crew_type = $row1['crew_type'];

                                            $crew_person_name = $row['crew_person_name'];
                                            $crew_person_info = $row['crew_person_info'];
                                            ?>

                                        <tr>
                                            <form action="#" method="post">
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $crew_type;?></td>
                                                <td><input type="text" value="<?php echo $crew_person_name;?>"
                                                           name="crew_person_name">
                                                    <input type="hidden" value="<?php echo $crew_person_entry_id;?>"
                                                           name="crew_person_entry_id"></td>
                                                <td><?php echo $crew_person_info;?></td>
                                                <td>

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