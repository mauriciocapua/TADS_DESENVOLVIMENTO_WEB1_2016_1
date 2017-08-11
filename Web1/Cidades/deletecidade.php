<?php

if ($_POST['submit'] == "Deletar") {
    if (!empty($_POST["deletar"])) {
        $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
        $deletar = (int) $_POST["deletar"];

        $query = "select count(*) from clientes where cod_cidade='$deletar'";
        $result_select = pg_query($conn, $query);
        if ($query > 0) {
            echo 'Cidade não pode ser deletada!';
            pg_close($conn);

            function execute($selectcidade) {
                include_once($selectcidade);
            }

            execute('selectcidade.php');
        } else {

            $query1 = "DELETE FROM cidades where codigo='$deletar'";

            $result = pg_query($conn, $query1);
            if (!$result) {

                printf("<h1>ERRO</h1>");
                //$errormessage = pg_errormessage($conn);
                //echo $errormessage;
                exit();
                pg_close($conn);
            }

            function execute($selectcidade) {
                include_once($selectcidade);
            }

            execute('selectcidade.php');
        }
    } else {
        echo 'Selecione alguma cidade!';

        function execute($selectcidade) {
            include_once($selectcidade);
        }

        execute('selectcidade.php');
    }
}


if ($_POST['submit'] == "Inserir") {


    include_once('Cidade.php');
}
?>


