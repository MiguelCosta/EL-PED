<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'c'))) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir - RepositórioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            include '../header.php';
            include '../menus/menu_submeter.php';
            include '../menus/leftmenuSubmeter.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Submeter Trabalhos/Projectos</h2>
                    <br/>
                    
                    <div style="width: 100%; text-align: center;">
                        <img src="../css/images/submit.png"/>
                    </div>
                    <br/>
                    <p>
                        Nesta categoria pode submeter os seus projectos.
                    </p>
                    <br/>
                    <p> Para submeter pode user o nosso assistente ou caso já tenho um ficheiro zip 
                        com a devida estrutura também o pode.</p>
                    <p>Tenha em atenção todos os requisitos necessários para a submissão, pode ver o 
                        <a href="../util/pr.xsd" target="_blank">XML Schema
                        aqui</a></p>
                    <br/>
                    <h4>Descrição do pacote a submeter:</h4>

                    <?php
                    include 'text/descricao_sip.php';
                    ?>

                </div>
                <div id="content_bottom"></div>

                <?php
                include '../menus/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
