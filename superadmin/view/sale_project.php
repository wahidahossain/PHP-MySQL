<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Sale Project</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default noprint">
        <form action="model/sale_project.php" method="post">
            <div class="panel-heading">

                Search (Project) : <select class="form-control" name="project_entry_id">
                <option value="0" selected="selected">----Select One Option----</option>
                <?php
                include ("model/connect.php");
                $result11 = mysql_query("SELECT * FROM `project_entry` WHERE `id`='$id'");


                while ($row11 = mysql_fetch_array($result11))
                {
                    $project_entry_id = $row11['project_entry_id'];
                    $project_name = $row11['project_name'];
                    $project_information = $row11['project_information'];
                    ?>
                    <option value="<?php echo $project_entry_id;?>"><?php echo $project_name;?></option>
                    <?php } ?>
            </select>

                Search (Channel) : <select class="form-control" name="channel_entry_id">
                <option value="0" selected="selected">----Select One Option----</option>
                <?php
                include ("model/connect.php");
                $result22 = mysql_query("SELECT * FROM `channel_entry` WHERE `id`='$id'");


                while ($row22 = mysql_fetch_array($result22))
                {

                    $channel_entry_id = $row22['channel_entry_id'];
                    $channel_name = $row22['channel_name'];
                    ?>
                    <option value="<?php echo $channel_entry_id;?>"><?php echo $channel_name;?></option>
                    <?php } ?>

            </select>

                <div class="form-group">
                    <label>Selling Price </label>
                    <input class="form-control" placeholder="Enter Number" name="amount"
                           required="required">

                    <p class="help-block">Give here Selling Price</p>
                </div>
                <div class="form-group">
                    <label>Date :</label>
                    <input type="text" name="date" id="datepicker"/>
                </div>

                <button type="submit" class="btn btn-default">Sale Now</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>


        </form>


    </div>


  <div class="panel panel-default noprint">
        <form action="sale_project.php" method="post">
            <div class="panel-heading">


                Search By (Channel) : <select class="form-control" name="channel_entry_id">
                <option value="0" selected="selected">----Select One Option----</option>
                <?php
                include ("model/connect.php");
                $result77 = mysql_query("SELECT * FROM `channel_entry` WHERE `id`='$id'");


                while ($row77 = mysql_fetch_array($result77))
                {

                    $channel_entry_id = $row77['channel_entry_id'];
                    $channel_name = $row77['channel_name'];
                    ?>
                    <option value="<?php echo $channel_entry_id;?>"><?php echo $channel_name;?></option>
                    <?php } ?>

            </select>


                <button type="submit" class="btn btn-default">Search</button>
            </div>


        </form>


        <div class="panel-heading">
            Sale List

            <button onclick="myFunction()" class="btn btn-default">Print Report</button>
            <script>
                function myFunction() {
                    window.print();
                }
            </script>

        </div>
    </div>
<div class="col-lg-12 noprint">
            <h2 align="center">Channel wise Market Dues Report</h2>
        </div>


    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>Channel</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
                include ("model/connect.php");
                error_reporting(0);
                $channel_entry_id2 = $_REQUEST['channel_entry_id'];

                if ($channel_entry_id2 == '') {
                    $result = mysql_query("SELECT * FROM  `project_sale` WHERE `id`='$id'");
                }
                if ($channel_entry_id2 != '') {
                    $result = mysql_query("SELECT * FROM `project_sale` WHERE `channel_entry_id`='$channel_entry_id2'");
                }
                $count = 0;
                while ($row = mysql_fetch_array($result))
                {
                    // project_sale_id 	id 	channel_entry_id 	project_entry_id 	amount 	date

                    $count = $count + 1;
                    $project_sale_id = $row['project_sale_id'];
                    $channel_entry_id1 = $row['channel_entry_id'];
                    $project_entry_id = $row['project_entry_id'];
                    $amount = $row['amount'];
                    $date = $row['date'];

                    $result1 = mysql_query("SELECT * FROM `project_entry` WHERE `project_entry_id`= '$project_entry_id'");
                    $row1 = mysql_fetch_array($result1);
                    $project_name = $row1['project_name'];


                    $result12 = mysql_query("SELECT * FROM `channel_entry` WHERE `channel_entry_id` = '$channel_entry_id1'");
                    $row12 = mysql_fetch_array($result12);
                    $channel_name = $row12['channel_name'];



                    ?>


                <tr>

                    <td><?php echo $count;?></td>
                    <td><?php echo $project_name;?></td>
                    <td><?php echo $channel_name;?></td>
                    <td><?php echo $amount;?></td>
                    <td><?php echo $date;?></td>
                    <td><a href="model/delete_sale_project.php?project_sale_id=<?php echo $project_sale_id;?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser fa-fw"></i>Delete</a></td>

                </tr>
                    <?php
$paid = $amount + $paid;
                }
                ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total Sale :</th>
                    <th><?php echo $paid;?></th>
                    <th></th>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.row -->
</div>