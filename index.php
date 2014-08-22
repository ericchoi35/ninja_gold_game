<?php
session_start();
// session_destroy();
if (!isset($_SESSION['counter'])) 
{
	$_SESSION['counter'] = 0;
}

?>
<!doctype html>
<html>
<head>
	<title>Ninja Gold Game</title>
	<style type="text/css">
		#gold h2 {
			display: inline-block;
		}
		#gold h3 {
			margin-left: 10px;
			display: inline-block;
			border: 1px solid black;
			padding: 20px;
		}
		.box {
			border: 1px solid black;
			display: inline-block; vertical-align: top;
			width: 200px;
			height: 150px;
			text-align: center;
			margin-left: 30px;
		}
		#act div{
			border: 1px solid black;
			height: 300px;
			padding-left: 20px;
			overflow: scroll;
		}
		.red{
			color: red;
		}
		.green {
			color: green;
		}
	</style>
</head>
<body>
	<div id='gold'>
		<h2>Your Gold: </h2>
		<h3><?=$_SESSION['counter'] ?></h3>
	</div>

	<div class='box'>
		<h2>Farm</h2>
		<h3>(earns 10-20 golds)</h3>
		<form action="process.php" method="post">
			<input type="hidden" name="building" value="farm"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>
	
	<div class='box'>
		<h2>Cave</h2>
		<h3>(earns 5-10 golds)</h3>
		<form action="process.php" method="post">
			<input type="hidden" name="bat" value="cave"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<div class='box'>
		<h2>House</h2>
		<h3>(earns 2-5 golds)</h3>
		<form action="process.php" method="post">
			<input type="hidden" name="dr" value="house"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<div class="box">
		<h2>Casino!</h2>
		<h3>(earns/takes 0-50 golds)</h3>
		<form action="process.php" method="post">
			<input type="hidden" name="royal" value="casino"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<div id='act'>
		<h3>Activities:</h3>
		<div>
<?php 		if(isset($_SESSION['activities']))
			{  
				foreach($_SESSION['activities'] as $value)
				{	
					echo $value;
				}
			} 	?>
		</div>
	</div>
	<form action="process.php" method="post">
		<input type="hidden" name="action" value="reset"/>
		<input type="submit" value="Start Over"/>
	</form>
</body>
</html>