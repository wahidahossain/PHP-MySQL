<?php
include ("connect.php");
$pre_budget_form_step7_id = $_REQUEST['pre_budget_form_step7_id'];
$pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];

$sql11="DELETE FROM `pre_budget_form_step7` WHERE `pre_budget_form_step7`.`pre_budget_form_step7_id` = '$pre_budget_form_step7_id'
";

$result21=mysql_query($sql11) or die( 'Couldnot execute query'. mysql_error());
if($result21){
    //print("<script>window.alert('Project Deleted');</script>");
    print("<script>window.location='../add_pre_budget77.php?pre_budget_form_step1_id=$pre_budget_form_step1_id'</script>");
}
?>