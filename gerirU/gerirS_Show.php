<?php
//if (!isset($_SESSION))
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
                    <h2>Detalhes do Projeto <?php echo $_REQUEST['projcode']; ?></h2>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {

                            $projcode = -1;
                            $indice = array_search("projcode", $_REQUEST);
                            if (array_key_exists('projcode', $_REQUEST)) {
                                $projcode = $_REQUEST["projcode"];
                            }

                            $sql = "SELECT projcode, remove, private FROM Project WHERE projcode='$projcode'";
                            //echo "$sql";
                            $res = mysql_query($sql, $con);
                            $remove = 0;
                            $private = 0;
                            $row = mysql_fetch_row($res);
                            //var_dump($row);
                            $remove = $row[1];
                            $private = $row[2];


                            $username = "";
                            $sql = "SELECT username FROM Deposits WHERE projcode='$projcode'";
                            $res = mysql_query($sql, $con);
                            $row = mysql_fetch_row($res);
                            if ($row) {
                                $username = $row[0];
                            }
                            /*                             * * Ve se pode ou não mostrar o projeto *** */
                            if ($_SESSION['type'] == 'a') {
                                // se for um administrador
                                if ($remove == 1) {
                                    echo "<b>Atenção:</b> Este projecto já foi removido.<br/>";
                                }
                                if ($private == 1) {
                                    echo "<b>Atenção:</b> Este projecto é privado.<br/>";
                                }
                                require_once ('forms/showProject.php');
                            } elseif ($private == 0 && $remove == 0) {
                                // se não foi removido nem é privado mostra
                                require_once ('forms/showProject.php');
                            } elseif (isset($_SESSION['username'])) {
                                if ($_SESSION['username'] == $username && $remove == 0) {
                                    // se foi submetido pela pessoa que está com login
                                    if ($private == 1) {
                                        echo "<b>Atenção:</b> Este projecto é privado. Você pode visualiza-lo porque foi quem o submeteu.<br/>";
                                    }
                                }
                                require_once('forms/showProject.php');
                            } else {
                                // se não consegue mostrar, vai dizer porquê
                                if ($private == 1 && $remove == 1) {
                                    echo "<div class=\"failure\">Não pode ver este projeto porque era privado e já foi removido.</div>";
                                } elseif ($private == 1) {
                                    echo "<div class=\"failure\">Não pode ver este projeto porque é privado.</div>";
                                } elseif ($remove == 1) {
                                    echo "<div class=\"failure\">Não pode ver este projeto porque foi removido.</div>";
                                } else {
                                    echo "<div class=\"failure\">ERRO ao mostrar o projeto.</div>";
                                }
                            }
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
