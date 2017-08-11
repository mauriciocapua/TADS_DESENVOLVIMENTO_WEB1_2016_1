    <?php

    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    if ($_POST['submit'] == "Deletar") {
        if (!empty($_POST["deletar"])) {
            $deletar = (int) $_POST["deletar"];
            $query = "DELETE FROM filhos where codigo='$deletar'";
            $result = pg_query($conn, $query);

            if (!$result) {

                printf("<h1>ERRO</h1>");
                $errormessage = pg_errormessage($conn);
                echo $errormessage;
                exit();
            }
            pg_close($conn);

            function execute($select) {
                include_once($select);
            }

            execute('../Clientes/select.php');
        }
    }
    ?>