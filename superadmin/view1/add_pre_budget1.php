<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pre Budget Form</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Pre Budget Information
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_pre_budget1.php">

                                <div class="main">
                                    <label>Project Name</label>
                                    <select class="form-control" name="project_entry_id">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <?php
                                        include ("model/connect.php");
                                        $result = mysql_query("SELECT * FROM `project_entry` WHERE `id`='$id'");


                                        while ($row = mysql_fetch_array($result))
                                        {
                                            
                                            $project_entry_id = $row['project_entry_id'];
                                            $project_name = $row['project_name'];
                                            $crew_type = $row['crew_type'];
                                            ?>
                                            <option value="<?php echo $project_entry_id;?>"><?php echo $project_name;?></option>
                                            <?php } ?>

                                    </select>
                                </div>

                                <div class="main">
                                    <label>Type</label>
                                    <select class="form-control" name="type">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <option value="Single">Single</option>
                                        <option value="Tele">Tele</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Director Name</label>
                                    <select class="form-control" name="director_entry_id">
                                        <option value="0" selected="selected">----Select One Option----</option>
                                        <?php
                                        include ("model/connect.php");
                                        $result = mysql_query("SELECT * FROM `director_entry` WHERE `id`='$id'");


                                        while ($row = mysql_fetch_array($result))
                                        {

                                            $director_entry_id = $row['director_entry_id'];
                                            $director_entry_name = $row['director_entry_name'];
                                            ?>
                                            <option value="<?php echo $director_entry_id;?>"><?php echo $director_entry_name;?></option>
                                            <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Script Writer</label>
                                    <input class="form-control" placeholder="Enter text" name="script_writer"
                                           required="required">

                                    <p class="help-block">Give here Script Writer Name</p>
                                </div>
                                <div class="form-group">
                                    <label>Camera Man</label>
                                    <input class="form-control" placeholder="Enter text" name="camera_man"
                                           required="required">

                                    <p class="help-block">Give here Script Writer Name</p>
                                </div>

                                <div class="form-group">
                                    <label>Shooting Location</label>
                                    <input class="form-control" placeholder="Enter text" name="shooting_location"
                                           required="required">

                                    <p class="help-block">Give here Shooting Location</p>
                                </div>

                                <div class="form-group">
                                    <label>Shooting Date</label>
                                    <input type="text" name="shooting_date" id="datepicker"/>

                                    <p class="help-block">Give here Shooting Date</p>
                                </div>

                                <div class="form-group">
                                    <label>Total Days</label>
                                    <input min="1" class="form-control" type="number" placeholder="Enter Number" name="total_days"
                                           required="required">

                                    <p class="help-block">Give here Shooting Location</p>
                                </div>

                                <div class="form-group">
                                    <label>Entry Date</label>
                                    <input type="text" name="date" id="datepicker2"/>

                                    <p class="help-block">Give here Shooting Date</p>
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

    
</div>