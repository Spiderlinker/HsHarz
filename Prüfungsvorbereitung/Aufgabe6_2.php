<?php

	class Number {
		public $zahl1 = 0;
		public $zahl2 = 0;
		public $summe = 0;
	}

	$ok = true;
	$zahl1 = 0;
	$zahl2 = 0;
	$error = '';

	if ( isset($_GET['zahl1']) ){   // Ist gesetzt?
		$str_zahl1 = $_GET['zahl1'];
		if (is_numeric($str_zahl1)) {
			$zahl1 = intval ( $str_zahl1, 10 );
		}
		else {
			$ok = false;
			$error.="Error in number conversion: the variable 'zahl1' is not any number<br />";
		}
	}
	else {
		$ok = false;
		$error.="Error: The param 'zahl1' are not passed<br />";
	}

	if ( isset($_GET['zahl2']) ){   // Ist gesetzt?
		$str_zahl2 = $_GET['zahl2'];
		if (is_numeric($str_zahl2)) {
			$zahl2 = intval ( $str_zahl2, 10 );
		}
		else {
			$ok = false;
			$error.="Error in number conversion: the variable 'zahl2' is not any number<br />";
		}
	}
	else {
		$ok = false;
		$error.="Error: The param 'zahl2' are not passed<br />";
	}

	if($ok) {

		$number = new Number();
		$number->zahl1 = $zahl1;
		$number->zahl2 = $zahl2;
		$number->summe = $zahl1 + $zahl2;
		echo json_encode($number);
	}
	else{
		echo $error;
	}
?>






























