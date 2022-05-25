<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Journal Type Information</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Journal Type
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/journal_type.php">
                                <div class="form-group">
                                    <label>Journal Type</label>
                                    <input class="form-control" placeholder="Enter text" name="journal_type"
                                           required="required">

                                    <p class="help-block">Give Here Journal Type</p>
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
                    <th>Journal Type</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>


                <?php
                //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");

                $result = mysql_query("SELECT * FROM `journal_type`");

                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    $count = $count + 1;
                    $journal_type_id = $row['journal_type_id'];
                    $journal_type = $row['journal_type'];
                    ?>

                <tr>

                    <td><?php echo $count;?></td>
                    <td><?php echo $journal_type;?>
                    <td><a href="model/delete_journal_type.php?journal_type_id=<?php echo $journal_type_id;?>"
                           onclick="return confirm('Are you sure you want to delete?')"><i
                            class="fa fa-eraser fa-fw"></i>Delete</a></td>

                    </td>

                    <!--<a href="model/user_delete.php?new_customer_id=<?php //echo$new_customer_id;?>">Edit</a> -->
                    <!--<a href="user_update.php?new_customer_id=<?php //echo$new_customer_id;?>"><img src="design/ico-done.gif" width="16" height="16" /></a>-->


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