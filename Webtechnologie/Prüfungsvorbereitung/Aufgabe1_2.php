

<?php

	class Number {
		public $zahl = 0;
		public $isEven = false;

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

	if($ok){
		$number = new Number ();
		$number->zahl = $zahl;
		$number->isEven = $zahl % 2 == 0;
		echo json_encode($number);

	}
	else{
		echo $error;
	}

?>





