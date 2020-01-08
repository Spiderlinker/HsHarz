<html>
	<head>
		<title> PHP-Beispiel 1 </title>
		<meta name="author" content="Administrator"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css"  href="Aufgabe1.css" title="style1"/>
	</head>

	<!-- localhost:8080/bsp01.php -->

<body>
	<h3>Aufgabe 1 (PHP)</h3>
<?php
	$datetime = new DateTime();
	echo $datetime->format('Y/m/d H:i:s');
?>

</body>
</html>

