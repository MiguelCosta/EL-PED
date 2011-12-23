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
            include '../menus/header.php';
            include '../menus/menu_submeter.php';
            include '../menus/leftmenuSubmeter.php';
            include '../ini.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Project Record</h2>

                    <?php
                    //var_dump($_POST);
                    // Local onde vai ficar o ficheiro XML Submetido
                    $xml_file = "../uploads/pr/";                 // local onde vai ficar o xml
                    $deliverable_path = "../uploads/deliverables/";     // local onde vão ser colocados os ficheiros do formulário

                    $msg_erro = "";                                     // mensagem que vai conter os erros
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