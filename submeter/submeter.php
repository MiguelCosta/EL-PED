<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'c'))) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir - Reposit�rioPED</title>
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
                    <p> Para submeter pode user o nosso assistente ou caso j� tenho um ficheiro zip 
                        com a devida estrutura tamb�m o pode.</p>
                    <p>Tenha em aten��o todos os requisitos necess�rios para a submiss�o, pode ver o 
                        <a href="../util/pr.xsd" target="_blank">XML Schema
                        aqui</a></p>
                    <br/>
                    <h4>Descri��o do pacote a submeter:</h4>

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
