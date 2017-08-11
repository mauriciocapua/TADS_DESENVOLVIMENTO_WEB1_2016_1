<?php

$r1 = $_POST["campo1"];
$r2 = $_POST["codigo"];

$conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
pg_query($conn, "INSERT INTO filhos (nome,id_clientes) values ('$r1','$r2')");

pg_close($conn);

function execute($select) {


    include_once($select);
}

execute('../clientes/select.php');
?>





