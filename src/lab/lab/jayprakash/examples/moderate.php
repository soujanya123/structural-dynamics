<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Damage Detection</title>
<link href="layout.css" rel="stylesheet" type="text/css"></link>
<script language="javascript" type="text/javascript" src="../excanvas.js"></script>
<script language="javascript" type="text/javascript" src="../jquery.js"></script>
<script language="javascript" type="text/javascript" src="../jquery.flot.js"></script>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-size: 14px;
}
.style4 {color: #FF33CC}
.style6 {
	font-weight: bold;
	color: #FF0000;
	font-size: 18px;
}
.style7 {font-size: 14px}
.style8 {
	font-weight: bold;
	color: #CC0000;
	font-size: 18px;
	font-style: italic;
}
.style10 {
	font-size: 18px;
	color: #990000;
	font-weight: bold;
}
-->
</style>
</head>

<body  >

<p align="left" class="style32"><div align="center" class="style32">
<span class="style1"></span>
<h2 class="style7" ><span class="style6">Damage Detection and Qualitative Quantification Using Electro-Mechanical Impedence (EMI) Technique        </span> </h2>
<div align="right" class="style25"><a href="../../exp7.html"  title="CLICK ON" class="style8">NEXT-EXPERIMENT</a></div>
<h2 class="style4">Line Graph for Moderate </h2>
<table width="120%"> 
  <tr> 
     <td width="4%" height="474" valign="middle"><img src="image/cond.jpg" width="19" height="130" /></td> 
    <td width="71%" valign="top" style="text-align:center;"> 
    
	<div id="placeholder"  align="center"  style="width:600px;height:400px;"></div>
    <p><img src="image/frn.jpg" width="130"  height="53" border="0" />     </p>    </td> 
    <td width="20%" valign="middle" style="text-align:center;"><p> </p>
      <img src="image/image.jpg" width="200" height="78" />
      </p>
      <p>
        <input   name="Button" type="button" class="style6" title="CLICK ON" onClick="window.open('moderate.zip', 'download'); return false;" value="Download Data!">
      </p></td> 
  </tr> 
</table> 
<script id="source" language="javascript" type="text/javascript">
$(function () {

 var linePoints =


<?php
$txt1 = $_POST['txt1'];
$txt2 = $_POST['txt2'];

$gap = ($txt2 - $txt1)*10;

$time = $gap < 500 ? 500 : 200;

$interval = ($gap <= 1000) ? 1 : ceil($gap/1000);

$count = 1;

$start_line_number = (($txt1 -1)*10 + 1);

$end_line_number = (($txt2 - 1)*10 );

$start = false;
$stop = false;




$array_string = "[";

$handle = @fopen("data/moderate.txt", "r");
if ($handle) {

    while (($buffer = fgets($handle, 4096)) !== false) {
	    if($count == $start_line_number) {
			$start = true;
		}
		
		if($count == $end_line_number + 1) {
			$stop = true;
		}
		
		if($start == true && $stop == false) {
			if (($count % $interval) == 0) {
				$tmp = explode("\t", $buffer);
				$current_value = "[" . $tmp[0] . "," . $tmp[1] . "] ,";
				$array_string = $array_string . $current_value;
			}	
		}
		$count++;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

$array_string = substr($array_string, 0, strlen($array_string)-1);
$array_string = $array_string . "]";

echo " " .$array_string;
?>

 	var i = 0;
    var arr = [[]];
    var timer = setInterval(function(){
     arr[0].push(linePoints[i]);
      $.plot($("#placeholder"), arr);
     i++;
     if(i === linePoints.length)
    	clearInterval(timer);
    },
	
	
	<?php
	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];

	$gap = ($txt2 - $txt1)*10;
	
	if($gap < 200) {
		$time =  500;
	}
	else if($gap < 400) {
		$time = 400;
	}
	
	else if ($gap < 600) {
		$time = 300;
	}
	
	else if ( $gap < 800) {
		$time = 200;
	}
	
	else {
		$time = 100;
	
	}
	
	echo $time;
	
	?>
	
	
	
	
	
	
	);
});
</script>

</p>
<p align="center" class="style30"><span class="style31 style10"> Signature acquisition in process</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</body>
</html>