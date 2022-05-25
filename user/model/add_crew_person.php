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
    $crew_entry_id = $_REQUEST['crew_entry_id'];
    $crew_person_name = $_REQUEST['crew_person_name'];
    $crew_person_info = $_REQUEST['crew_person_info'];

    $sql1 = "INSERT INTO `crew_person_entry` (
`crew_person_entry_id` ,
`id` ,
`crew_entry_id` ,
`crew_person_name` ,
`crew_person_info` ,
`date`
)
VALUES (
NULL , '$id', '$crew_entry_id', '$crew_person_name', '$crew_person_info',
CURRENT_TIMESTAMP
);
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../add_crew_person.php'</script>");
    }
    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>