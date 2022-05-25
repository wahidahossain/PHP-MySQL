<?php
$dbname="zamanits_ad_firm";
$con = mysql_connect("localhost","zamanits_adfirm","123#123#");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("zamanits_ad_firm", $con);

mysql_query("source zamanits_ad_firm.sql");

?> 