<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'p'))) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir->Utlizadores->Remover - RepositórioPED</title>
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
                    <h2>Remover Utilizador</h2>
                    <br/>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $msg_erro = "";

                            $username = $_REQUEST["username"];
                            $password = $_REQUEST["password"];

                            if ($username == null) {
                                $msg_erro .= "Campo Username incorrecto!<br/>";
                            } else if ($password == null) {
                                $msg_erro .= "Campo Password incorrecto!<br/>";
                            }

                            $sql_exist = "SELECT username FROM Users WHERE username='$username' AND password='$password'";
                            $exist = mysql_query($sql_exist);
                            if (mysql_fetch_array($exist) == null) {
                                $msg_erro .= "Dados incorrectos!<br/>";
                            }

                            if ($msg_erro != "") {
                                echo $msg_erro;
                                go_back("gerirU_Remover.php");
                            } else {
                                $sql = "DELETE FROM Users WHERE username='$username' AND password='$password'";
                                mysql_query($sql, $con) or die(mysql_error());
                                echo "Remoção feita com sucesso!";
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