function mostra(string) {
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	document.getElementById("principal").innerHTML = xmlhttp.responseText;
	}

	};
	xmlhttp.open("GET",string+".php");
	xmlhttp.send();
	
}