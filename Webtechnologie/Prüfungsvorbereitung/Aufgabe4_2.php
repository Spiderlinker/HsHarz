<?php

	class Number {
		public $zahl = 0;
		public $ziffer = 0;
		public $anzahl = 0;
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

	if ( isset($_GET['ziffer']) ){   // Ist gesetzt?
		$str_ziffer = $_GET['ziffer'];
		if (is_numeric($str_ziffer)) {
			$ziffer= intval ( $str_ziffer, 10 );
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

		$number = new Number();
		$number->zahl = $zahl;
		$number->ziffer = $ziffer;
		$amount = 0;
		$splittedNumber = str_split($zahl, 1);
		foreach($splittedNumber as $n){
			if(intval($n) == $ziffer){
				$amount++;
			}
		}

		$number->anzahl = $amount;
		echo json_encode($number);
	}
	else{
		echo $error;
	}
?>


























