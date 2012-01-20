<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] != 'a'))) {
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
                    <h2>Inserir Supervisor</h2>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $msg_erro = "";

                            $name = $_REQUEST["s_name"];
                            $email = $_REQUEST["s_email"];
                            $url = null;
                            if ($_REQUEST["s_url"]) {
                                $url = $_REQUEST["s_url"];
                            }
                            $affil = null;
                            if ($_REQUEST["s_affil"]) {
                                $affil = $_REQUEST["s_affil"];
                            }

                            if ($name == null) {
                                $msg_erro .= "Campo Name incorrecto!<br/>";
                            } else if ($email == null) {
                                $msg_erro .= "Campo Email incorrecto!<br/>";
                            }

                            if ($msg_erro != "") {
                                echo $msg_erro;
                            } else {

                                // se já existir uma pessoa com o email, não vai deixar alterar
                                $sql = "SELECT supcode FROM Supervisor WHERE email='$email'";
                                $valido = true;
                                $res = mysql_query($sql, $con);
                                while ($row = mysql_fetch_array($res)) {
                                    $valido = false;
                                }
                                if ($valido) {
                                    $sql = "INSERT INTO `PED`.`Supervisor` VALUES (NULL, '$name', '$email', '$url', '$affil', '0')";
                                    mysql_query($sql, $con) or die(mysql_error());
                                    echo "<div class=\"success\">Supervisor inserido com sucesso!</div>";

                                    // Insercao no registo de logs
                                    log_insert($_SESSION['username'], $_SESSION['name'], agora(), $log_msg["ins_sup"]["act"], $log_msg["ins_sup"]["desc"] . " $name");
                                } else {
                                    echo "<div class=\"failure\"> Não foi possível submeter na base de dados, 
                                        provavelmente porque esse email já existe para outro supervisor.</div>";
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
