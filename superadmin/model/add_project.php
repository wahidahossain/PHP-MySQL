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

$project_name = $_REQUEST['project_name'];
$project_information = $_REQUEST['project_information'];


$timezone_offset = +6; // BD central time (gmt+6) for me
$create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);



$sql1="INSERT INTO `project_entry` (
`project_entry_id` ,
`id` ,
`project_name` ,
`project_information` ,
`date`
)
VALUES (
NULL , '$id', '$project_name', '$project_information',
CURRENT_TIMESTAMP
);
";

$result2=mysql_query($sql1) or die( 'Couldnot execute query'. mysql_error());

if($result2){
    print("<script>window.alert('Added successfully');</script>");
    print("<script>window.location='../add_project.php'</script>");
}
?>
<?php
        }
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>