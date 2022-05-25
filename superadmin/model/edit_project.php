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
$project_name =$_REQUEST['project_name'];
$project_entry_id =$_REQUEST['project_entry_id'];

$timezone_offset = +6;
$update_date = gmdate('d-m-Y H:i:s', time()+$timezone_offset*60*60);

$query="UPDATE `project_entry` SET `project_name` = '$project_name' WHERE `project_entry`.`project_entry_id` ='$project_entry_id';
";

$result=mysql_query($query) or die( 'Couldnot execute query'. mysql_error());

if($result==1){

    print("<script>window.alert('Update Success');</script>");
    print("<script>window.location='../add_project.php'</script>");
}

else{

    print("<script>window.alert('Sorry Not Possible, try Again...');</script>");
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