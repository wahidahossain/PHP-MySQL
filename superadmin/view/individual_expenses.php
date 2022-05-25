<div id="page-wrapper">
    <div class="row noprint">
        <div class="col-lg-12">
            <h1 class="page-header">Search By Date</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default noprint">
        <form action="individual_expenses2.php" method="post">
            <div class="panel-heading">
                <div class="form-group">
                    <label>Expenses Type</label>
                    <select class="form-control" name="expenses_type_id">
                        <option value="0" selected="selected">----Select One Option----</option>
                        <?php
                        include ("model/connect.php");
                        $result = mysql_query("SELECT * FROM `expenses_type` WHERE `id`='$id'");
                        while ($row = mysql_fetch_array($result))
                        {
                            $expenses_type_id = $row['expenses_type_id'];
                            $expenses_type = $row['expenses_type'];
                            ?>
                            <option value="<?php echo $expenses_type_id;?>"><?php echo $expenses_type;?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="main">
                    <label>Date Search</label><br>
                    From: <input type="text" name="create_date1" id="datepicker"/>
                    To: <input type="text" name="create_date2" id="datepicker2"/>
                    <input type="submit" id="submit" value="Search">

                </div>
            </div>


        </form>


        <!-- <div class="panel-heading">
          Party Payment List

           <button onclick="myFunction()" class="btn btn-default">Print Report</button>
           <script>
               function myFunction() {
                   window.print();
               }
           </script>

       </div> -->
    </div>


    <!-- /.row -->
</div>