<?php

	$ok = true;
	$text= 0;
	$error = '';

	if ( isset($_GET['text']) ){   // Ist gesetzt?
		$text= $_GET['text'];
	}
	else {
		$ok = false;
		$error.="Error: The param 'text' are not passed<br />";
	}


	if($ok) {

	// str_replace(gesuchtesZeichen, wirdMitDiesemZeichenErsetzt, TextInDemDieZeichenErsetztWerdenSollen)
	$text = str_replace(',', '', $text); // Zeichen im gegebenen Text mit anderem Zeichen ersetzen

	// explode(" ", "Hallo Welt") wird zu {"Hallo", "Welt"}
	$splittedText = explode(" ", $text ); // Text aufspalten nach gegebenem Zeichen

	sort($splittedText); // Array / Liste sortieren

	echo json_encode($splittedText);
}


else{
	echo $error;
}


?>












































