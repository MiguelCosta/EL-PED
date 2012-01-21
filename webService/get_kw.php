<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['type'] = 'u'; // Unknown
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Web Service</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            require_once '../header.php';
            require_once '../menus/menu_webService.php';
            require_once '../menus/leftmenuWebService.php';
            include '../ini.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Web Service - Key Word</h2>
                    <br/>
                    <div id="containt_main_users">
                        <div id="form_submeter_zip">
                            <form name="projetc_zip" action="get_kw_result.php" method="post" enctype="multipart/form-data" autocomplete="on">
                                <div class="clr"></div>
                                <label class="required">Qual a key word que pretende procurar nos projectos?</label>
                                <input type="text"  name="kw" required=""/>
                                <br/>
                                Pode colocar mais que uma key word separadas por <b><font size="4px">;</font> (ponto e vírgula)</b>.
                                <hr />

                                <div id="btn_user">
                                    <!-- Aqui era para testar com java script
                                        <input id="submit_btn" type="button" value="Enviar" onclick="submeter()" /> 
                                    -->
                                    <input id="submit_btn" type="submit" value="Enviar" />
                                </div>
                            </form>
                        </div>

                        <br/>
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
