<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Artist Particulars Information</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Artist
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_production_particular.php">
                                <div class="form-group">
                                    <label>Artist Name</label>
                                    <input class="form-control" placeholder="Enter text" name="artist_name"
                                           required="required">

                                    <p class="help-block">Give here Artist name</p>
                                </div>
                                <div class="form-group">
                                    <label>Artist Information</label>
                                    <textarea class="form-control" type="text" name="artist_info"></textarea>

                                    <p class="help-block">Give here Artist Information (If any)</p>
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
                    <th>Artist Name</th>
                    <th>Artist Information</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>


                <?php
                //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");

                $result = mysql_query("SELECT * FROM `artist_entry`  WHERE `id`= '$id'");

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    $count = $count + 1;
                    $artist_name = $row['artist_name'];
                    $artist_entry_id = $row['artist_entry_id'];
                    $artist_info = $row['artist_info'];
                    ?>

                <tr>
                    <form action="#" method="post">
                        <td><?php echo $count;?></td>
                        <td><input type="text" value="<?php echo $artist_name;?>" name="artist_name">
                            <input type="hidden" value="<?php echo $artist_entry_id;?>" name="artist_entry_id">
                        </td>
                        <td><?php echo $artist_info;?></td>
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