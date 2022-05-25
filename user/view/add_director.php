<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Director Information</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Director
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_director.php">
                                <div class="form-group">
                                    <label>Director Name</label>
                                    <input class="form-control" placeholder="Enter text" name="director_entry_name"
                                           required="required">

                                    <p class="help-block">Give here Director name</p>
                                </div>
                                <div class="form-group">
                                    <label>Director Information</label>
                                    <textarea class="form-control" type="text" name="director_detail"></textarea>

                                    <p class="help-block">Give here Director Information (If any)</p>
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
                    <th>Director Name</th>
                    <th>Director Information</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>


                <?php
                //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");

                $result = mysql_query("SELECT * FROM `director_entry`  WHERE `id`= '$id'");

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    $count = $count + 1;
                    $director_entry_id = $row['director_entry_id'];
                    $director_entry_name = $row['director_entry_name'];
                    $director_detail = $row['director_detail'];
                    ?>

                <tr>
                    <form action="#" method="post">
                        <td><?php echo $count;?></td>
                        <td><input type="text" value="<?php echo $director_entry_name;?>" name="director_entry_name">
                            <input type="hidden" value="<?php echo $director_entry_id;?>" name="director_entry_id">
                        </td>
                        <td><?php echo $director_detail;?></td>
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