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
                    <h2>Web Service - get_project</h2>
                    <br/>
                    <div id="containt_main_users">
                        <div id="form_submeter_zip">
                            <form name="projetc_zip" action="get_project_result.php" method="post" enctype="multipart/form-data" autocomplete="on">
                                <div class="clr"></div>
                                <label class="required">Qual o projeto que pretende obter?</label>
                                <input type="text"  name="projcode" pattern="[0-9]+"/>
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
