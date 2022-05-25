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

    $instrument_id = $_REQUEST['instrument_id'];
    $instrument_name = $_REQUEST['instrument_name'];

    $query = "UPDATE `instrument` SET `instrument_name` = '$instrument_name' WHERE `instrument`.`instrument_id` ='$instrument_id';
";

    $result = mysql_query($query) or die('Couldnot execute query' . mysql_error());

    if ($result == 1) {

        print("<script>window.alert('Update Success');</script>");
        print("<script>window.location='../add_instrument.php'</script>");
    }

    else {

        print("<script>window.alert('Sorry Not Possible, try Again...');</script>");
        print("<script>window.location='../add_instrument.php'</script>");

    }
    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>