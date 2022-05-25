<?php
session_start();
$login = $_SESSION['login'];
$type = $_SESSION['type'];
$company_name = $_SESSION['company_name'];
$id = $_SESSION['id'];

if ($login == "superadmin") {
    $type = $_SESSION['type'];
    $company_name = $_SESSION['company_name'];
    $id = $_SESSION['id'];
    ?>
<?php
include ("connect.php");

    $channel_entry_id = $_REQUEST['channel_entry_id'];
    $project_entry_id = $_REQUEST['project_entry_id'];
    $amount = $_REQUEST['amount'];
    $date = $_REQUEST['date'];


    $create_date11 = date("Y-m-d", strtotime($date));


    $sql1 = "INSERT INTO `project_sale` (
`project_sale_id` ,
`id` ,
`channel_entry_id` ,
`project_entry_id` ,
`amount` ,
`date`
)
VALUES (
NULL , '$id', '$channel_entry_id', '$project_entry_id', '$amount', '$create_date11'
);
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../sale_project.php'</script>");
    }
    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>