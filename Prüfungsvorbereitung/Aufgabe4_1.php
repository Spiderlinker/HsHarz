<html>
	<head>
		<title> PHP-Beispiel 1 </title>
		<meta name="author" content="Administrator"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css"  href="Aufgabe4_1.css" title="style1"/>
	</head>

	<!-- localhost:8080/bsp01.php -->

	<script type="text/javascript">
		// <![CDATA[
		"use strict";

		let xmlhttp1 = new XMLHttpRequest();
		xmlhttp1.onreadystatechange = receiveJson;  // Funktionspointer


		function startAjax(form) {
			"use strict";
			let param = 'Aufgabe4_2.php?zahl=' + form.zahl.value + '&ziffer=' + form.ziffer.value;
			//alert(param);
			xmlhttp1.open("GET", param);
			xmlhttp1.send();
		}  // startAjax


		function receiveJson() {
			"use strict";
			// alert(xmlhttp1.readyState);
			if (xmlhttp1.readyState == 4) {
				let elementAjax = document.getElementById("ajax");
				//alert(xmlhttp1.responseText);
				//elementAjax.innerHTML= xmlhttp1.responseText;

				let obj = JSON.parse(xmlhttp1.responseText);
				elementAjax.innerHTML = "<ul>"
				+ "<li>Zahl: " + obj.zahl + "</li>"
				+ "<li>Ziffer: " + obj.ziffer + "</li>"
				+ "<li>Anzahl: " + obj.anzahl + "</li>"
				+ "</ul> ";
			}  // if
		}  //receiveJson

		// ]]>
	</script>



<body>
	<h3>4. Aufgabe, Ziffern zählen</h3>

	<form>
		<fieldset>
			<legend>Eingabe</legend>

			Zahl <input type="number" name="zahl" value = "33355423" /> <br>
			Ziffer, die gezählt werden soll <input type="number" name="ziffer" value="3" />
		</fieldset>

		<input type="button" value="Send" onClick="startAjax(this.form)" />
		<input type="reset" value="Delete" />
	</form>

	<div id="ajax" />

</body>
</html>






