<?php
session_start();
        $login=$_SESSION['login'];
        $type=$_SESSION['type'];
        $company_name=$_SESSION['company_name'];
        $id=$_SESSION['id'];

 if($login=="superadmin"){
 $type=$_SESSION['type'];
        $company_name=$_SESSION['company_name'];
        $id=$_SESSION['id'];
    ?>
<?php
include ("connect.php");

$Journal_entry_id = $_REQUEST['Journal_entry_id'];
$amount = $_REQUEST['amount'];
$date = $_REQUEST['date'];
$timezone_offset = +6; // BD central time (gmt+6) for me
$create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);



$sql1="INSERT INTO `Adjustment` (
`Adjustment_id` ,
`Journal_entry_id` ,
`amount` ,
`date`
)
VALUES (
NULL , '$Journal_entry_id', '$amount', '$date'
);
";

$result2=mysql_query($sql1) or die( 'Couldnot execute query'. mysql_error());

if($result2){
    print("<script>window.alert('Added successfully');</script>");
    print("<script>window.location='../adjustment.php?Journal_entry_id=$Journal_entry_id'</script>");
}
?>
<?php
        }
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>