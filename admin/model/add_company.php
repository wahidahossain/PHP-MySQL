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
    $company_name = $_REQUEST['company_name'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
   // $sector = $_REQUEST['sector'];
    $type = $_REQUEST['sector'];
    $status = '1';

    $result = mysql_query("SELECT COUNT(*) as 'total' FROM `user`  WHERE `username`= '$username' or `company_name`= '$company_name'");
    $row = mysql_fetch_array($result);
    $total = $row['total'];
    if($total>0){
      print("<script>window.alert('Sorry same username or company name already exist, try a new user or company name');</script>");
      print("<script>window.location='../company_add.php'</script>");

    }
    else{

$sql1 ="INSERT INTO `user` (
`id` ,
`company_name` ,
`username` ,
`password` ,
`type` ,
`status` ,
`sector` ,
`parent` ,
`last_login` ,
`ip` ,
`create_date`
)
VALUES (
NULL , '$company_name', '$username', '$password', '$type', '$status', '', '$id', '', '',
CURRENT_TIMESTAMP
);
";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../company_add.php'</script>");
    }
    }
    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>