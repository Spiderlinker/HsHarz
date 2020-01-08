<html>
	<head>
		<title> PHP-Beispiel 1 </title>
		<meta name="author" content="Administrator"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css"  href="Aufgabe1_1.css" title="style1"/>
	</head>

	<!-- localhost:8080/bsp01.php -->

	<script type="text/javascript">
		// <![CDATA[
		"use strict";

		let xmlhttp1 = new XMLHttpRequest();
		xmlhttp1.onreadystatechange = receiveJson;  // Funktionspointer


		function startAjax(form) {
			"use strict";
			let param = 'Aufgabe1_2.php?zahl=' + form.zahl.value;
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
				elementAjax.innerHTML= xmlhttp1.responseText;
				let obj = JSON.parse(xmlhttp1.responseText);
				elementAjax.innerHTML =
				"<ul><li>" + obj.zahl + "</li>"
				+ "<li>Die Zahl ist " + (obj.isEven ? "gerade" : "ungerade") + "</li></ul> ";
			}  // if
		}  //receiveJson

		// ]]>
	</script>


<body>
	<h3>1. Aufgabe, Zahl ist gerade</h3>
	<form>
		<fieldset>
			<legend>Eingabe</legend>
			Zahl<input type="number" name="zahl"  min="0"  max="100" value ="12" /> <br />
		</fieldset>
		<input type="button" value="Send" onclick="startAjax(this.form)"/>
		<input type="reset" value="Delete"/><br />
	</form>

	<div id="ajax" />

</body>
</html>












