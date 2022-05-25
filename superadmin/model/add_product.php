<?php
include ("connect.php");

$product_name = $_REQUEST['product_name'];
$unit_price = $_REQUEST['unit_price'];


$timezone_offset = +6; // BD central time (gmt+6) for me
$create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);



$sql1="INSERT INTO `product` (
`product_id` ,
`product_name` ,
`unit_price`
)
VALUES (
NULL , '$product_name', '$unit_price'
);
";

$result2=mysql_query($sql1) or die( 'Couldnot execute query'. mysql_error());

if($result2){
    print("<script>window.alert('Added successfully');</script>");
    print("<script>window.location='../add_products.php'</script>");
}
?>