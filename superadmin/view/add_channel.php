<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Channel Entry</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Channel
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_channel.php">
                                <div class="form-group">
                                    <label>Channel Name</label>
                                    <input class="form-control" placeholder="Enter text" name="channel_name"
                                           required="required">

                                    <p class="help-block">Give here Channel name</p>
                                </div>
                                

                                <!--<div class="form-group">
                                   <label>Product Quantity</label>
                                   <input class="form-control"  placeholder="Enter numbers" required="required" type="number" name="product_quantity">
                                   <p class="help-block">Give here product quantity</p>
                               </div> -->


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
                    <th>Channel Name</th>
                    <th>Channel Created On</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>


                <?php
                //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");

                $result = mysql_query("SELECT * FROM `channel_entry`  WHERE `id`= '$id'");

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    $count = $count + 1;
                    $channel_entry_id = $row['channel_entry_id'];
                    $channel_name = $row['channel_name'];
                    $date = $row['date'];
                    ?>

                <tr>
                    <form action="model/edit_channel.php" method="post">
                        <td><?php echo $count;?></td>
                        <td><input type="text" value="<?php echo $channel_name;?>" name="channel_name">
                            <input type="hidden" value="<?php echo $channel_entry_id;?>" name="channel_entry_id">
                        </td>
                        <td><?php echo $date;?></td>
                        <td><input type="submit" value="Edit & Save">

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