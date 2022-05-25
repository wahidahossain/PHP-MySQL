<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pre Budget Form (Continue step 3)</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <?php
    include ("model/connect.php");
    $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
    $result = mysql_query("SELECT COUNT(*) as 'cnt' FROM `pre_budget_form_step3` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
    $row1 = mysql_fetch_array($result);
    $cnt = $row1['cnt'];
    if($cnt=='0'){
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pre Budget Information - Step 33
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/add_pre_budget33.php">
                                <div class="form-group">
                                    <label>Director remuneration</label>
                                    <input class="form-control" placeholder="Enter text" name="director_remunation"
                                           type="number" min="1">


                                </div>
                                <div class="form-group">
                                    <label>Assistant director</label>
                                    <input class="form-control" placeholder="Enter text" name="assistant_director"
                                           type="number" min="1">
                                </div>
                                <div class="form-group">
                                    <label>Script</label>
                                    <input class="form-control" placeholder="Enter number" name="script" type="number"
                                           min="1"
                                            >
                                </div>
<!--
                                <div class="form-group">
                                    <label>Make up man name</label>
                                    <input class="form-control" placeholder="Enter text" name="make_up_man_name"
                                           required="required"></div> -->
                                <div class="form-group">
                                    <label>Make up man amount</label>
                                    <input class="form-control" placeholder="Enter number" name="make_up_man_rate"
                                           type="number" min="1"
                                            >
                                </div>
<!--
                                <div class="form-group">
                                    <label>Make up man days</label>
                                    <input class="form-control" placeholder="Enter number" name="make_up_man_days"
                                           type="number" min="1"
                                            >
                                </div> -->

                                <div class="form-group">
                                    <label>Foods Days</label>
                                    <input class="form-control" placeholder="Enter number" name="foods_days"
                                           type="number"
                                           min="1">
                                </div>
                                <div class="form-group">
                                    <label>Foods Rate</label>
                                    <input class="form-control" placeholder="Enter number" name="foods_rate"
                                           type="number"
                                           min="1">
                                </div>
                                <div class="form-group">
                                    <label>Props Days</label>
                                    <input class="form-control" placeholder="Enter number" name="props_days"
                                           type="number"
                                           min="1">
                                </div>

                                <div class="form-group">
                                    <label>Props Rate</label>
                                    <input class="form-control" placeholder="Enter number" name="props_rate"
                                           type="number"
                                           min="1">
                                </div>

    <?php
                                                    $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
                                ?>
                                <input type="hidden" name="pre_budget_form_step1_id"
                                       value="<?php echo $pre_budget_form_step1_id; ?>">

                                <button type="submit" class="btn btn-default">Add</button>

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
        <?php
} 
    if($cnt!='0'){
        ?>
        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pre Budget Information - Step 3
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/update_add_pre_budget33.php">

<?php
    include ("model/connect.php");
    $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
    $result1 = mysql_query("SELECT * FROM `pre_budget_form_step3` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
    $row = mysql_fetch_array($result1);
    $director_remunation = $row['director_remunation'];
    $assistant_director = $row['assistant_director'];
    $script = $row['script'];
    $make_up_man_name = $row['make_up_man_name'];
    $make_up_man_rate = $row['make_up_man_rate'];
    $make_up_man_days = $row['make_up_man_days'];
    $foods_days = $row['foods_days'];
    $foods_rate = $row['foods_rate'];
    $props_days = $row['props_days'];
    $props_rate = $row['props_rate'];
        ?>
                                <div class="form-group">
                                    <label>Director remuneration</label>
                                    <input class="form-control" placeholder="Enter text" name="director_remunation"
                                           type="number"
                                           min="1" value="<?php echo $director_remunation;?>"
                                            >


                                </div>
                                <div class="form-group">
                                    <label>Assistant director</label>
                                    <input class="form-control" placeholder="Enter text" name="assistant_director"
                                           type="number"
                                           min="1" value="<?php echo $assistant_director;?>"
                                            >
                                </div>
                                <div class="form-group">
                                    <label>Script</label>
                                    <input class="form-control" placeholder="Enter number" name="script" type="number"
                                           min="1" value="<?php echo $script;?>"
                                            >
                                </div>

                                <!--<div class="form-group">
                                    <label>Make up man name</label>
                                    <input class="form-control" placeholder="Enter text" name="make_up_man_name"
                                            value="<?php //echo $director_remunation;?>"></div> -->
                                <div class="form-group">
                                    <label>Make up man amount</label>
                                    <input class="form-control" placeholder="Enter number" name="make_up_man_rate"
                                           type="number" min="1" value="<?php echo $make_up_man_rate;?>"
                                            >
                                </div>

                                <!--<div class="form-group">
                                    <label>Make up man days</label>
                                    <input class="form-control" placeholder="Enter number" name="make_up_man_days"
                                           type="number" min="1" value="<?php //echo $director_remunation;?>"
                                            >
                                </div> -->

                                <div class="form-group">
                                    <label>Foods Days</label>
                                    <input class="form-control" placeholder="Enter number" name="foods_days"
                                           type="number" value="<?php echo $foods_days;?>"
                                           min="1">
                                </div>
                                <div class="form-group">
                                    <label>Foods Rate</label>
                                    <input class="form-control" placeholder="Enter number" name="foods_rate"
                                           type="number" value="<?php echo $foods_rate;?>"
                                           min="1">
                                </div>
                                <div class="form-group">
                                    <label>Props Days</label>
                                    <input class="form-control" placeholder="Enter number" name="props_days"
                                           type="number" value="<?php echo $props_days;?>"
                                           min="1">
                                </div>

                                <div class="form-group">
                                    <label>Props Rate</label>
                                    <input class="form-control" placeholder="Enter number" name="props_rate"
                                           type="number" value="<?php echo $props_rate;?>"
                                           min="1">
                                </div>

    <?php
                                                    $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
                                ?>
                                <input type="hidden" name="pre_budget_form_step1_id"
                                       value="<?php echo $pre_budget_form_step1_id; ?>">

                                <button type="Update" class="btn btn-default">Add</button>

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
        <?php
}
        ?>


    <!-- /.row -->
</div>