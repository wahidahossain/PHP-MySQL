<?php
session_start();
$login = $_SESSION['login'];
$type = $_SESSION['type'];
$company_name = $_SESSION['company_name'];
$id = $_SESSION['id'];

if ($login = "superadmin") {
    $type = $_SESSION['type'];
    $company_name = $_SESSION['company_name'];
    $id = $_SESSION['id'];
    ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ad Firm Management System || Accounts Management Software</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
 <link href="css/print.css" rel="stylesheet">
    <style type="text/css">
<!--

@media print
{
.noprint {display:none;}
}

@media screen
{
...
}

-->
</style>
</head>
<body>
<div id="wrapper">

    <?php
    include("view/all_navigation.php");
    ?>

    <?php
    include("view/form_detail.php");
    ?>
    <!-- Core Scripts - Include with every page -->
       <script src="js/jquery-1.10.2.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

       <!-- Page-Level Plugin Scripts - Dashboard -->
       <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
       <script src="js/plugins/morris/morris.js"></script>

       <!-- SB Admin Scripts - Include with every page -->
       <script src="js/sb-admin.js"></script>

       <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
       <script src="js/demo/dashboard-demo.js"></script>


</body>
</html>

    <?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>
