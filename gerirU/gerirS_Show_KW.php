<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['type'] = 'u'; // Unknown
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Gerir->Submissoes->Listar - Reposit�rioPED</title>
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
                    <?php
                    if (!$con) {
                        echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                    } else {
                        $kwcode = $_REQUEST["kwcode"];

                        $sql = "SELECT keyword FROM KeyWord WHERE kwcode='$kwcode'";
                        $res = mysql_query($sql, $con);
                        $nome = "";
                        while ($reg = mysql_fetch_array($res)) {
                            $nome = $reg["keyword"];
                        }
                    }
                    ?>
                    <h2>Lista de Submiss�es com a Key Word <? $n = utf8_decode($nome);
                    echo "$n"; ?></h2>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $kwcode = $_REQUEST["kwcode"];
                            $page_p = $_REQUEST["page_p"];
                            //echo "$kwcode $page_p";
                            $max = $page_p * $num_proj;
                            $min = $max - $num_proj;
                            $sql = "SELECT * FROM Project WHERE projcode IN (
						   SELECT projcode FROM ProjKW WHERE kwcode='$kwcode'
						) ORDER BY subdate DESC LIMIT $min,$max";
                            //echo "$sql";
                            $res = mysql_query($sql, $con);
                            submission_to_table("Submiss�es", $res);
                            ?>

                            <div id="page">
                                <?php
                                $page_menos = 1;
                                $page_mais = $page_p + 1;
                                if ($page_p > 1) {
                                    $page_menos = $page_p - 1;
                                } else {
                                    $page_menos = 1;
                                }
                                $link_menos = "gerirS_Show_KW.php?kwcode=$kwcode&page_p=$page_menos";
                                $link_mais = "gerirS_Show_KW.php?kwcode=$kwcode&page_p=$page_mais";
                                ?>
                                <?php
                                if ($page_p > 1) {
                                    ?>
                                    <a href="<?php echo $link_menos; ?>">
                                        <div id="page_less">
                                        </div>
                                    </a> 
                                    <?php
                                }
                                $sql = "SELECT COUNT(projcode) AS total FROM ProjKW WHERE kwcode='$kwcode'";
                                $res = mysql_query($sql, $con);
                                $total = 0;
                                while ($row = mysql_fetch_array($res)) {
                                    $total = $row["total"];
                                }

                                if ($page_p * $num_proj < $total) {
                                    ?>

                                    <a href="<?php echo $link_mais; ?>">
                                        <div id="page_more">
                                        </div>
                                    </a>

                                    <?php
                                }
                                ?>
                            </div>
                            <?php
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
 * Passar uma submiss�o para a linha da tabela de listagem
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

        $sql = "SELECT authorcode FROM ProjAut WHERE projcode='$id'";
        $result = mysql_query($sql);
        $autores = "";
        while ($rows = mysql_fetch_array($result)) {
            $autores .= "<a href=\"gerirAS_Show_author.php?authorcode=" . $rows['authorcode'] . "\" >";
            $autores .= $rows['authorcode'];
            $autores .= "</a>, ";
        }
        echo "<td class=\"user\">" . $autores . "</td>";


        $sql = "SELECT supcode FROM ProjSup WHERE projcode='$id'";
        $result = mysql_query($sql);
        $supervisores = "";
        while ($rows = mysql_fetch_array($result)) {
            $supervisores .= "<a href=\"gerirAS_Show_supervisor.php?supcode=" . $rows['supcode'] . "&page_p=1\" >";
            $supervisores .= $rows['supcode'];
            $supervisores .= "</a>, ";
        }
        echo "<td class=\"user\">" . $supervisores . "</td>";

        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>
