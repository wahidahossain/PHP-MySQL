<?php
include ("connect.php");

$result_bill = mysql_query("SELECT MAX( `sales_id` ) AS 'max' FROM `sales` ");
                                          $row_bill = mysql_fetch_array($result_bill);
                                          $sales_id = ($row_bill['max'] + 1);

//$sales_id = $_REQUEST['sales_id'];
$job_no = $_REQUEST['job_no'];
$client_id = $_REQUEST['client_id'];
//$product_id = $_REQUEST['product_id'];
$challan_no = $_REQUEST['challan_no'];

$timezone_offset = +6; // BD central time (gmt+6) for me
$create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);
$particulars_id = $_REQUEST['particulars_id'];

for($i=0;$i<count($particulars_id);$i++)
 {
        $result11 = mysql_query("SELECT * FROM `product` WHERE `product_id`='".$_POST["particulars_id"][$i]."'");
        $row11 = mysql_fetch_array($result11);
        $unit_price=$row11['unit_price'];
        $pcs = $_POST["pcs"][$i];
        $doz = $pcs/12;

     $result12 = mysql_query("SELECT * FROM `dollar` WHERE `status` = '1'");
        $row12 = mysql_fetch_array($result12);
         $dollar_rate=$row12['dollar_rate'];
         $dollar_amount = $doz * $unit_price;
         $amount = $dollar_amount * $dollar_rate;
         

$sql11="INSERT INTO `sales_history` (
`sales_history` ,
`sales_id` ,
`particulars_id` ,
`pcs` ,
`doz` ,
`amount` ,
`dollar_amount` ,
`dollar_rate`
)
VALUES (
NULL , '$sales_id', '".$_POST["particulars_id"][$i]."', '".$_POST["pcs"][$i]."', '$doz', '$amount', '$dollar_amount', '$dollar_rate'
);
";

$result21=mysql_query($sql11) or die( 'Couldnot execute query'. mysql_error());

}

$total_sale = $amount + $total_sale;




$sql1="INSERT INTO `sales` (
`sales_id` ,
`challan_no` ,
`client_id` ,
`date` ,
`job_no` ,
`total_sale` ,
`collection` ,
`due` ,
`type` ,
`create_date`
)
VALUES (
NULL , '$challan_no', '$client_id', '$create_date', '$job_no', '', '', '', 'Bill', '$create_date'
);
";

$result2=mysql_query($sql1) or die( 'Couldnot execute query'. mysql_error());

if($result2){
    print("<script>window.alert('Added successfully');</script>");
    print("<script>window.location='../add_products.php'</script>");
}
?>