<?php
include("../tmp/funcoes.php");
verificaSessao();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="../css/site.css">
        <script type="text/javascript" src="../js/mostra.js"></script>
    </head>
    <body>
        <div class="tudo">
            <header>
                <div class="header"> <?php include("../tmp/header.php"); ?> 
                </div>
            </header>
            <div class="meio">
                <nav>
                    <div class="menu"> <?php include("../tmp/menu.php"); ?></div>
                </nav>
                <section>
                    <div id="db">

                    </div>
                </section>
            </div>
            <footer> <div class="footer"> <?php include("../tmp/footer.php"); ?></div></footer>
        </div>
    </body>
</html>
