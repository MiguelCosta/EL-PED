<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'p'))) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir->Utilizadores->Alterar - RepositórioPED</title>
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
                    <h2>Alterar Utilizador</h2>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            //$page_p = $_REQUEST["page_p"];
                            $indice = array_search("page_p", $_REQUEST);
                            if (array_key_exists('page_p', $_REQUEST)) {
                                $page_p = $_REQUEST["page_p"];
                            } else {
                                $page_p = 1;
                            }

                            $indice = array_search("page_a", $_REQUEST);
                            if (array_key_exists('page_a', $_REQUEST)) {
                                $page_a = $_REQUEST["page_a"];
                            } else {
                                $page_a = 1;
                            }

                            $indice = array_search("page_c", $_REQUEST);
                            if (array_key_exists('page_c', $_REQUEST)) {
                                $page_c = $_REQUEST["page_c"];
                            } else {
                                $page_c = 1;
                            }

                            /* _____________________________ ADMINISTRADORES _____________________________ */
                            $max = $page_a * $num_sup;
                            $min = $max - $num_sup;
                            $sql = "SELECT username, name, email,affil,url FROM Users WHERE type='a' ORDER BY name LIMIT $min , $num_sup";
                            $res = mysql_query($sql, $con);
                            user_to_table("Administradores", $res);
                            ?>
                            <div id="page">
                                <?php
                                $page_menos = 1;
                                $page_mais = $page_a + 1;
                                if ($page_a > 1) {
                                    $page_menos = $page_a - 1;
                                } else {
                                    $page_menos = 1;
                                }
                                $link_menos = "gerirU_Alterar.php?page_a=$page_menos&page_p=$page_p&page_c=$page_c";
                                $link_mais = "gerirU_Alterar.php?page_a=$page_mais&page_p=$page_p&page_c=$page_c";
                                ?>
                                <?php
                                if ($page_a > 1) {
                                    ?>
                                    <a href="<?php echo $link_menos; ?>">
                                        <div id="page_less">
                                        </div>
                                    </a> 
                                    <?php
                                }
                                $sql = "SELECT COUNT(username) AS total FROM Users WHERE type='a'";
                                $res = mysql_query($sql, $con);
                                $total = 0;
                                while ($row = mysql_fetch_array($res)) {
                                    $total = $row["total"];
                                }

                                if ($page_a * $num_sup < $total) {
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
                            /* _____________________________ PRODUTORES _____________________________ */
                            $max = $page_p * $num_sup;
                            $min = $max - $num_sup;
                            $sql = "SELECT username, name, email,affil,url FROM Users WHERE type='p' ORDER BY name LIMIT $min , $num_sup";
                            //$sql = "SELECT username, name, email,affil,url FROM Users WHERE type='p'";
                            $res = mysql_query($sql, $con);
                            user_to_table("Produtores", $res);
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
                                $link_menos = "gerirU_Alterar.php?page_a=$page_a&page_p=$page_menos&page_c=$page_c";
                                $link_mais = "gerirU_Alterar.php?page_a=$page_a&page_p=$page_mais&page_c=$page_c";
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
                                $sql = "SELECT COUNT(username) AS total FROM Users WHERE type='p'";
                                $res = mysql_query($sql, $con);
                                $total = 0;
                                while ($row = mysql_fetch_array($res)) {
                                    $total = $row["total"];
                                }

                                if ($page_p * $num_sup < $total) {
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
                            /* _____________________________ CONSUMIDORES _____________________________ */
                            $max = $page_c * $num_sup;
                            $min = $max - $num_sup;
                            $sql = "SELECT username, name, email,affil,url FROM Users WHERE type='c' ORDER BY name LIMIT $min , $num_sup";
                            $res = mysql_query($sql, $con);
                            user_to_table("Consumidores", $res);
                            ?>
                            <div id="page">
                                <?php
                                $page_menos = 1;
                                $page_mais = $page_c + 1;
                                if ($page_c > 1) {
                                    $page_menos = $page_c - 1;
                                } else {
                                    $page_menos = 1;
                                }
                                $link_menos = "gerirU_Alterar.php?page_a=$page_a&page_p=$page_p&page_c=$page_menos";
                                $link_mais = "gerirU_Alterar.php?page_a=$page_a&page_p=$page_p&page_c=$page_mais";
                                ?>
                                <?php
                                if ($page_c > 1) {
                                    ?>
                                    <a href="<?php echo $link_menos; ?>">
                                        <div id="page_less">
                                        </div>
                                    </a> 
                                    <?php
                                }
                                $sql = "SELECT COUNT(username) AS total FROM Users WHERE type='c'";
                                $res = mysql_query($sql, $con);
                                $total = 0;
                                while ($row = mysql_fetch_array($res)) {
                                    $total = $row["total"];
                                }

                                if ($page_c * $num_sup < $total) {
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
                            /* _____________________________ LOGS _____________________________ */
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
    echo "<th class=\"user\">Alterar</th>";
    echo "</tr>";

    while ($reg = mysql_fetch_array($res)) {
        echo "<tr>";
        echo "<td class=\"user\">" . $reg["username"] . "</td>";
        echo "<td class=\"user\">" . $reg["name"] . "</td>";
        echo "<td class=\"user\">" . $reg["email"] . "</td>";
        echo "<td class=\"user\">" . $reg["affil"] . "</td>";
        echo "<td class=\"user\"><a href=\"" . $reg["url"] . "\" target=\"_blank\">" . $reg["url"] . "</a></td>";
        echo "<td class=\"user\">
                <a href=\"gerirU_Alterar_Dados.php?username=" . $reg["username"] . "\">" .
        "<div id=\"edit\">                        
                     </div>
                </a>    
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>