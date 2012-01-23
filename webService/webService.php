<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['type'] = 'u'; // Unknown
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Web Service</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            require_once '../header.php';
            require_once '../menus/menu_webService.php';
            require_once '../menus/leftmenuWebService.php';
            include '../ini.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Web Service</h2>
                    <br/>
                    <br/>
                    <div id="containt_main_users">
                        <p>
                            <b>Aqui pode ter acesso a dois tipos de serviços:</b>
                        </p>
                        <ul>
                            <li> Um que você indica o id do projecto que pretende e 
                                recebe como respota o seu conteúdo</li>
                            <li> outro em que lhe pode enviar uma lista de keywords separadas
                            por ; (ponto e vírgula) e recebe uma listagem dos projectos 
                            com umas dessas keywords.</li>
                        </ul>
                        <br/>
                        <br/>
                        <div style="width: 100%; text-align: center;">
                           <img src="../css/images/service.png"/>
                           </div>
                    </div>

                    <br/>
                </div>
                <div id="content_bottom"></div>

                <?php
                require_once '../menus/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
