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
    $director_remunation = $_REQUEST['director_remunation'];
    $assistant_director = $_REQUEST['assistant_director'];
    $script = $_REQUEST['script'];
    //$make_up_man_name = $_REQUEST['make_up_man_name'];
    $make_up_man_rate = $_REQUEST['make_up_man_rate'];
    //$make_up_man_days = $_REQUEST['make_up_man_days'];
    $total = $make_up_man_rate*$make_up_man_days;
    $foods_days = $_REQUEST['foods_days'];
    $foods_rate = $_REQUEST['foods_rate'];
    $props_days = $_REQUEST['props_days'];
    $props_rate = $_REQUEST['props_rate'];

$sql1 = "INSERT INTO `pre_budget_form_step3` (
`pre_budget_form_step3_id` ,
`pre_budget_form_step1_id` ,
`director_remunation` ,
`assistant_director` ,
`script` ,
`make_up_man_name` ,
`make_up_man_rate` ,
`make_up_man_days` ,
`total` ,
`foods_days` ,
`foods_rate` ,
`props_days` ,
`props_rate`
)
VALUES (
NULL , '$pre_budget_form_step1_id', '$director_remunation', '$assistant_director', '$script', '', '$make_up_man_rate', '', '$total', '$foods_days', '$foods_rate', '$props_days', '$props_rate'
);
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        //print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../add_pre_budget33.php?pre_budget_form_step1_id=$pre_budget_form_step1_id'</script>");
    }

    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>