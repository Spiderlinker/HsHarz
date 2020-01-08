<?php

	class Pair {
		public $x = 0.0;
		public $y = 0.0;
	}

	function checkDouble($key){
		$zahl = 0.0;
		if(isset($_GET[$key])){
			$str_zahl = $_GET[$key];
			if (is_numeric($str_zahl)) {
				$zahl = doubleval($str_zahl);
			}
		}
		return $zahl;
	}

	$ok = true;
	$error = '';

	$xa = checkDouble("xa");
	$xsw = checkDouble("xsw");
	$xe = checkDouble("xe");
	$a2 = checkDouble("a2");
	$a1 = checkDouble("a1");
	$a0 = checkDouble("a0");

	$table = array();
	for($x = $xa; $x <= $xe; $x = round($x + $xsw, 3)) {
		$pair = new Pair();
		$pair->x = $x;
		$pair->y = round(($a2 * ($x * $x)) + ($a1 * $x) + ($a0), 3);
		$table[] = $pair;
	}

	echo json_encode($table);


?>










































