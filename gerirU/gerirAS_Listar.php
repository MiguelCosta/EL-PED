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
            require_once '../menus/header.php';
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
                            $sql = "SELECT authorcode, name, id,email,url FROM Author";
                            $res = mysql_query($sql, $con);
                            author_to_table("Authors", $res);

                            $sql = "SELECT supcode, name, email,url, affil FROM Supervisor";
                            $res = mysql_query($sql, $con);
                            supervisor_to_table("Supervisors", $res);

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
function author_to_table($titulo, $res) {
    echo "<h3 class=\"user\">" . $titulo . "</h3>";
    echo "<div id=\"containt_main_users_column_label\">";
    echo "<table class=\"user\">";
    echo "<tr>";
    echo "<th class=\"user\">Authorcode</th>";
    echo "<th class=\"user\">Name</th>";
    echo "<th class=\"user\">ID</th>";
    echo "<th class=\"user\">Email</th>";
    echo "<th class=\"user\">URL</th>";
    echo "</tr>";

    while ($reg = mysql_fetch_array($res)) {
        echo "<tr class=\"user\">";
        echo "<td class=\"user\">" . $reg["authorcode"] . "</td>";
        echo "<td class=\"user\">" . $reg["name"] . "</td>";
        echo "<td class=\"user\">" . $reg["id"] . "</td>";
        echo "<td class=\"user\">" . $reg["email"] . "</td>";
        echo "<td class=\"user\"><a href=\"" . $reg["url"] . "\" target=\"_blank\">" . $reg["url"] . "</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

function supervisor_to_table($titulo, $res) {
    echo "<h3 class=\"user\">" . $titulo . "</h3>";
    echo "<div id=\"containt_main_users_column_label\">";
    echo "<table class=\"user\">";
    echo "<tr>";
    echo "<th class=\"user\">Supcode</th>";
    echo "<th class=\"user\">Name</th>";
    echo "<th class=\"user\">Email</th>";
    echo "<th class=\"user\">URL</th>";
    echo "<th class=\"user\">Affil</th>";
    echo "</tr>";

    while ($reg = mysql_fetch_array($res)) {
        echo "<tr class=\"user\">";
        echo "<td class=\"user\">" . $reg["supcode"] . "</td>";
        echo "<td class=\"user\">" . $reg["name"] . "</td>";
        echo "<td class=\"user\">" . $reg["email"] . "</td>";
        echo "<td class=\"user\"><a href=\"" . $reg["url"] . "\" target=\"_blank\">" . $reg["url"] . "</a></td>";
        echo "<td class=\"user\">" . $reg["affil"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>