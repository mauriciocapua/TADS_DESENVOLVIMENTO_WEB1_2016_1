 <?php
$r1 = $_POST["campo1"];

$conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
pg_query($conn, "INSERT INTO cidades (nome) values ('$r1')");

pg_close($conn);

function execute($selectcidade) {
    include_once($selectcidade);
}

execute('selectcidade.php');
?> 
