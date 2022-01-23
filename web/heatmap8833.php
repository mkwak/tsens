<?php
$idno=$_GET['no'];
$frno=$_GET['nf'];
$highest=$_GET['ht'];
$lowest=$_GET['lt'];

$dir    = './images';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);
$imgfile = "eyes8833.php?lt=$lowest&ht=$highest&no=$idno&nf="
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8;">
<title>id:<?=$idno?> displays heatmaps of amg8833</title>
<script type="text/javascript" src="mbr_tooltip.js"></script>
<script type="text/javascript" src="mbr_ajax.js"></script>
<style type="text/css">
	body {font-family: Lucida Grande, Arial, sans-serif;font-size: 10px;margin: 10;padding: 0;}
	a {font-weight: bold;text-decoration: none;color: #69F;}
	a:hover {color: #fff;background-color: #69F;}
	#thumbs { padding-top: 0px; padding-bottom: 10px; }
	#thumbs .thumb_row { width: 644px; width/* */:/**/640px; width: /**/640px; padding: 2px; display: block; }
	#thumbs .thumb { width: 128px; float: left; width/* */:/**/120px; width: /**/120px; padding: 0px 4px 10px 4px; font-family: verdana, arial, helvetica, sans-serif; font-size: 9px; line-height: 130%; }
	#thumbs .thumb_img { width: 120px; height: 120px; background:url("img/bg_thumb.gif"); text-align: center; padding-bottom: 3px; }
</style>
</head>
<body>
	On loading this shows the last frame.<BR>
	<B>DO NOT press ENTER</B> key after manually changing frame number.<BR>
<form name="myform" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td rowspan="2"><input type="text" name="nf" value="<?=$frno?>" min="1" max="<?=$frno?>" style="width:50px;height:23px;font-weight:bold;" id="frameNo" OnChange="javascript: var imag = document.getElementById('contentimage');imag.src = '<?=$imgfile?>'+(this.value);"></td>
<td><input type="button" value=" /1\ " onclick="this.form.nf.value++;var imag = document.getElementById('contentimage');imag.src = '<?=$imgfile?>'+(this.form.nf.value);" style="font-size:7px;margin:0;padding:0;width:20px;height:13px;" > <input type="button" value=" /5\ " onclick="for (i = 0; i < 5; i++) this.form.nf.value++;  var imag = document.getElementById('contentimage');imag.src = '<?=$imgfile?>'+(this.form.nf.value);" style="font-size:7px;margin:0;padding:0;width:20px;height:13px;" > </td>
</tr>
<tr>
<td><input type=button value=" \1/ " onclick="this.form.nf.value--;var imag = document.getElementById('contentimage');imag.src = '<?=$imgfile?>'+(this.form.nf.value);" style="font-size:7px;margin:0;padding:0;width:20px;height:12px;" > <input type="button" value=" \5/ " onclick="for (i = 0; i < 5; i++) this.form.nf.value--;  var imag = document.getElementById('contentimage');imag.src = '<?=$imgfile?>'+(this.form.nf.value);" style="font-size:7px;margin:0;padding:0;width:20px;height:13px;" > </td>
</tr>
</table>
<BR><input type=reset><BR>

<table cellpadding="0" cellspacing="0" border="0">
<TR>
<TD rowspan=2>
	<img src="<?=$imgfile.$frno?>" id="contentimage"></A>
</TD>
<TD rowspan=2><DIV STYLE="margin-left:2px;">
	<img src="heatmap_5colorV.png" height=128>
	</DIV>
</TD>
<TD valign=top>
&nbsp;<B><?=$highest?></B>
</TD>
</TR>
<TR><TD valign=bottom>&nbsp;<B><?=$lowest?></B></TD></TR>
</TABLE>
On loading, the heatmap shows the last frame.
</form>
<BR><BR>
<?php
$i =0;
$len_id = strlen("$idno");
foreach ($files1 as &$val) {
	if($idno == substr($val, 0, $len_id)) {
		$i++;
		if (substr($val, -3) == "png") $fileout.= "<A onmouseover=\"showtrail(128,128,'images/$val');\" onmouseout=\"hidetrail();\">".$val."</A>";
		else if (substr($val, -3) == "gif") $fileout.= "<A HREF=\"images/$val\" TARGET=\"animated\" onmouseover=\"showtrail(128,128,'images/$val');\" onmouseout=\"hidetrail();\">".$val."</A>";
	if ($i % 10 == 0) $fileout.= "<BR>\n";
	else $fileout.= " | \n";
	}
}
if ($i > 0) echo "<font color=red>There are $i heatmap-related files already saved.</font><BR>\n";
echo $fileout;
?>
</body>
</html>

