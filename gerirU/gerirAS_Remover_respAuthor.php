<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'p'))) {
    header("Location: ../home.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gerir->Autores e Supervisores - RepositórioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            require_once '../header.php';
            require_once '../menus/menu_gerirU.php';
            require_once '../menus/leftmenuGerir.php';
            include '../ini.php';
            ?>
            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Remover Autor</h2>
                    <br/>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $authorcode = $_REQUEST["authorcode"];

                            $sql = "UPDATE Author SET remove='1' WHERE authorcode='$authorcode'";
                            mysql_query($sql, $con) or die(mysql_error());
                            echo "<div class=\"success\">Autor removido com sucesso!</div>";

                            // Insercao no registo de logs
							log_insert($_SESSION['username'], $_SESSION['name'], agora(), $log_msg["rem_aut"]["act"], $log_msg["rem_aut"]["desc"] . " $authorcode");
                        }
                        ?>
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
