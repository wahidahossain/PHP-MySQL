<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Multiple User Setup</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Setup
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_company.php">
                                <div class="form-group">
                                    <label>Assign Name</label>
                                    <input class="form-control" placeholder="Enter text" name="company_name"
                                           required="required">

                                    <p class="help-block">Give here View User Name</p>
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" placeholder="Enter text" name="username"
                                           required="required">

                                    <p class="help-block">Give here Login Username</p>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Enter text" name="password"
                                           required="required">

                                    <p class="help-block">Give here Login Password</p>
                                </div>

                                <div class="main">
                                    <label>Access Control</label>
                                    <select class="form-control" name="sector">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>

                                    </select>
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
                    <th>User Name</th>
                    <th>Username</th>
                    <th>Password</th>
                     <th>Type</th>
                    <th>Status</th>
                    <th>Created On</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");

                $result = mysql_query("SELECT * FROM `user` WHERE `type`!='superadmin'");

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    $count = $count + 1;
                    $id = $row['id'];
                    $company_name = $row['company_name'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $status = $row['status'];
                    $type = $row['type'];
                    if ($status == '1') {
                        $status_current = 'Active';
                    }
                    if ($status == '0') {
                        $status_current = 'Inactive';
                    }
                    $create_date = $row['create_date'];
                    ?>

                <tr>
                    <form action="model/edit_crew_person.php" method="post">
                        <td><?php echo $count;?></td>
                        <td><?php echo $company_name;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php echo $password;?></td>
                        <td><?php echo $type;?></td>
                        <td><a href="#"><i class="fa fa-edit fa-fw"></i><?php echo $status_current;?></td>
                        <td><?php echo $create_date;?></td>
                        <td><a href="model/delete_company_add.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser fa-fw"></i>Delete</a>

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