<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'p'))) {
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
                    <h2>Inserir Utilizador</h2>
                    <br/>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $msg_erro = "";

                            $name = $_REQUEST["a_name"];
                            $id = $_REQUEST["a_id"];
                            $email = $_REQUEST["a_email"];
                            $url = $_REQUEST["a_url"];
                            $course = $_REQUEST["a_course"];

                            if ($name == null) {
                                $msg_erro .= "Campo Name incorrecto!<br/>";
                            } else if ($id == null) {
                                $msg_erro .= "Campo ID incorrecto!<br/>";
                            } else if ($url == null) {
                                $msg_erro .= "Campo URL incorrecto!<br/>";
                            } else if ($email == null) {
                                $msg_erro .= "Campo Email incorrecto!<br/>";
                            }

                            if ($msg_erro != "") {
                                echo $msg_erro;
                            } else {
                                $sql = "SELECT coursecode From Course WHERE coursedescription='$course'";
                                $res = mysql_query($sql, $con) or die(mysql_error());
                                $course_id = 0;
                                while($reg = mysql_fetch_array($res)){
                                    $course_id = $reg["coursecode"];
                                }
                                
                                $sql = "INSERT INTO `PED`.`Author` VALUES (NULL, '$name', '$id', '$email', '$url', $course_id)";
                                mysql_query($sql, $con) or die(mysql_error());
                                echo "Author inserido com sucesso!";

								// Insercao no registo de logs
								log_insert($_SESSION['username'], $_SESSION['name'], agora(), $log_msg["ins_aut"]["act"], $log_msg["ins_aut"]["desc"]." $name");
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
