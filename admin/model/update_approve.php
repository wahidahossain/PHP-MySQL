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
    $pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];
    $amount = $_REQUEST['amount'];

$sql1 = "UPDATE `approve` SET `amount` = '$amount' WHERE `approve`.`pre_budget_form_step1_id` ='$pre_budget_form_step1_id';
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        //print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../approve.php?pre_budget_form_step1_id=$pre_budget_form_step1_id'</script>");
    }

    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>