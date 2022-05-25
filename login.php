<?php
session_start();

include('model/connect.php');


$name=$_REQUEST['username'];
$pass=$_REQUEST['password'];
$id=$_REQUEST['id'];

if($name!="" or $pass!=""){

    $query="select count(*) as cnt FROM `user` WHERE `username`='$name' and `password`='$pass' and `id`='$id'";
    $result=mysql_query($query) or die( 'Couldnot execute query'. mysql_error());
    $row=mysql_fetch_array($result);
    $count=$row['cnt'];

    if($count>0){
        $query="select * FROM `user` WHERE `username`='$name' and `password`='$pass' and `id`='$id'";
        $result=mysql_query($query) or die( 'Could not execute query'. mysql_error());
        $row=mysql_fetch_array($result) ;
// `id`, `username`, `password`, `type`, `status`, `last_login`, `ip`, `create_date`
        $id=$row['id'];
        $username=$row['username'];
        $password=$row['password'];
        $type=$row['type'];
        $status=$row['status'];
        $last_login = $row['last_login'];
        $create_date = $row['create_date'];
        $company_name = $row['company_name'];
        //$user_id=$row['user_id'];


        if($type == "superadmin" && $status == "1"){

            $login="superadmin";
            $ip=$_SERVER['REMOTE_ADDR'];
            $_SESSION['id']=$id;
            $_SESSION['login']="superadmin";
            $_SESSION['company_name']=$company_name;
            $_SESSION['type']=$type;
            print("<script>window.location='superadmin/dashboard.php'</script>");
        }
        if($type=="superadmin" && $status=="0")
        {
            print("<script>window.alert('Sorry Your Account is Disabled!');</script>");
            print("<script>window.location='index.php'</script>");
        }
    }//count > 0

//admin
     if($type == "admin" && $status == "1"){

            $login="superadmin";
            $ip=$_SERVER['REMOTE_ADDR'];
            $_SESSION['id']='1';
            $_SESSION['login']=$login;
            $_SESSION['company_name']=$company_name;
            $_SESSION['type']=$type;
            print("<script>window.location='admin/dashboard.php'</script>");
        }
        if($type == "admin" && $status == "0")
        {
            print("<script>window.alert('Sorry Your Account is Disabled!');</script>");
            print("<script>window.location='index.php'</script>");
        }


    //member

    if($type == "user" && $status == "1"){

            $login="superadmin";
            $ip=$_SERVER['REMOTE_ADDR'];
            $_SESSION['id']='1';
            $_SESSION['login']=$login;
            $_SESSION['company_name']=$company_name;
            $_SESSION['type']=$type;
            print("<script>window.location='user/dashboard.php'</script>");
        }
        if($type == "admin" && $status == "0")
        {
            print("<script>window.alert('Sorry Your Account is Disabled!');</script>");
            print("<script>window.location='index.php'</script>");
        }
///////////////////////////////////////////////////////////////////

    if($count==0){

        print("<script>window.alert('Wrong UserId/Password.Please try again...');</script>");
        print("<script>window.location='index.php'</script>");
    }
}  //
print("<script>window.alert('Please Insert User Name and Password');</script>");
print("<script>window.location='index.php'</script>");



?>