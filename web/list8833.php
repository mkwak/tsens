<?php
include "mysql_settings.php";

$connect = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port);

	$thickLine = "lineWidth: 2,";
	$widths = 1200;
	$heights = 600;

$query = "SELECT unique_no, count(*) AS CNT, DATE_FORMAT(FROM_UNIXTIME(MAX(reg_date)), '%Y-%m-%d %H:%i:%s') as RECENT FROM `amg8833` GROUP BY `unique_no` HAVING CNT >= 60 ORDER BY RECENT DESC";
$result = $connect->query($query) or die($this->_connect->error);

if ($_GET['no'])
{
   $unique_no = $_GET['no'];
   $gQuery = "SELECT * FROM `amg8833` WHERE unique_no = $unique_no ORDER BY no ASC";
   $gResult = $connect->query($gQuery) or die($this->_connect->error);
   $rowNo_count = mysqli_num_rows($gResult);
   if ($rowNo_count < 200) $hTicks = "[0, 100, 200, 300, 400, 500, 600, 700, 800, 900]"; 
   else if ($rowNo_count < 400) $hTicks = "[0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200]"; 
   else if ($rowNo_count < 1000) $hTicks = "[0, 600, 1200, 1800, 2400, 3000, 3600, 4200, 4800]"; 
   else if ($rowNo_count < 1500) $hTicks = "[0, 600, 1200, 1800, 2400, 3000, 3600, 4200, 4800, 5400]"; 
   else $hTicks = "[0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200]"; 
   $i=0;
   while($gRow = $gResult->fetch_array())
   {
      if ($i==0) $time_i = $gRow['reg_date'];
      $timeX = $gRow['reg_date'] - $time_i;
      $row_T = array($gRow[3], $gRow[4], $gRow[5], $gRow[6], $gRow[7], $gRow[8], $gRow[9], $gRow[10], $gRow[11], $gRow[12], $gRow[13], $gRow[14], $gRow[15], $gRow[16], $gRow[17], $gRow[18], $gRow[19], $gRow[20], $gRow[21], $gRow[22], $gRow[23], $gRow[24], $gRow[25], $gRow[26], $gRow[27], $gRow[28], $gRow[29], $gRow[30], $gRow[31], $gRow[32], $gRow[33], $gRow[34], $gRow[35], $gRow[36], $gRow[37], $gRow[38], $gRow[39], $gRow[40], $gRow[41], $gRow[42], $gRow[43], $gRow[44], $gRow[45], $gRow[46], $gRow[47], $gRow[48], $gRow[49], $gRow[50], $gRow[51], $gRow[52], $gRow[53], $gRow[54], $gRow[55], $gRow[56], $gRow[57], $gRow[58], $gRow[59], $gRow[60], $gRow[61], $gRow[62], $gRow[63], $gRow[64], $gRow[65], $gRow[66]);
      rsort($row_T);
      $avg_allT = array_sum($row_T) / 64;
      $avg_T = round(($row_T[0] + $row_T[1] +$row_T[2]) / 3, 1);
      $max_T = max($row_T);
	$array_max[] = max($row_T); 
      $min_T = min($row_T);
	$array_min[] = min($row_T);
      $graph.="[$timeX, $min_T, $max_T, $avg_T]";
      $max_csv.="$timeX\t$min_T\t$max_T\t$avg_T\n";
      $text.= "$timeX\t$gRow[3]\t$gRow[4]\t$gRow[5]\t$gRow[6]\t$gRow[7]\t$gRow[8]\t$gRow[9]\t$gRow[10]\t$gRow[11]\t$gRow[12]\t$gRow[13]\t$gRow[14]\t$gRow[15]\t$gRow[16]\t$gRow[17]\t$gRow[18]\t$gRow[19]\t$gRow[20]\t$gRow[21]\t$gRow[22]\t$gRow[23]\t$gRow[24]\t$gRow[25]\t$gRow[26]\t$gRow[27]\t$gRow[28]\t$gRow[29]\t$gRow[30]\t$gRow[31]\t$gRow[32]\t$gRow[33]\t$gRow[34]\t$gRow[35]\t$gRow[36]\t$gRow[37]\t$gRow[38]\t$gRow[39]\t$gRow[40]\t$gRow[41]\t$gRow[42]\t$gRow[43]\t$gRow[44]\t$gRow[45]\t$gRow[46]\t$gRow[47]\t$gRow[48]\t$gRow[49]\t$gRow[50]\t$gRow[51]\t$gRow[52]\t$gRow[53]\t$gRow[54]\t$gRow[55]\t$gRow[56]\t$gRow[57]\t$gRow[58]\t$gRow[59]\t$gRow[60]\t$gRow[61]\t$gRow[62]\t$gRow[63]\t$gRow[64]\t$gRow[65]\t$gRow[66]\n";
      if ($i < $rowNo_count) $graph.=", ";
	   else $graph.="\n";
      $i++;
   }
}
$connect->close();


$texthead.= "t";
$t=0;
while ($t < 64) {
	$texthead.= "\ta$t";
	$t++;
}
$texthead.= "\n";

$lowest  = floor(min($array_min));
$highest = ceil(max($array_max));
$range_T = "&lt=".$lowest."&ht=".$highest."";

$output="";
while($row = $result->fetch_array())
{
	$no = $row['unique_no'];
	$output.= "<TR><TD><A HREF=$_PHP_SELF?no=$no>$no</A></TD>";
	$output.= "<TD>".$row['CNT']."</TD>";
	$output.= "<TD>".substr($row['RECENT'], 0, -3)."</TD>";
	$output.= "<TD><A HREF=\"img8833.php?no=".$no."\" target=\"graph\"><IMG width=24 height=24 SRC=\"ico_graph.png\"></A></TD>\n";
	if ($no == $_GET['no']) $output.= "<TD align=center><A HREF=\"heatmap8833.php?no=".$no."&nf=".$row['CNT']."$range_T\" target=\"heatmap\">8x8 eyes<BR>$lowest~$highest&deg;C</A></TD></TR>\n";
	else $output.= "<TD>not selected</TD></TR>\n";
}


?>
<html lang="en">
<head>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8;">
<title>list up the recent experiment</title>
<style type="text/css">
	body {font-family: Lucida Grande, Arial, sans-serif;font-size: 10px;margin: 10;padding: 0;}
	a {font-weight: bold;text-decoration: none;color: #69F;}
	a:hover {color: #fff;background-color: #69F;}
</style>
</head>
<BODY>
<?php
if($rowNo_count >= 10)
{
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<DIV ID="chart_div" STYLE="height:<?=$heights?>px; width:<?=$widths?>px;"></DIV>
<script type="text/javascript">
	 google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'min');
      data.addColumn('number', 'max');
      data.addColumn('number', 'max3avg');
      data.addRows([
		<?=$graph?>
	  ]);

      var options = { title: 'plot representing the maxima over time.',
        hAxis: {
          title: 't (s)', ticks: <?=$hTicks?>
        },
        vAxis: {
          title: 'Max_T-amg8833 (℃)', gridlines: { count: 4.5 } <?=$vScaleScript?>, viewWindow: {min: 20, max: 110}
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>

<?php
}
?>
* shows records over 5 min only, latest on top.<BR>
<TABLE>
<TR><TD width=100>number</TD><TD width=60><I>N<I/></TD><TD width=200>date time</TD><TD>image</TD><TD width=120>heatmap</TD><TD rowspan=99 VALIGN=TOP STYLE="font-family: Lucida Grande, Arial, sans-serif;font-size: 10px;margin: 10;padding: 0;">
* Sec, Min., Max., and Max3Avg. <I>T</I> values for the graph<BR>
<textarea rows="20" cols="40" STYLE="font-size: small;">
<?=$max_csv?>
</textarea>	
</TD></TR>
<?=$output?>
</TABLE><BR>
<form name="myform" method="post" action="./eyes8833.php">
* csv to copy and paste entire data into a spreadsheet<BR>
<textarea name="csvdata" rows="20" cols="200" STYLE="font-size: xx-small;">
<?=$texthead.$text?>
</textarea><BR>
</form>
<BR>
<?=min($array_min)." ".max($array_max)?>
</BODY>
</HTML>
