<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>    
        <?php
        include('selectcidade.php')
        ?>
        <form 
            action="insertcidade.php" method="post">
            <table>
                <tr><td>Informe o nome da cidade: <input type=text name=campo1></td></tr>
            </table>
            <input type=submit name="submit" value="Enviar">
      
        </form>

    </body>
</html>
