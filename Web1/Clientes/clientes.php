<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Titulo</title>
        <meta charset="UTF-8">        
    </head>
    <body>
        <?php
        include('select.php')
        ?>
        <form 

            action="insert.php" method="post">
            <table border = 1>

                <tr><td>Informe seu nome: <input type=text name=campo1></td></tr>
                <tr><td>Informe seu sexo:
                        <input type=radio name=sexo value="M"> M
                        <input type=radio name=sexo value="F"> F
                    </td></tr> 

                <tr><td>
                        <select name = "cidade">
                             <?php
                            $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
                            $query = 'SELECT * FROM cidades';
                            $result = pg_query($conn, $query);

                            if ($result) {
                                while ($row = pg_fetch_assoc($result)) {
                                    echo "<option value='" . $row['codigo'] . "'>" . $row['nome'] . "</option>";
                                }
                            }
                            pg_close($conn);
                            ?>
                        </select>
                        <input type=submit name="submit" value="Enviar">
                    </td></tr>
                </td></tr> 
            </table>

        </form>
    </body>
</html>
