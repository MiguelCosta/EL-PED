<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username']) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir->Utlizadores->Alterar - RepositórioPED</title>
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
                    <br/>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $msg_erro = "";

                            $name = $_REQUEST["name"];
                            $username = $_REQUEST["username"];
                            $password = $_REQUEST["password"];
                            $email = $_REQUEST["email"];
                            $affil = $_REQUEST["affil"];
                            $url = $_REQUEST["url"];
                            $type = $_REQUEST["type"];

                            if ($name == null) {
                                $msg_erro .= "Campo Name incorrecto!<br/>";
                            } else if ($username == null) {
                                $msg_erro .= "Campo Username incorrecto!<br/>";
                            } else if ($password == null) {
                                $msg_erro .= "Campo Password incorrecto!<br/>";
                            } else if ($email == null) {
                                $msg_erro .= "Campo Email incorrecto!<br/>";
                            } else if ($type == null) {
                                $msg_erro .= "Campo Type incorrecto!<br/>";
                            }

                            if ($msg_erro != "") {
                                echo $msg_erro;
                            } else {
                                $sql = "UPDATE Users SET name='$name', password='$password', email='$email', affil='$affil',url='$url',type='$type' WHERE username='$username'";
                                mysql_query($sql, $con) or die(mysql_error());
                                echo "Alteração feita com sucesso!";
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