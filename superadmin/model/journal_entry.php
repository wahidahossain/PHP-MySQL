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

$Journal_type_id = $_REQUEST['Journal_type_id'];
$amount = $_REQUEST['amount'];
     $rcv_by = $_REQUEST['rcv_by'];
     $paid_by = $_REQUEST['paid_by'];
$date = $_REQUEST['date'];
$timezone_offset = +6; // BD central time (gmt+6) for me
$create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);



$sql1="INSERT INTO `Journal_entry` (
`Journal_entry_id` ,
`Journal_type_id` ,
`amount` ,
`rcv_by` ,
`paid_by` ,
`date`
)
VALUES (
NULL , '$Journal_type_id', '$amount', '$rcv_by', '$paid_by', '$date'
);
";

$result2=mysql_query($sql1) or die( 'Couldnot execute query'. mysql_error());

if($result2){
    print("<script>window.alert('Added successfully');</script>");
    print("<script>window.location='../journal_entry.php'</script>");
}
?>
<?php
        }
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>