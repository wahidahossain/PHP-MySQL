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

    $expenses_type_id = $_REQUEST['expenses_type_id'];
    $person_entry_id = $_REQUEST['person_entry_id'];
    $voucher_no = $_REQUEST['voucher_no'];
    $amount = $_REQUEST['amount'];
    $rcv_by = $_REQUEST['rcv_by'];
    $paid_by = $_REQUEST['paid_by'];
    $date = $_REQUEST['date'];
    $create_date11 = date("Y-m-d", strtotime($date));

    //check total investment
    $result1 = mysql_query("SELECT SUM( `amount` ) AS 'total' FROM `expenses_entry` WHERE `id`= '$id' and `expenses_type_id` = 'investment'");

    $count = 0;
    $row1 = mysql_fetch_array($result1);
    $count = $count + 1;
    $total_investment = $row1['total'];
    //check total expenses

    $result2 = mysql_query("SELECT SUM( `amount` ) AS 'total_expenses'
FROM `expenses_entry`
WHERE `id`= '$id' and `expenses_type_id` != 'investment'");

    $count = 0;
    $row2 = mysql_fetch_array($result2);
    $count = $count + 1;
    $total_expenses = $row2['total_expenses'];
    $grand_expense = $amount + $total_expenses;

    $left_amount = $total_investment - $total_expenses;

    if ($total_investment < $grand_expense) {
        print("<script>window.alert('In accounts you got only $left_amount BDT left, Please invest first!!!');</script>");
        print("<script>window.location='../expenses_entry.php'</script>");
    }

    if ($total_investment >= $grand_expense) {

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
NULL , '$id', '$expenses_type_id', '$person_entry_id', '$voucher_no', '$amount', '$rcv_by', '$paid_by', '$create_date11'
);


";

        $result2 = mysql_query($sql1) or die('Couldnot execute query' . mysql_error());

        if ($result2) {
            print("<script>window.alert('Added successfully');</script>");
            print("<script>window.location='../expenses_entry.php'</script>");
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