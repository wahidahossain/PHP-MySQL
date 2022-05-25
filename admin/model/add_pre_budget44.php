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
    $post_production_id = $_REQUEST['post_production_id'];
    $rate = $_REQUEST['rate'];

$sql1 = "INSERT INTO `pre_budget_form_step4` (
`pre_budget_form_step4_id` ,
`pre_budget_form_step1_id` ,
`post_production_id` ,
`rate`
)
VALUES (
NULL , '$pre_budget_form_step1_id', '$post_production_id', '$rate'
);
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        //print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../add_pre_budget44.php?pre_budget_form_step1_id=$pre_budget_form_step1_id'</script>");
    }

    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>