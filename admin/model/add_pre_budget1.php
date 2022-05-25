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
    $project_entry_id = $_REQUEST['project_entry_id'];
    $director_entry_id = $_REQUEST['director_entry_id'];
    $camera_man = $_REQUEST['camera_man'];
    $script_writer = $_REQUEST['script_writer'];
    $shooting_location = $_REQUEST['shooting_location'];
    $shooting_date = $_REQUEST['shooting_date'];
    $total_days = $_REQUEST['total_days'];
    $type = $_REQUEST['type'];
    $date = $_REQUEST['date'];

$sql1 = "INSERT INTO `pre_budget_form_step1` (
`pre_budget_form_step1_id` ,
`id` ,
`project_entry_id` ,
`director_entry_id` ,
`camera_man` ,
`script_writer` ,
`shooting_location` ,
`shooting_date` ,
`total_days` ,
`type` ,
`date`
)
VALUES (
NULL , '$id', '$project_entry_id', '$director_entry_id', '$camera_man', '$script_writer', '$shooting_location', '$shooting_date', '$total_days', '$type', '$date'
);
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../add_pre_budget1.php'</script>");
    }

    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>