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

$artist_info = $_REQUEST['artist_info'];
$artist_name = $_REQUEST['artist_name'];


$timezone_offset = +6; // BD central time (gmt+6) for me
$create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);



$sql1="INSERT INTO `artist_entry` (
`artist_entry_id` ,
`id` ,
`artist_name` ,
`artist_info` ,
`date`
)
VALUES (
NULL , '$id', '$artist_name', '$artist_info',
CURRENT_TIMESTAMP
);
";

$result2=mysql_query($sql1) or die( 'Couldnot execute query'. mysql_error());

if($result2){
    print("<script>window.alert('Added successfully');</script>");
    print("<script>window.location='../add_artist.php'</script>");
}
?>
<?php
        }
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>