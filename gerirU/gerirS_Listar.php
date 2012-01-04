<!DOCTYPE html>

<html>
    <head>
        <title>Gerir->Submissoes->Listar - RepositórioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
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
                    <h2>Lista de Submissões</h2>
                    <br/>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $sql = "SELECT * FROM Project";
                            $res = mysql_query($sql, $con);
                            submission_to_table("Submissões", $res);
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
 * Passar uma submissão para a linha da tabela de listagem
 * @param type $titulo
 * @param type $res 
 */
function submission_to_table($titulo, $res) {
    echo "<h3 class=\"user\">" . $titulo . "</h3>";
    echo "<div id=\"containt_main_users_column_label\">";
    echo "<table class=\"user\">";
    echo "<tr>";
    echo "<th class=\"user\">Code</th>";
    echo "<th class=\"user\">Keyname</th>";
    echo "<th class=\"user\">Title</th>";
    echo "<th class=\"user\">Submission Date</th>";
    echo "<th class=\"user\">Authors</th>";
    echo "<th class=\"user\">Supervisors</th>";
    echo "</tr>";

    while ($reg = mysql_fetch_array($res)) {
        echo "<tr title=\"Ver Project Record\" onclick=\"location.href='submissoes/mostrarPR.html?path=/opt/lampp/htdocs/PED-Project/gerirU/submissoes/PR.xml'\">";
        echo "<td class=\"user\">" . $reg["projcode"] . "</td>";
        echo "<td class=\"user\">" . $reg["keyname"] . "</td>";
        echo "<td class=\"user\">" . $reg["title"] . "</td>";
        echo "<td class=\"user\">" . $reg["subdate"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>
