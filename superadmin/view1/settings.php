<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account Update</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <!--<th>#</th>-->
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
//new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
include ("model/connect.php");

$result = mysql_query("SELECT * FROM `user`");

        $count=0;
while($row = mysql_fetch_array($result))
  { $count=$count+1;
      $username = $row['username'];
      $id1 = $row['id'];
      $password = $row['password'];
      ?>

                                        <tr>
                                            <form action="model/edit_password.php" method="post">
                                            <!--<td><?php echo $count;?></td>-->
                                            <td><?php echo $username;?>
                                                <input type="hidden" value="<?php echo $id;?>" name="id"></td>
                                            <td><input type="text" value="<?php echo $password;?>" name="password">
                                                <input type="hidden" value="<?php echo $id1;?>" name="id">
                                            </td>
                                            <td><input type="submit" value="Edit">

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
        </div>