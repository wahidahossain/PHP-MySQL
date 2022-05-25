<?php
session_start();
$login = $_SESSION['login'];
$type = $_SESSION['type'];
$company_name = $_SESSION['company_name'];
$id = $_SESSION['id'];

if ($login == "superadmin") {
    $type = $_SESSION['type'];
    $company_name = $_SESSION['company_name'];
    $id = $_SESSION['id'];
    ?>
<?php
include ("connect.php");
    $investment_entry_amount = $_REQUEST['investment_entry_amount'];
    $date = $_REQUEST['date'];
    $create_date11 = date("Y-m-d", strtotime($date));

    /*   $sql1 = "INSERT INTO `investment_entry` (
    `investment_entry_id` ,
    `id` ,
    `investment_entry_amount` ,
    `date`
    )
    VALUES (
    NULL , '$id', '$investment_entry_amount', '$create_date11'
    );
    ";*/

    $sql1 = "INSERT INTO `expenses_entry` (
`expenses_entry` ,
`id` ,
`expenses_type_id` ,
`person_entry_id` ,
`voucher_no` ,
`amount` ,
`rcv_by` ,
`paid_by` ,
`date`
)
VALUES (
NULL , '$id', 'investment', '', '', '$investment_entry_amount', '', '', '$create_date11'
);


";

    $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

    if ($result2) {
        print("<script>window.alert('Added successfully');</script>");
        print("<script>window.location='../add_investment.php'</script>");
    }
    ?>
<?php

}
else {
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>