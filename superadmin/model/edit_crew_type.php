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
    $crew_type = $_REQUEST['crew_type'];

    $query = "UPDATE `crew_entry` SET `crew_type` = '$crew_type' WHERE `crew_entry`.`crew_entry_id` ='$crew_entry_id';
";

    $result = mysql_query($query) or die('Couldnot execute query' . mysql_error());

    if ($result == 1) {

        print("<script>window.alert('Update Success');</script>");
        print("<script>window.location='../add_crew_type.php'</script>");
    }

    else {

        print("<script>window.alert('Sorry Not Possible, try Again...');</script>");
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