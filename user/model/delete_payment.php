<?php
include ("connect.php");
$payment_id = $_REQUEST['payment_id'];
$pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];

$sql11="DELETE FROM `payment` WHERE `payment`.`payment_id` = '$payment_id'
";

$result21=mysql_query($sql11) or die( 'Couldnot execute query'. mysql_error());


if($result21){
    //print("<script>window.alert('Project Deleted');</script>");
    print("<script>window.location='../pay_now.php?pre_budget_form_step1_id=$pre_budget_form_step1_id'</script>");
}
?>