<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Estat�sticas - Reposit�rioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            include '../header.php';
            include '../menus/menu_estatisticas.php';
            include '../menus/leftmenuEstatisticas.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Estat�sticas</h2>
                    <br/>
                    <br/>
                    Aqui poder�o visualizar algumas estat�sticas relativas a acessos ao sistema e 
                    aos dep�sitos, downloads e consultas de projetos.
                    <br/>
                    <br/>
                    <div style="width: 100%; text-align: center;">
                        <img src="../css/images/statistics.png"/>
                    </div>
                </div>
                <div id="content_bottom"></div>

                <?php
                include '../menus/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
