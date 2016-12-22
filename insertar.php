<!DOCTYPE html>
<html>
<body>
	<script>
		function insertarDatos(){
			var xmlhttp = new XMLHttpRequest();

			var usr = document.getElementById("usr").value;
			var pregunta = document.getElementById("pregunta").value;
			var currentdate = new Date(); 

			var params= "usr="+ usr +"&pregunta=" + pregunta;	

			var url = "insertarJSONJAVA.php";

			xmlhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
					//console.log("!!!!!! "+this.responseText);
					cleanForm();
				}
			}
			xmlhttp.open("POST", url, true);
			xmlhttp.setRequestHeader("Content-type","application/json");
			var paramsJson = construirJson("formularioInsert");	
			console.log(paramsJson);
			xmlhttp.send(JSON.stringify(paramsJson));

		}

		function construirJson(idForm) {
		var form = document.getElementById(idForm);
		var json = {};
		for (var i = 0; i < form.length; i++) {
			var elemento = form[i];
			json[elemento.id] = elemento.value;
		}
		console.log(json);
		return json;
	}


	function cleanForm(){
		var inputs = document.formu1.getElementsByTagName("input");
		for(var i=0;i<inputs.length;i++){
			inputs[i].value = "";
		}
	}

</script>

<form name="formu1" id="formularioInsert" action="DepositosNuevoModifcarBorrar.php" method="Post">
	<p>USUARIO:<br></p>
	<input type="text"  id="usr" name="usuario" required /><br>
	<p>PREGUNTA:<br></p>
	<input type="text" id="pregunta" name="pregunta"> <br>
</form>
<p></p>
<button name="NuevoDeposito" onclick="insertarDatos()">Insertar</button>
</body>
</html>