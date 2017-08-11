<?php

function cliente_select() {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $query = 'select clientes.codigo, clientes.nome, clientes.sexo, cidades.nome as nome_cidade from clientes inner join cidades on (cod_cidade = cidades.codigo)';
    $result = pg_query($conn, $query);
    echo '<table border = 1>';

    echo '<td>Código:</td><td>Nome:</td><td>Sexo:</td><td>Cidade:</td><td>Deletar</td><td>Alterar</td><td>Mostrar filhos</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td><td>' . $row['sexo'] . '</td><td>' . $row['nome_cidade'] . '</td>';

            echo '<td><button onclick="cliente_delete(' . $row['codigo'] . ')">Deletar</td>';
            echo '<td><button onclick="cliente_update(' . $row['codigo'] . ', ' . $row['nome'] . ', ' . $row['sexo'] . ', ' . $row['nome_cidade'] . ')">Alterar</td>';
            echo '<td><button onclick="cliente_filhoselect(' . $row['codigo'] . ')">Mostrar filhos</td>';

            echo '</tr>';
        }
    }
    echo'</td></tr>';
    echo '<tr><td colspan = "7"><button onclick = "cliente_forminsert()">Inserir</td></tr>';
    echo '</table>';
    pg_close($conn);
}

function cliente_delete($codigo) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $deletar = (int) $codigo;
    $query = "DELETE FROM clientes where codigo='$deletar'";
    $result = pg_query($conn, $query);

    if (!$result) {

        printf("<h1>ERRO</h1>");
        $errormessage = pg_errormessage($conn);
        echo $errormessage;
        exit();
    }
    pg_close($conn);
}

function cliente_insert($r1, $r2, $r3) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    pg_query($conn, "INSERT INTO clientes (nome, sexo, cod_cidade) values ('$r1','$r2','$r3')");
    pg_close($conn);
}

function cliente_alterar($r1, $r2, $r3) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    pg_query($conn, "update clientes set nome = '$r1', sexo ='$r2', cod_cidade=$cidade where codigo = '$alt'");
    pg_close($conn);
}

function cliente_mostrafilho($codigo) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $deletar = (int) $codigo;
    $query = "SELECT * FROM filhos where id_clientes =$deletar";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';
    echo '<td>Código cliente:</td><td>Código filho:</td><td>Nome:</td><td>Deletar</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_clientes'] . '</td><td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td>';
            echo '<td><button onclick="cliente_filhodelete(' . $row['codigo'] . ', ' . $row['id_clientes'] . ')">Deletar</td>';
            echo '</tr>';
        }
    }
    echo '</table>';
    pg_close($conn);
}

function Adicionar_filhos() {
    $guardar = $_POST["codigo"];

    echo '<table>';

    echo '<tr><td>Informe seu nome: <input type = text name = campo1 required></td></tr>';
    echo '<tr><td><input type = hidden name = codigo value =' . $guardar . '></td></tr>';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type = submit name = "submit" value = "Enviar">';

//<form action = "../filhos/deletafilhos.php" method = "post">

    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $deletar = (int) $_POST["codigo"];
    $query = "SELECT * FROM filhos where id_clientes =$deletar";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';
    echo '<td>Código cliente:</td><td>Código filho:</td><td>Nome:</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_clientes'] . '</td><td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td>';
            echo '<td><input type=radio name=deletar value="' . $row['codigo'] . '"><tr>';
            echo '</tr>';
        }
    }
    echo '</table>';
    pg_close($conn);
    echo '<input type = submit name = submit value = "Deletar">';
}

function buttoncidade() {
    
}

///////////////////////////////FILHOS////////////////////////////////////////////////////////////

function filho_select() {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $query = "SELECT clientes.nome as cliente_nome, clientes.codigo as cliente_codigo , filhos.codigo as filho_codigo, filhos.nome as filho_nome FROM filhos inner join clientes on (id_clientes = clientes.codigo)";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';
    echo '<td>Código cliente:</td><td>Código cliente:</td><td>Nome:</td><td>Código filho:</td><td>Deletar</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['cliente_nome'] . '</td><td>' . $row['cliente_codigo'] . '</td><td>' . $row['filho_nome'] . '</td><td>' . $row['filho_codigo'] . '</td>';
            echo '<td><button onclick = "filho_delete(' . $row['filho_codigo'] . ')">Deletar</td>';
            echo '</tr>';
        }
    }
    echo '<tr><td colspan = "5"><button onclick = "filho_forminsert()">Inserir</td></tr>';
    echo '</table>';
    pg_close($conn);
}

function filho_delete($codigo) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $deletar = (int) $codigo;
    $query = "DELETE FROM filhos where codigo='$deletar'";
    $result = pg_query($conn, $query);

    if (!$result) {

        printf("<h1>ERRO</h1>");
        $errormessage = pg_errormessage($conn);
        echo $errormessage;
        exit();
    }
    pg_close($conn);
}

function filho_insert($r1, $r2) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    pg_query($conn, "INSERT INTO filhos (nome,id_clientes) values ('$r1','$r2')");

    pg_close($conn);
}

///////////////////////////////CIDADES////////////////////////////////////////////////////////////


function cidade_select() {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $query = 'SELECT * FROM cidades';
    $result = pg_query($conn, $query);
    echo '<table border = 1>';

    echo '<td>Código:</td><td>Nome:</td><td>Deletar</td><td>Alterar</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td>';
            echo '<td><button onclick = "cidade_delete(' . $row['codigo'] . ')">Deletar</td>';
            echo '<td><button onclick = "cidade_formupdate(' . $row['codigo'] . ')">Alterar</td>';
            echo '</tr>';
        }
    }

    echo '<tr><td colspan = "4"><button onclick = "cidade_forminsert()">Inserir</td></tr>';

    echo '</table>';
    pg_close($conn);
}

function cidade_delete($codigo) {
    $deletar = (int) $codigo;
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $query = "select count(*) from clientes where cod_cidade='$deletar'";
    $result_select = pg_query($conn, $query);
    if ($query > 0) {
        echo 'Cidade não pode ser deletada!';
        pg_close($conn);
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
    }
}

function cidade_insert($r1) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    pg_query($conn, "INSERT INTO cidades (nome) values ('$r1')");
    pg_close($conn);
}

function cidade_alterar($r1, $r2) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    pg_query($conn, "update cidades set nome = '$r2' where codigo = '$r1'");
    pg_close($conn);
}

function cidade_selectone($r1) {
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $deletar = (int) $r1;
    $query = "SELECT * FROM cidades where codigo=$deletar";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';

    echo '<td>Código:</td><td>Nome:</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td>';
            echo '</tr>';
        }
    }
    echo '</table>';
    pg_close($conn);
}
