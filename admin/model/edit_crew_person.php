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

    $crew_person_entry_id = $_REQUEST['crew_person_entry_id'];
    $crew_person_name = $_REQUEST['crew_person_name'];

    $query = "UPDATE `crew_person_entry` SET `crew_person_name` = '$crew_person_name' WHERE `crew_person_entry`.`crew_person_entry_id` ='$crew_person_entry_id';

";

    $result = mysql_query($query) or die('Couldnot execute query' . mysql_error());

    if ($result == 1) {

        print("<script>window.alert('Update Success');</script>");
        print("<script>window.location='../add_crew_person.php'</script>");
    }

    else {

        print("<script>window.alert('Sorry Not Possible, try Again...');</script>");
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