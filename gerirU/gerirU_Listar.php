<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type']=='p'))) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Gerir->Utlizadores->Listar - RepositórioPED</title>
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
                    <h2>Lista de Utilizadores</h2>
                    <br/>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $sql = "SELECT username, name, email,affil,url FROM Users WHERE type='a'";
                            $res = mysql_query($sql, $con);
                            user_to_table("Administradores", $res);

                            $sql = "SELECT username, name, email,affil,url FROM Users WHERE type='p'";
                            $res = mysql_query($sql, $con);
                            user_to_table("Produtores", $res);

                            $sql = "SELECT username, name, email,affil,url FROM Users WHERE type='c'";
                            $res = mysql_query($sql, $con);
                            user_to_table("Consumidores", $res);
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



<?php

/**
 * Passar um utilizador para a linha da tabela de listagem
 * @param type $titulo
 * @param type $res 
 */
function user_to_table($titulo, $res) {
    echo "<h3 class=\"user\">" . $titulo . "</h3>";
    echo "<div id=\"containt_main_users_column_label\">";
    echo "<table class=\"user\">";
    echo "<tr>";
    echo "<th class=\"user\">Username</th>";
    echo "<th class=\"user\">Name</th>";
    echo "<th class=\"user\">Email</th>";
    echo "<th class=\"user\">Affil</th>";
    echo "<th class=\"user\">URL</th>";
    echo "</tr>";

    while ($reg = mysql_fetch_array($res)) {
        echo "<tr>";
        echo "<td class=\"user\">" . $reg["username"] . "</td>";
        echo "<td class=\"user\">" . $reg["name"] . "</td>";
        echo "<td class=\"user\">" . $reg["email"] . "</td>";
        echo "<td class=\"user\">" . $reg["affil"] . "</td>";
        echo "<td class=\"user\"><a href=\"" . $reg["url"] . "\" target=\"_blank\">" . $reg["url"] . "</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>