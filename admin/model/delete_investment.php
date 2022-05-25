<?php
include ("connect.php");
$expenses_type_id = $_REQUEST['expenses_type_id'];

$sql11 = "DELETE FROM `expenses_entry` WHERE `expenses_entry`.`expenses_entry` = '$expenses_type_id'";

$result21 = mysql_query($sql11) or die('Couldnot execute query' . mysql_error());
if ($result21) {
    //print("<script>window.alert('Project Deleted');</script>");
    print("<script>window.location='../add_investment.php'</script>");
}
?>