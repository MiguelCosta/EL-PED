<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['type'] = 'u'; // Unknown
}
?>

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
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {

                            if ($_SESSION['type'] == 'a') {
                                // se for administrador pode ver tudo
                                $sql = "SELECT * FROM Project ORDER BY subdate DESC";
                            } elseif ($_SESSION['type'] == 'p') {
                                // se for produtor, pode ver os seus projetos (mesmo que privados) e os publicos
                                $sql = "SELECT * FROM Project WHERE (remove=0 AND private=0) OR projcode IN (
                                           SELECT projcode FROM Deposits WHERE username='" . $_SESSION['username'] . "') 
                                        GROUP BY projcode ORDER BY subdate DESC";
                                //echo "$sql";
                            } else {
                                $sql = "SELECT * FROM Project WHERE remove=0 AND private=0 ORDER BY subdate DESC";
                            }

                            $res = mysql_query($sql, $con);
                            submission_to_table("Submissões", $res);

                            // Insercao no registo de logs
                            $username = isset($_SESSION['username']) ? $_SESSION['username'] : "Unknown";
                            $name = isset($_SESSION['name']) ? $_SESSION['name'] : "Unknown";
                            if ($_SESSION['type'] == 'a')
                                log_insert($username, $name, agora(), $log_msg["lis_pros"]["act"], $log_msg["lis_pros"]["desc"]);
                            else if ($_SESSION['type'] == 'c' || $_SESSION['type'] == 'u')
                                log_insert($username, $name, agora(), $log_msg["lis_dis_pros"]["act"], $log_msg["lis_dis_pros"]["desc"]);
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
        $id = $reg["projcode"];
        //echo "<tr title=\"Ver Project Record\" onclick=\"location.href='submissoes/mostrarPR.html?path=/opt/lampp/htdocs/PED-Project/gerirU/submissoes/PR.xml'\">";
        echo "<td class=\"user\"><a href=\"gerirS_Show.php?projcode=$id\">" . $id . "</a></td>";
        echo "<td class=\"user\">" . $reg["keyname"] . "</td>";
        echo "<td class=\"user\">" . $reg["title"] . "</td>";
        echo "<td class=\"user\">" . $reg["subdate"] . "</td>";

        $sql = "SELECT authorcode, name FROM Author WHERE authorcode IN (
                SELECT authorcode FROM ProjAut WHERE projcode='$id')";
        //echo "$sql";
        $result = mysql_query($sql);
        $autores = "";
        echo "<ul>";
        while ($rows = mysql_fetch_array($result)) {
            $autores .= "<li><a href=\"gerirAS_Show_author.php?authorcode=" . $rows['authorcode'] . "\" >";
            $autores .= $rows['name'];
            $autores .= "</a></li>";
        }
        echo "<td class=\"user\">" . $autores . "</td>";
        echo "</ul>";

        //$sql = "SELECT supcode FROM ProjSup WHERE projcode='$id'";
        $sql = "SELECT supcode, name FROM Supervisor WHERE supcode IN (
                SELECT supcode FROM ProjSup WHERE projcode='$id')";
        $result = mysql_query($sql);
        $supervisores = "";
        echo "<ul>";
        while ($rows = mysql_fetch_array($result)) {
            $supervisores .= "<li><a href=\"gerirAS_Show_supervisor.php?supcode=" . $rows['supcode'] . "&page_p=1\" >";
            $supervisores .= $rows['name'];
            $supervisores .= "</a></li>";
        }
        echo "<td class=\"user\">" . $supervisores . "</td>";
        echo "<ul>";

        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>
