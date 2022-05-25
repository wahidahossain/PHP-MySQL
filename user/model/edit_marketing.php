<?php
include ("connect.php");
$marketing_id =$_REQUEST['marketing_id'];
$name =$_REQUEST['name'];
$address =$_REQUEST['address'];
$contact_no =$_REQUEST['contact_no'];

$timezone_offset = +6;
$update_date = gmdate('d-m-Y H:i:s', time()+$timezone_offset*60*60);

$query="UPDATE `marketing_person` SET `name` = '$name',
`address` = '$address',
`contact_no` = '$contact_no' WHERE `marketing_person`.`marketing_id` = '$marketing_id';
";

$result=mysql_query($query) or die( 'Couldnot execute query'. mysql_error());

if($result==1){

    print("<script>window.alert('Update Success');</script>");
    print("<script>window.location='../marketing_person.php'</script>");
}

else{

    print("<script>window.alert('Sorry Not Possible, try Again...');</script>");
    print("<script>window.location='../marketing_person.php'</script>");

}
?>