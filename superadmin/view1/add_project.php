<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Project Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Project
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="model/add_project.php">
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <input class="form-control" placeholder="Enter text" name="project_name" required="required">
                                            <p class="help-block">Give here project name</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Project Information</label>
                                            <textarea class="form-control"   type="text" name="project_information"></textarea>
                                            <p class="help-block">Give here Project Information (If any)</p>
                                        </div>

                                        <div class="main">
                                    <label>Project Type</label>
                                    <select class="form-control" name="project_type">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                       <option value="1" >Telefilm</option>
                                        <option value="2" >Natok</option>
                                        <option value="3" >Serial/Mega Serial</option>
                                        <option value="4" >Movie</option>
                                        <option value="5" >Ad Film</option>
                                        <option value="6" >Show/TV Program</option>

                                    </select>
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
                                            <th>Project Name</th>
                                            <th>Project Information</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
//new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
include ("model/connect.php");

$result = mysql_query("SELECT * FROM `project_entry` WHERE `id`= '$id'");

        $count=0;
while($row = mysql_fetch_array($result))
  { $count=$count+1;
      $project_entry_id = $row['project_entry_id'];
      $project_name = $row['project_name'];
      $project_information = $row['project_information'];
      ?>

                                        <tr>
                                            <form action="model/edit_project.php" method="post">
                                            <td><?php echo $count;?></td>
                                            <td><input type="text" value="<?php echo $project_name;?>" name="project_name">
                                                <input type="hidden" value="<?php echo $project_entry_id;?>" name="project_entry_id">
                                            </td>
                                            <td><?php echo $project_information;?></td>
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