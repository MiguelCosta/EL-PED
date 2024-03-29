<!DOCTYPE html>
<html>
    <head>
        <title>HOME - Reposit�rioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            require_once 'header.php';
            require_once 'menus/menu.php';
            require_once 'menus/leftmenuHome.php';
            //ini_set('include_path',ini_get('include_path').':.');
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Reposit�rio para Submiss�o de Trabalhos</h2>
                    <br/>
                    <br/>
                    
                    <?php
                    ?>
                    <div style="width: 100%; text-align: center;">
                        <img src="css/images/home.png"/>
                    </div>
                    <h3>Objectivo deste Reposit�rio</h3>
                    <br/>
                    <p>No mundo acad�mico h� uma enorme quantidade de trabalhos que s�o produzidos, 
                        muitos deles de boa qualidade que podiam ser �teis para outras pessoas aprenderem, 
                        tirarem ideias, terem como suporte noutro trabalho... no entando, depois de 
                        avaliados s�o esquecidos.</p>
                    <br/>
                    <p>Para resolver este problema criamos um reposit�rio, com uma s�rie de funcionalidades, 
                        que permite armazenar projectos/trabalhos desenvolvidos por alunos e que 
                        seja poss�vel consultar e exportar toda a informa��o que tenha sido submetida.</p>
                    <br/>
                    <br/>
                </div>
                <div id="content_bottom"></div>

                <?php
                include 'menus/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
