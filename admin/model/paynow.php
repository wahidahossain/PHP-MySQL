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
<?php
include ("connect.php");
    $payment = $_REQUEST['payment'];
    $type = $_REQUEST['type'];
    $voucher_no = $_REQUEST['voucher_no'];
    $received_by = $_REQUEST['received_by'];
    $paid_by = $_REQUEST['paid_by'];
    $note = $_REQUEST['note'];
    $date = $_REQUEST['date'];
    $originalDate = "$date";
    $create_date11 = date("Y-m-d", strtotime($originalDate));
    $project_sale_id = $_REQUEST['project_sale_id'];


$sql1 = "INSERT INTO `payment` (
`payment_id` ,
`pre_budget_form_step1_id` ,
`id` ,
`payment` ,
`type` ,
`voucher_no` ,
`received_by` ,
`paid_by` ,
`note` ,
`date`
)
VALUES (NULL , '$project_sale_id', '$id', '$payment', '$type','$voucher_no','$received_by','$paid_by', '$note',  '$create_date11');";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../receive_payment2.php?project_sale_id=$project_sale_id'</script>");
    }

    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>