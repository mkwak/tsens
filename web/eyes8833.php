<?php
include "mysql_settings.php";
$connect = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port);

$highest=$_GET['ht'];
$lowest=$_GET['lt'];
if ($_GET['no'] && $_GET['nf'] > 0)
{
   $unique_no = $_GET['no'];
   $gQuery = "SELECT * FROM `amg8833` WHERE unique_no = $unique_no ORDER BY no ASC";
   $gResult = $connect->query($gQuery) or die($this->_connect->error);
   $rowNo_count = mysqli_num_rows($gResult);
   $connect->close();
   $i=0;
   while($gRow = $gResult->fetch_array())
   {
      if ($i==0) {
	      $time_i = $gRow['reg_date'];
	  }
      $timeX = $gRow['reg_date'] - $time_i;
      $rowT = array($gRow[3], $gRow[4], $gRow[5], $gRow[6], $gRow[7], $gRow[8], $gRow[9], $gRow[10], $gRow[11], $gRow[12], $gRow[13], $gRow[14], $gRow[15], $gRow[16], $gRow[17], $gRow[18], $gRow[19], $gRow[20], $gRow[21], $gRow[22], $gRow[23], $gRow[24], $gRow[25], $gRow[26], $gRow[27], $gRow[28], $gRow[29], $gRow[30], $gRow[31], $gRow[32], $gRow[33], $gRow[34], $gRow[35], $gRow[36], $gRow[37], $gRow[38], $gRow[39], $gRow[40], $gRow[41], $gRow[42], $gRow[43], $gRow[44], $gRow[45], $gRow[46], $gRow[47], $gRow[48], $gRow[49], $gRow[50], $gRow[51], $gRow[52], $gRow[53], $gRow[54], $gRow[55], $gRow[56], $gRow[57], $gRow[58], $gRow[59], $gRow[60], $gRow[61], $gRow[62], $gRow[63], $gRow[64], $gRow[65], $gRow[66]);
      if ($_GET['nf'] == $i) break;
      $i++;
   }
}

function gen_heatmap($value) {
$color = [
    [0, 0, 255, '0.0f'],      // Blue.
    [0, 255, 255, '0.25f'],     // Cyan.
    [0, 128, 0, '0.5f'],      // Green.
    [255, 255, 0, '0.75f'],     // Yellow.
    [255, 0, 0, '1.0f'], 
];

for ($i=0; $i <count($color) ; $i++) { 
   $currC = $color[$i];
   if($value < $currC[3]) {
    $prevC  = $color[ max(0,$i-1)];
    $valueDiff    = ($prevC[3] - $currC[3]);
    $fractBetween = ($valueDiff==0) ? 0 : ($value - $currC[3]) / $valueDiff;
    $red   = ($prevC[0] - $currC[0])*$fractBetween + $currC[0];
    $green = ($prevC[1] - $currC[1])*$fractBetween + $currC[1];
    $blue  = ($prevC[2] - $currC[2])*$fractBetween + $currC[2];
    return "$red|$green|$blue";
    }
}

return "255|0|0";
}	

header('Content-Type: image/png');
$img = imagecreatefrompng('grid8833_128.png');

$colBlack = imagecolorallocate($img, 0, 0, 0);
$colWhite = imagecolorallocate($img, 255, 255, 255);
$maxTemp = $highest;
$j=0;
foreach ($rowT as $value) {
	$n = $j+3;
	$colDex = explode("|", gen_heatmap(($rowT[$j] - $lowest + 0.01) / ($maxTemp -$lowest + 0.01)));
	$tempCol = imagecolorallocate($img, $colDex[0], $colDex[1], $colDex[2]);
	imagefilledrectangle($img, ($j % 8) * 16, (($j - ($j % 8)) / 8) * 16, ($j % 8) * 16 +16, (($j - ($j % 8)) / 8) * 16 +16, $tempCol);
	if ($sensid > 0) $imagestring($img, 1, ($j % 8) * 16, (($j - ($j % 8)) / 8) * 16, "$j", $colBlack);	// this writes id of each sensor
	$j++;
} 
$nfID = sprintf('%04d', $_GET['nf']);
$name2save = "images/".$_GET['no']."_".$nfID.".png";
if (!is_file($name2save) && $_GET['nf'] > 0) imagepng($img, $name2save);
imagepng($img);
imagedestroy($img);
?>
