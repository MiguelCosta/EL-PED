<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username']) {
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
            include '../menus/menu_gerirU.php';
            include '../menus/leftmenuGerir.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Gerir o Repositório</h2>
                    <br/>
                    <br/>
                    <h3>Gestão de Utilizadores</h3>
                    <p>Aqui pode realizar as tarefas de gestão relacionadas com os utilizadores.</p>
                    <br/>
                    <h3>Gestãpo de Submissões</h3>
                    <p>Relativamente ás tarefas de gestão do que foi submetido, apenas os administradores
                        pode apagar, alterar e/ou remover o que foi ingerido no repositório.</p>
                    <br/>
                    <br/>
                </div>
                <div id="content_bottom"></div>

                <?php
                include '../menus/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>