 <?php
//print_r($_POST);
$r1 = $_POST["campo1"];
$r2 = $_POST["sexo"];
$r3 = $_POST["cidade"];
$conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
pg_query($conn, "INSERT INTO clientes (nome, sexo, cod_cidade) values ('$r1','$r2','$r3')");

pg_close($conn);

function execute($select) {
    include_once($select);
}

execute('select.php');
?> 
