<html>
	<head>
		<title> PHP-Beispiel 1 </title>
		<meta name="author" content="Administrator"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css"  href="Aufgabe8_1.css" title="style1"/>
	</head>

	<!-- localhost:8080/bsp01.php -->

	<script type="text/javascript">
		// <![CDATA[
		"use strict";

		let xmlhttp1 = new XMLHttpRequest();
		xmlhttp1.onreadystatechange = receiveJson;  // Funktionspointer


		function startAjax(form) {
			"use strict";
			let param = 'Aufgabe8_2.php?'
			+ "xa=" + form.anfangswert.value
			+ "&xsw=" + form.schrittweite.value
			+ "&xe=" + form.endwert.value
			+ "&a2=" + form.a2.value
			+ "&a1=" + form.a1.value
			+ "&a0=" + form.a0.value;
			alert(param);
			xmlhttp1.open("GET", param);
			xmlhttp1.send();
		}  // startAjax


		function receiveJson() {
			"use strict";
			// alert(xmlhttp1.readyState);
			if (xmlhttp1.readyState == 4) {
				let elementAjax = document.getElementById("ajax");
				alert(xmlhttp1.responseText);
				//elementAjax.innerHTML= xmlhttp1.responseText;

				let objs = JSON.parse(xmlhttp1.responseText);
				let s = "<table><tr><th>x</th><th>y</th></tr>";
				for(let i in objs){
					let obj = objs[i];
					s += "<tr><td>" + obj.x + "</td>"
					+ "<td>" + obj.y + "</td></tr>";
				}
				s += "</table>";
				elementAjax.innerHTML = s;
			}  // if
		}  //receiveJson

		// ]]>
	</script>



<body>
	<h3>8. Aufgabe, Wertetabelle</h3>

	<form>
		<fieldset>
			<legend>X-Bereich</legend>
			Anfangswert<input type="text" name="anfangswert"  value ="0.0" /> <br />
			Schrittweite<input type="text" name="schrittweite"  value ="0.4" /> <br />
			Endwert<input type="text" name="endwert"  value ="8.0" /> <br />
		</fieldset>
		<fieldset>
			<legend>Polynom</legend>
			a<sub>2</sub><input type="text" name="a2" value = "2.0"/> <br>
			a<sub>1</sub><input type="text" name="a1" value = "-2"/> <br>
			a<sub>0</sub><input type="text" name="a0" value = "+5.0"/> <br>
		</fieldset>
		<input type="button" value="Send" onclick="startAjax(this.form)"/>
		<input type="reset" value="Delete"/><br />
	</form>

	<div id="ajax" />

</body>
</html>


















