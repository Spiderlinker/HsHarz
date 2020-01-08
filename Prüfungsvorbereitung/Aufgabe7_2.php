<?php

	class Number {
		public $zahl = 0;
		public $liste = 0;
	}

	$ok = true;
	$zahl = 0;
	$error = '';

	if ( isset($_GET['zahl']) ){   // Ist gesetzt?
		$str_zahl = $_GET['zahl'];
		if (is_numeric($str_zahl)) {
			$zahl = intval ( $str_zahl, 10 );
		}
		else {
			$ok = false;
			$error.="Error in number conversion: the variable 'zahl' is not any number<br />";
		}
	}
	else {
		$ok = false;
		$error.="Error: The param 'zahl' are not passed<br />";
	}


	if($ok) {

		$numberList = array();

		for($i = 1; $i <= $zahl; $i++){
			$number = new Number();
			$number->zahl = $i;

			$zahlenliste = array();
			for($j = $i - 1; $j > 0; $j--){
				$zahlenliste[] = $j;
			}
			$number->liste = $zahlenliste;

			$numberList[] = $number;
		}
		echo json_encode($numberList );
	}
	else{
		echo $error;
	}
?>


































