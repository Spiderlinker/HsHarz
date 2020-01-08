<html>
	<head>
		<title> PHP-Beispiel 1 </title>
		<meta name="author" content="Administrator"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css"  href="Aufgabe6_1.css" title="style1"/>
	</head>

	<!-- localhost:8080/bsp01.php -->

	<script type="text/javascript">
		// <![CDATA[
		"use strict";

		let xmlhttp1 = new XMLHttpRequest();
		xmlhttp1.onreadystatechange = receiveJson;  // Funktionspointer


		function startAjax(form) {
			"use strict";
			let param = 'Aufgabe6_2.php?zahl1=' + form.zahl1.value + "&zahl2=" + form.zahl2.value;
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
				elementAjax.innerHTML = "<table>"
				+ "<tr>"
				+ " <td>1. Zahl</td>"
				+ " <td>2. Zahl</td>"
				+ " <td>Summe</td>"
				+"</tr>"
				+ "<tr>"
				+ " <td>" + obj.zahl1 + "</td>"
				+ " <td>" + obj.zahl2 + "</td>"
				+ " <td>" + obj.summe + "</td>"
				+"</tr>";
			}  // if
		}  //receiveJson

		// ]]>
	</script>



<body>
	<h3>6. Aufgabe, Addition</h3>

	<form>
		<fieldset>
			<legend>Eingabe</legend>
			1. Zahl <input type="number" name="zahl1" value = "5" onChange="startAjax(this.form)" /> <br>
			2. Zahl <input type="number" name="zahl2" value = "12" onChange="startAjax(this.form)" /> <br>
		</fieldset>
	</form>

	<div id="ajax" />

</body>
</html>



