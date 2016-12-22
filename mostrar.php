<!DOCTYPE html>
<html>
<body onload="cargardatos()">

	<h1>Mostrar tabla</h1>
	<div id="id01"></div>

	<script >
		function cargardatos(){
				
					var xmlhttp = new XMLHttpRequest();
					var url = "selectJSON.php";
					var artemp;
					setTimeout(function(){
					xmlhttp.onreadystatechange=function() {
						if (this.readyState == 4 && this.status == 200) {
							var myArr = JSON.parse(this.responseText);
							myFunction(myArr);
							cargardatos();
						}
					}
					xmlhttp.open("POST", url, true);
					xmlhttp.send();
					
				}, 3000);
		}


		function myFunction(arr) {
			var i;
			artemp=arr;
			var out = "<table>";

			for(i = 0; i < arr.length; i++) {
				out += "<tr><td>" +
				arr[i].idPeticion +
				"</td><td>" +
				arr[i].usuario +
				"</td><td>"+
				arr[i].texto +
				"</td><td>"+
				arr[i].fechaInicio +
				"</td></tr>";
			}
			out += "</table>";
			document.getElementById("id01").innerHTML = out;
		}

	</script>
</body>
</html>