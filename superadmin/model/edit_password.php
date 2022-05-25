<?php
include ("connect.php");
$id =$_REQUEST['id'];
//$username =$_REQUEST['username'];
$password =$_REQUEST['password'];
$id =$_REQUEST['id'];

$query="UPDATE `user` SET `password` = '$password' WHERE `user`.`id` ='$id';
";

$result=mysql_query($query) or die( 'Couldnot execute query'. mysql_error());

if($result==1){

    print("<script>window.alert('Update Success');</script>");
    print("<script>window.location='../settings.php'</script>");
}

else{

    print("<script>window.alert('Sorry Not Possible, try Again...');</script>");
    print("<script>window.location='../settings.php'</script>");

}
?>