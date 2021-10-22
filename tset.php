<?php
session_start();
$values=$_SESSION['values'];
json_encode($values);
echo "Trial data value :  ";
print_r($values);
echo "<br/><br/>";

$val=$_SESSION['value'];
echo "Real data value :   ";
print_r($val);
echo "<br/><br/>";

$rxy=array();
$cd=array();
$cd['x']=$val['value1'];
$cd['y']=$val['value2'];
array_push($rxy, $cd);
echo "Co-ordinate of Real data :   ";

print_r($rxy);
echo "<br/><br/>";

$cgxy=count($values);
$cgxy=$cgxy/5;
$j=1;
$k=2;
$gxy=array();
for($i=0; $i < $cgxy/2 ; $i++){
	$ab=array();
	$ab['x']=$values[$i.$j];
	$ab['y']=$values[$i.$k];
	array_push($gxy,$ab);
}
echo "Non Potencial value :    ";
print_r($gxy);
echo "<br/><br/>";

$pxy=array();
for($i=$cgxy/2; $i < $cgxy ; $i++){
	$bc=array();
	$bc['x']=$values[$i.$j];
	$bc['y']=$values[$i.$k];
	array_push($pxy,$bc);
}
echo "Potencial value :    ";
print_r($pxy);
echo "<br/><br/>";

$w = array(
      array(0,0,0,0,0),
      array(0,0,0,0,0),
);
 $four=4;
 $mm=0;
 $mn=1;
 for ($i=0; $i < $cgxy ; $i++) {
 	$values[$i.$four]=100-$values[$i.$four];
 }
 for ($i=0; $i < 5 ; $i++) {
 	$t1=0;
 	$t2=0;
 	for ($j=0; $j < $cgxy ; $j++) { 
  		$t1=$t1+$values[$j.$i];
 		$t2=$t2+$values[$j.$i] * $values[$j.$i];
 	}		
 	echo $t1;
 	echo "_";
 	echo $t2;
 	echo " ";
 	$w[$mm.$i]=$t1/$cgxy;
 	$w[$mn.$i]=$t2/$cgxy;    
 }
 echo "Inicial value of Separator : ";
print_r($w);
echo "<br/><br/>";

for ($k=0; $k < 2 ; $k++) { 
	$p=0;
	while ($p<20) {
		$t=0;
		for ($i=0; $i<$cgxy/2; ) { 
			$s1=0;
			for ($m=0; $m < 5; $m++) { 
				$s1=$s1+$values[$i.$m]*$w[$k.$m];
			}
			if ($s1>=0) {
				for ($m=0; $m < 5; $m++) { 
					$w[$k.$m]=$w[$k.$m]-$values[$i.$m];
				}
				$i=0;
				$t=1;
			}
			else{
				$i++;
				$t=0;
			}
		}
		for ($i=$cgxy/2; $i<$cgxy; ) { 
			$s2=0;
			for ($m=0; $m < 5; $m++) { 
				$s2=$s2+$values[$i.$m]*$w[$k.$m];
			}
			if ($s2<=0) {
				for ($m=0; $m < 5; $m++) { 
					$w[$k.$m]=$w[$k.$m]+$values[$i.$m];
				}
				$i=0;
				$t=1;
			}
			else{
				$i++;
			}
		}
		if ($t==0) {
			break;
		}
		$p++;
	}
	if ($p==20) {
		echo " problem in s1";
		die();
	}
}
 echo " Modify value of Separator :    ";
 print_r($w);
 echo "<br/><br/>";

 for ($i=0; $i < $cgxy; $i++) { 
 	$s1=0;
 	$s2=0;
 	$m1=32000;
 	$m2=31000;
 	for ($j=0; $j <5 ; $j++) { 
 		$s1=$s1+abs($values[$i.$j]*$w[$mm.$j]);
 		$s2=$s2+abs($values[$i.$j]*$w[$mn.$j]);
 	}
 	if ($s1<$m1) {
 		$m1=$s1;
 	}
 	if ($s2<$m2) {
 		$m2=$s2;
 	}
 }
 if ($m1<$m2) {
 	$p=1;
 	$mx=$m2;
 }
 else{
 	$p=0;
 	$mx=$m1;
}

echo "<br/>";
print($w[$p.$p]);
echo "<br/>";
echo $mx;
echo "<br/>";
echo $p;
echo "<br/><br/>";

$s=0;
$m=0;
/*for ($m=1; $m < 5; $m++) { 
	$s=$s+$val[value][$m]*$w[$p.$m];
}*/
$s=$s+$val['value0']*$w[$p.$m];
$m=1;
$s=$s+$val['value1']*$w[$p.$m];
$m=2;
$s=$s+$val['value2']*$w[$p.$m];
$m=3;
$s=$s+$val['value3']*$w[$p.$m];
$m=4;
$s=$s+$val['value4']*$w[$p.$m];

if ($s>1) {
	echo '<span style="color: green; font-size: 50px;">Real data is Potencial  ';
}
else{
	echo '<span style="color: red; font-size: 50px;">Real data is Non-Potencial  ';
}
echo $s;

?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", 
	title:{
		text: "Potencial  Non-Potencial Graph Chart"
	},
	axisX:{
		title: "X-axis wise distance",
		suffix: "",
		includeZero: true
	},
	axisY:{
		title: "Y-axis wise distance",
		suffix: " ",
		includeZero: true
	},
	data: [{
		type: "scatter",
		markerType: "square",
		markerSize: 30,
		toolTipContent: "Y position: {y} <br>X position: {x} ",
		dataPoints: <?php echo json_encode($rxy, JSON_NUMERIC_CHECK);?>
    
 
	},
	{
		type: "scatter",
		markerType: "square",
		markerSize: 20,
		toolTipContent: "Y position: {y} <br>X position: {x} ",
		dataPoints: <?php echo json_encode($gxy, JSON_NUMERIC_CHECK);?>

	},
	{
		type: "scatter",
		markerType: "square",
		markerSize: 20,
		toolTipContent: "Y position: {y} <br>X position: {x} ",
		dataPoints: <?php echo json_encode($pxy, JSON_NUMERIC_CHECK); ?>
	}]
	
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<?php


?>
<?php
  echo "<table>
   <tr><th>X Co-ordinate</th><th>Y Co-ordinate</th><th>No of Message</th><th>Battery Percentage</th></tr>";
  for ($row = 0; $row <$cgxy; $row++) {
    echo"<tr>";
    for ($col = 1; $col < 5; $col++) {
      echo"<td>".$values[$row.$col]."</td>";
    }
    echo "</tr>\n";
  }
  echo "</table>";
?>        




