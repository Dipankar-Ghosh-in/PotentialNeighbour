<?php
session_start();
$values=$_SESSION['values'];
json_encode($values);
echo "Trial data value :  ";
print_r($values);
echo "<br/><br/>";

$cgxy=count($values);
$cgxy=$cgxy/5;
$j=1;
$k=2;
$nxy=array();
for($i=0; $i < $cgxy/2 ; $i++){
	$ab=array();
	$ab['x']=$values[$i.$j];
	$ab['y']=$values[$i.$k];
	array_push($nxy,$ab);
}
echo "Non Potencial value :    ";
print_r($nxy);
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
echo "<br/><br/>";
echo "<br/><br/>";
echo "<br/><br/>";
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
		suffix: " ",
		includeZero: true
	},
	axisY:{
		title: "Y-axis wise distance",
		suffix: " inch",
		includeZero: true
	},
	data: [{
		type: "scatter",
		markerType: "triangle",
		markerSize: 20,
		toolTipContent: "Non-Potencial<br>Y position: {y} <br>X position: {x} ",
		dataPoints: <?php echo json_encode($pxy, JSON_NUMERIC_CHECK);?>

	},
	{
		type: "scatter",
		markerType: "square",
		markerSize: 20,
		toolTipContent: "Potencial<br>Y position: {y} <br>X position: {x} ",
		dataPoints: <?php echo json_encode($nxy, JSON_NUMERIC_CHECK); ?>
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

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="text2.css">
<head>
  <title>
 
  </title>  
</head>
<body>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$value=$_POST['regName'];
	header('location:inputresult.php?value='.$value);
	
}

?>

<form method="post">

  	<div class="but">
	<!input type="submit" id="button">
	<button id="button">REAL-DATA</button>
	</div>
	

</form>

</div>


</body>
</html>
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
