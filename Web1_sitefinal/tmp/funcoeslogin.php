<?php

session_start();

function logout() {
//unset($_SESSION['login']);
    session_destroy();
    header("Location: ../pgs/login.php");
}

function verificaSessao() {
    if (!isset($_SESSION['login'])) {
        verificar_login();
    }
}

function verificar_login() {


    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1_login' user = 'postgres' password = '123'");
    $query = "select * from login where usuario='" . $_POST['user'] . "' and senha='" . $_POST['senha'] . "'";
    $result = pg_query($query);
    $rows = pg_NumRows($result);


    if ($rows > 0) {
        $_SESSION['login'] = $_POST['user'];
        pg_close($conn);
    } else {
//echo 'usuário não incluso no banco';
        header("Location: login.php");
    }
}
