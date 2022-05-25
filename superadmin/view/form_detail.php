<div id="page-wrapper">
<div class="row noprint">
    <div class="col-lg-12">
        <h1 class="page-header">Pre Budget Form</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">

<tbody>
<?php
                                                                        //new_customer_id 	customer_id 	customer_name 	customer_details 	opening_balance 	status 	customer_category_id 	customer_level_id 	create_date 	update_date
include ("model/connect.php");
$pre_budget_form_step1_id = $_REQUEST['pre_budget_form_step1_id'];

$result = mysql_query("SELECT * FROM `pre_budget_form_step1` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");

$row = mysql_fetch_array($result);

$pre_budget_form_step1_id = $row['pre_budget_form_step1_id'];
$project_entry_id = $row['project_entry_id'];
$director_entry_id = $row['director_entry_id'];
$camera_man = $row['camera_man'];
$script_writer = $row['script_writer'];
$shooting_location = $row['shooting_location'];
$shooting_date = $row['shooting_date'];
$total_days = $row['total_days'];
$type = $row['type'];
$date = $row['date'];

$result1 = mysql_query("SELECT * FROM `project_entry` WHERE `project_entry_id`= '$project_entry_id'");
$row1 = mysql_fetch_array($result1);
$project_name = $row1['project_name'];


$result12 = mysql_query("SELECT * FROM `director_entry` WHERE `director_entry_id`= '$director_entry_id'");
$row12 = mysql_fetch_array($result12);
$director_entry_name = $row12['director_entry_name'];

?>
<table class="table table-striped table-bordered table-hover" style="padding:8px" width="100%" border="1"
       cellpadding="0" cellspacing="0">
    <tr>
        <td width="50%">Project : <?php echo $project_name;?></td>
        <td width="50%">Type : <?php echo $type;?></td>
    </tr>
    <tr>
        <td>Director : <?php echo $director_entry_name;?></td>
        <td>Script Writer : <?php echo $script_writer;?></td>
    </tr>
    <tr>
        <td>Camera Man : <?php echo $camera_man;?></td>
        <td>Shooting Location : <?php echo $shooting_location;?></td>
    </tr>
    <tr>
        <td>Shooting Date : <?php echo $shooting_date;?></td>
        <td>Total Days : <?php echo $total_days;?></td>
    </tr>
</table>
<table class="table table-striped table-bordered table-hover" width="100%" border="1" cellpadding="0" cellspacing="0">
<tr>
    <td width="7%"><strong>Sl No.</strong></td>
    <td colspan="4">
        <div align="center"><strong>Particular</strong></div>
    </td>
    <td width="20%"><strong>Amount</strong></td>
</tr>
<tr>
    <td>1</td>
    <td width="18%" valign="top"><strong>Artist</strong></td>
    <td width="26%"></td>
    <td width="29%" colspan="2"></td>
    <td>&nbsp;</td>
</tr>
<?php
$result0 = mysql_query("SELECT * FROM `pre_budget_form_step2` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
while ($row0 = mysql_fetch_array($result0)) {
    $artist_particulars = $row0['artist_particulars'];
    $rate = $row0['rate'];
    $total = $row0['total'];

    ?>
<tr>
    <td>&nbsp;</td>
    <td width="18%" valign="top">&nbsp;</td>
    <td colspan="3"><?php echo $artist_particulars;?></td>

    <td><?php echo $rate;?></td>
</tr>
    <?php

}
?>
<?php
$result01 = mysql_query("SELECT * FROM `pre_budget_form_step3` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
$row01 = mysql_fetch_array($result01);
$director_remunation = $row01['director_remunation'];
$assistant_director = $row01['assistant_director'];
$script = $row01['script'];
$make_up_man_rate = $row01['make_up_man_rate'];
$foods_days = $row01['foods_days'];
$foods_rate = $row01['foods_rate'];
$food_total = $foods_days * $foods_rate;

$props_days = $row01['props_days'];
$props_rate = $row01['props_rate'];
$props_total = $props_days * $props_rate;

?>
<tr>
    <td>2</td>
    <td colspan="4" valign="top">Director Remunation :</td>
    <td><?php echo $director_remunation;?></td>
</tr>
<tr>
    <td>3</td>
    <td colspan="4" valign="top">Assistance Director :</td>
    <td><?php echo $assistant_director;?></td>
</tr>
<tr>
    <td>4</td>
    <td colspan="4" valign="top">Script :</td>
    <td><?php echo $script;?></td>
</tr>
<tr>
    <td>5</td>
    <td colspan="4" valign="top">Make Up Man :</td>
    <td><?php echo $make_up_man_rate;?></td>
</tr>
<tr>
    <td>6</td>
    <td valign="top"><strong>Post Production : </strong></td>
    <td valign="top">
        <div align="center"><strong>Particulars</strong></div>
    </td>
    <td colspan="2" valign="top">
        <div align="center"><strong>Rate</strong></div>
    </td>
    <td>&nbsp;</td>
</tr>

<?php
$result2 = mysql_query("SELECT * FROM `pre_budget_form_step4` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
while ($row2 = mysql_fetch_array($result2)) {
    $post_production_id = $row2['post_production_id'];
    $rate22 = $row2['rate'];
    $result22 = mysql_query("SELECT * FROM `post_production`  WHERE `post_production_id`= '$post_production_id'");
    $row22 = mysql_fetch_array($result22);
    $post_production_name = $row22['post_production_name'];

    ?>

<tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><?php echo $post_production_name;?></td>
    <td colspan="2" valign="top"><?php echo $rate22;?></td>
    <td><?php echo $rate22;?></td>
</tr>

    <?php

}
?>
<tr>
    <td>7</td>
    <td valign="top"><strong>Instrument</strong></td>
    <td valign="top"><strong>Item</strong></td>
    <td valign="top"><strong>Days</strong></td>
    <td valign="top"><strong>Rate</strong></td>
    <td>&nbsp;</td>
</tr>

<?php
$result3 = mysql_query("SELECT * FROM `pre_budget_form_step5` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
while ($row3 = mysql_fetch_array($result3)) {
    $instrument_id = $row3['instrument_id'];
    $rate33 = $row3['rate'];
    $days = $row3['days'];
    $result33 = mysql_query("SELECT * FROM `instrument`  WHERE `instrument_id`= '$instrument_id'");
    $row33 = mysql_fetch_array($result33);
    $instrument_name = $row33['instrument_name'];
    $ins_total = $days * $rate33;
    ?>

<tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><?php echo $instrument_name;?></td>
    <td valign="top"><?php echo $days;?></td>
    <td valign="top"><?php echo $rate33;?></td>
    <td><?php echo $ins_total;?></td>
</tr>
    <?php

}
?>

<tr>
    <td>8</td>
    <td valign="top"><strong>Crew Payments</strong></td>
    <td valign="top"><strong>Department</strong></td>
    <td valign="top"><strong>Days</strong></td>
    <td valign="top"><strong>Rate</strong></td>
    <td>&nbsp;</td>
</tr>

<?php
$result4 = mysql_query("SELECT * FROM `pre_budget_form_step6` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
while ($row4 = mysql_fetch_array($result4)) {
    $crew_person = $row4['crew_person'];
    $rate44 = $row4['rate'];
    $days = $row4['days'];
    $result44 = mysql_query("SELECT * FROM `crew_entry`  WHERE `crew_entry_id`= '$crew_person'");
    $row44 = mysql_fetch_array($result44);
    $crew_type = $row44['crew_type'];
    $crew_total = $rate44 * $days;
    ?>


<tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><?php echo $crew_type;?></td>
    <td valign="top"><?php echo $days;?></td>
    <td valign="top"><?php echo $rate44;?></td>
    <td><?php echo $crew_total;?></td>
</tr>

    <?php } ?>

<tr>
    <td>9</td>
    <td valign="top"><strong>Foods</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><?php echo $foods_days;?></td>
    <td valign="top"><?php echo $foods_rate;?></td>
    <td><?php echo $food_total;?></td>
</tr>
<tr>
    <td>10</td>
    <td valign="top"><strong>Props</strong></td>
    <td valign="top"><strong>Rent + Purchase</strong></td>
    <td valign="top"><?php echo $props_days;?></td>
    <td valign="top"><?php echo $props_rate;?></td>
    <td><?php echo $props_total;?></td>
</tr>
<tr>
    <td>11</td>
    <td valign="top"><strong>Others</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<?php
$result5 = mysql_query("SELECT * FROM `pre_budget_form_step7` WHERE `pre_budget_form_step1_id`='$pre_budget_form_step1_id'");
while ($row5 = mysql_fetch_array($result5)) {
    $others = $row5['others'];
    $rate55 = $row5['rate'];
    ?>

<tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><?php echo $others;?></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td><?php echo $rate55;?></td>
</tr>
    <?php

}
//all total
$sql1 = mysql_query("SELECT SUM( `rate` ) AS 'artist' FROM `pre_budget_form_step2` WHERE `pre_budget_form_step1_id` ='$pre_budget_form_step1_id'");
$row_sql1 = mysql_fetch_array($sql1);
$artist_total = $row_sql1['artist'];

$sql2 = mysql_query("SELECT (
`director_remunation` + `assistant_director` + `script` + `make_up_man_rate` + ( `foods_days` * `foods_rate` ) + ( `props_days` * `props_rate` )
) AS 'all' FROM `pre_budget_form_step3` WHERE `pre_budget_form_step1_id` ='$pre_budget_form_step1_id'");
$row_sql2 = mysql_fetch_array($sql2);
$all = $row_sql2['all'];

$sql3 = mysql_query("SELECT (`rate` * `days`) as 'instrument' FROM `pre_budget_form_step5`
WHERE `pre_budget_form_step1_id` = '$pre_budget_form_step1_id'");
$row_sql3 = mysql_fetch_array($sql3);
$instrument_total = $row_sql3['instrument'];

$sql4 = mysql_query("SELECT SUM(`total`) as 'crew_total' FROM `pre_budget_form_step6` WHERE `pre_budget_form_step1_id` = '$pre_budget_form_step1_id'");
$row_sql4 = mysql_fetch_array($sql4);
$crew_total = $row_sql4['crew_total'];

$sql5 = mysql_query("SELECT SUM( `rate` ) AS 'other_total' FROM `pre_budget_form_step7` WHERE `pre_budget_form_step1_id`  = '$pre_budget_form_step1_id'");
$row_sql5 = mysql_fetch_array($sql5);
$other_total = $row_sql5['other_total'];


$sql6 = mysql_query("SELECT SUM(`rate`) as 'rate_total' FROM `pre_budget_form_step4` WHERE `pre_budget_form_step1_id` ='$pre_budget_form_step1_id'");
$row_sql6 = mysql_fetch_array($sql6);
$rate_total = $row_sql6['rate_total'];


$grand_total = $artist_total + $all + $instrument_total + $crew_total + $other_total + $rate_total;

$sql6 = mysql_query("SELECT `amount` FROM `approve` WHERE `pre_budget_form_step1_id`  = '$pre_budget_form_step1_id'");
$row_sql6 = mysql_fetch_array($sql6);
$amount_total = $row_sql6['amount'];
$surplus = $grand_total - $amount_total;

?>
<tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top"></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">Total :</td>
    <td><?php echo $grand_total;?></td>
</tr>

</table>
<p>Inword Taka : <?php echo convert_number($grand_total);?></p>

<p>Approved Budget : <?php echo $amount_total;?><br>Surplus / Deficit : <?php echo $surplus;?></p>

<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="8">
    <tr>
        <td width="25%">
            <hr>
        </td>
        <td width="25%">
            <hr>
        </td>
        <td width="25%">
            <hr>
        </td>
        <td width="25%">
            <hr>
        </td>
    </tr>
    <tr>
        <td>
            <div align="center">Director</div>
        </td>
        <td>
            <div align="center">Executive Producer</div>
        </td>
        <td>
            <div align="center">Director</div>
        </td>
        <td>
            <div align="center">CEO Approved</div>
        </td>
    </tr>
</table>

</tbody>
</table>
</div>
<!-- /.table-responsive -->
</div>
<!-- /.row -->
</div>

<?php
function convert_number($number)
{
if (($number < 0) || ($number > 999999999))
{
throw new Exception("Number is out of range");
}

$Gn = floor($number / 100000);  /* Millions (giga) */
$number -= $Gn * 100000;
$kn = floor($number / 1000);     /* Thousands (kilo) */
$number -= $kn * 1000;
$Hn = floor($number / 100);      /* Hundreds (hecto) */
$number -= $Hn * 100;
$Dn = floor($number / 10);       /* Tens (deca) */
$n = $number % 10;               /* Ones */

$res = "";

if ($Gn)
{
$res .= convert_number($Gn) . " Lacs";
}

if ($kn)
{
$res .= (empty($res) ? "" : " ") .
convert_number($kn) . " Thousand";
}

if ($Hn)
{
$res .= (empty($res) ? "" : " ") .
convert_number($Hn) . " Hundred";
}

$ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
"Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
"Nineteen");
$tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
"Seventy", "Eigthy", "Ninety");

if ($Dn || $n)
{
if (!empty($res))
{
$res .= " and ";
}

if ($Dn < 2)
{
$res .= $ones[$Dn * 10 + $n];
}
else
{
$res .= $tens[$Dn];

if ($n)
{
$res .= "-" . $ones[$n];
}
}
}

if (empty($res))
{
$res = "zero";
}

return $res;
}
?>