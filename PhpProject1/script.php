<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    <body>

        <?php
        $r1 = array('O valor de CAMPO1 é:', 'O valor de CAMPO2 é: ', 'Campo Hidden:', 'Olá: ', 'email: ',
            'Sua mensagem: ', 'Seu sistema operacional é: ', 'Seu monitor é: ', 'Seu processador é: ',);



        $r2 = array($_POST["campo1"], $_POST["campo2"], $_POST["escondido"], $_POST["nome"], $_POST["email"], $_POST["mensagem"],
            $_POST["sistema"], $_POST["monitor"], $_POST["processador"]);

        echo'<table border=1><tr>';

        foreach ($r1 as $key => $value) {

            echo '<tr>';
            echo '<td>' . $r1[$key] . '</td>';
            echo '<td>' . $r2[$key] . '</td>';
            echo '</tr>';
        }


        if (isset($_POST["livros"])) {
            echo '<tr>';
            echo '<td>' . "O(s) livro(s) que você deseja comprar:" . '</td>';
            echo '<td>';
            foreach ($_POST["livros"] as $livro) {
                echo "- " . $livro . "";
            }


            echo '</td></tr>';
        } else {
            echo '<tr><td>' . "Você não escolheu nenhum livro!" . '</tr></td>';
        }



        if (isset($_POST["numeros"])) {
            echo '<tr>';
            echo '<td>' . "Os números de sua preferência são:" . '</td>';
            echo '<td>';
            foreach ($_POST["numeros"] as $numero) {
                echo " - " . $numero . "";
            }
            echo '</td></tr>';
        } else {
            echo '<tr><td>' . "Você não escolheu número preferido!" . '</tr></td>';
        }


        if (isset($_POST["news"])) {
            echo '<tr>';
            echo '<td>' . "Você deseja receber as novidades por email!" . '</td>';
            echo '</tr>';
        } else {
            echo '<td>' . "Você não quer receber novidades por email..." . '</td>';
        }





        echo '</tr></table>';

        print_r($_POST)
        ?>




    </body>
</html>
