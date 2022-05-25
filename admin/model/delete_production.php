<?php
include ("connect.php");
$production_id = $_REQUEST['production_id'];

$sql11="DELETE FROM `production` WHERE `production`.`production_id` = '$production_id'
";

$result21=mysql_query($sql11) or die( 'Couldnot execute query'. mysql_error());


if($result21){
    print("<script>window.alert('Production Delected');</script>");
    print("<script>window.location='../view_production.php'</script>");
}
?>