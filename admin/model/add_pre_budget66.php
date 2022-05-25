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
    $crew_person = $_REQUEST['crew_person'];
    $rate = $_REQUEST['rate'];
    $days = $_REQUEST['days'];
    $total = $rate * $days;

$sql1 = "INSERT INTO `pre_budget_form_step6` (
`pre_budget_form_step6_id` ,
`pre_budget_form_step1_id` ,
`crew_person` ,
`rate` ,
`days` ,
`total`
)
VALUES (
NULL , '$pre_budget_form_step1_id', '$crew_person', '$rate', '$days', '$total'
);
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        //print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../add_pre_budget66.php?pre_budget_form_step1_id=$pre_budget_form_step1_id'</script>");
    }

    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>