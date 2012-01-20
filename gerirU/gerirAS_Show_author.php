<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['type'] = 'u'; // Unknown
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir->Autores e Supervisores->Listar - RepositórioPED</title>
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
                    <h2>Detalhes do Author</h2>

                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            // authorcode passado como método get
                            $authorcode = $_GET["authorcode"];

                            $sql = "SELECT authorcode, remove FROM Author WHERE authorcode='$authorcode'";
                            $res = mysql_query($sql, $con);
                            $remove = 0;
                            $row = mysql_fetch_row($res);
                            $remove = $row[1];

                            if ($_SESSION['type'] == 'a' && $remove == 1) {
                                echo "<b>Atenção: </b> este autor já foi removido.<br/>";
                                include 'forms/showAuthor.php';
                            } elseif ($remove == 1) {
                                echo "<div class=\"failure\">Este autor já foi removido.</div>";
                            } elseif ($remove == 0) {
                                require_once 'forms/showAuthor.php';
                            }
                        } // Fecha o else da ligação
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
