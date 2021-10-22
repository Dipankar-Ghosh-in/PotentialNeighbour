<!DOCTYPE html>
<html>
  <link rel="stylesheet" type="text/css" href="style3.css">

<head>
  <title>
 
  </title>  
</head>
<body>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$value=$_POST['regName'];
	$arr_size=$POST['regName'];
	header('location:inputmain.php?value='.$value);
}

?>
<!div class="viu">
	<div class="uee">
		<h1>Enter the number</h1>
	</div>





<form method="post">
	<div class="ins">
	<h2>Ad-hoc networks are local area networks that are also known as P2P networks because the devices communicate directly, without relying on servers. Like other P2P configurations, ad-hoc networks tend to feature a small group of devices all in very close proximity to each other.</h2>
	</div>

  	<input type="number" name="regName" value="" id="inputtext">

  	<div class="but">
	<!input type="submit" id="button">
	<button id="button">Submits</button>
	</div>
	

</form>

</div>


</body>
</html>