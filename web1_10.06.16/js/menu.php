<html><head><script>
    function mostrar(str) {
        if (str == "")x {

            document.getElementById("txtHint").innerHTML = "";
            return;

        } else {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "getuser.php?q=" + str, true);
            xmlhttp.send();
        }
    }
        </script></head><body><form>
            <select name="users" onchange="mostrar(this.value)">
                <option value="">Select a person:</option>
                <option value="1">Peter Griffin</option>
                <option value="2">Lois Griffin</option>
            </select>
        </form><br>
        <div id="txtHint"></div>
    </body>
</html>