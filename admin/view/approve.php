<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Approve Budget</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <?php
    include ("model/connect.php");
    $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
    $result = mysql_query("SELECT COUNT(*) as 'cnt' FROM `approve` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
    $row1 = mysql_fetch_array($result);
    $cnt = $row1['cnt'];
    if($cnt=='0'){
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Set Approve Budget
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/approve.php">
                                <div class="form-group">
                                    <label>Approved Budget

                                    </label>
                                    <input class="form-control" placeholder="Enter text" name="amount"
                                           type="number" min="1">


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
                    Approve Budget
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="model/update_approve.php">

<?php
    include ("model/connect.php");
    $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
    $result1 = mysql_query("SELECT * FROM `approve` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
    $row = mysql_fetch_array($result1);
    $amount = $row['amount'];
        ?>
                                <div class="form-group">
                                    <label>Approved Budget</label>
                                    <input class="form-control" placeholder="Enter number" name="amount"
                                           type="number"
                                           min="1" value="<?php echo $amount;?>"
                                            >


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