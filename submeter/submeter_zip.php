<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'c'))) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir - RepositórioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            include '../header.php';
            include '../menus/menu_submeter.php';
            include '../menus/leftmenuSubmeter.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Submissão por Zip</h2>
                    <br/>
                    <p>Aqui poderá fazer uma submissão através de um Ficheiro Zip.</p><br/>
                    <p>Tenha em atenção porque terá de obedecer às seguintes regras:</p>
                    <ul>
                        <li>tem de conter um manifesto em XML com o nome <b>pr.xml</b></li>
                        <li>todos os ficheiros mencionados no manifesto tem de estar presentes no zip</li>
                    </ul>
                    <p><a href="../util/pr.xsd" target="_blank">XML Schema</a></p>

                    <?php
                    require_once 'forms/submeter_form_zip.php';
                    ?>
                    <br/>
                    <br/>
                </div>
                <div id="content_bottom"></div>

                <?php
                include '../menus/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>