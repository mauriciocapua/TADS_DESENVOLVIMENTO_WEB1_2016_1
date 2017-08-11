function mostra() {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("db").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", "../pgs/ambos.php");
    xmlhttp.send();

}