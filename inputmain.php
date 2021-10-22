<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style2.css">
<?php
	session_start();
	$value=$_GET['value'];
	if($_SERVER['REQUEST_METHOD']=='POST'){
  	$values=$_POST;
  	$_SESSION['values']=$values;
  	header('location:input.php');
  	

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
			<th>Fixed Value</th>
			<th>X-axis</th>
			<th>Y-axis</th>
			<th>No of Msg</th>
			<th>Battery %</th>


		<?php
		for($i=0; $i<$value; $i++)
		{
		?>
		<tr>
		<?php
		for($j=0;$j<5;$j++){
		?>
		<td><input type="number" name="<?php echo $i;echo $j;?>" id="sum"></td>
		<?php
		}
		?>
		</tr>
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
