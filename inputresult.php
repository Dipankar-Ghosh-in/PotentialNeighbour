<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style2.css">
<?php/*
	$value=$_GET['value'];
	if($_SERVER['REQUEST_METHOD']=='POST'){
  	$values=$_POST;
  	print_r($values);*/

	}
?>
<?php
	session_start();
	//$value=$_GET['value'];
	if($_SERVER['REQUEST_METHOD']=='POST'){
  	$values=$_POST;
  	$_SESSION['value']=$values;
  	header('location:tset.php');
  	

	}
?>





<head>
	<title>
  		
	</title>
</head>
<body>
<div class="nn">
	
	

	<form name="f1" method="post">

		<h1>Enter Your Data</h1>
		<table>
			<tr>
			<th>Fixed Value</th>
			<th>X-axis</th>
			<th>Y-axis</th>
			<th>No of Msg</th>
			<th>Battery %</th>
		</tr>
		<?php
		echo "<br/>";
		
		for($i=0; $i<5; $i++)
		{
		?>
	
		<td><input type="number" name="value<?php echo $i;?>" id="sum"></td>
		<?php
		}
		?>
		
		</table>

		
			<!input type="submit" class="ss">
			<button id="button">Submit</button>
		
		

	</form>
</div>
</body>
</html>
