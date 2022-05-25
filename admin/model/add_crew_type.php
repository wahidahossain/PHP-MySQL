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
$crew_type = $_REQUEST['crew_type'];
    
$sql1 = "INSERT INTO `crew_entry` (
`crew_entry_id` ,
`id` ,
`crew_type` ,
`date`
)
VALUES (
NULL , '$id', '$crew_type',
CURRENT_TIMESTAMP
);
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../add_crew_type.php'</script>");
    }
    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>