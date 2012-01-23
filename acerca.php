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
            //ini_set('include_path',ini_get('include_path').':.');
            ?>


            <div id="content_no_left">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Reposit�rio para Submiss�o de Trabalhos</h2>
                    <br/>
                    <br/>
                    <h3>Objectivo deste Reposit�rio</h3>
                    <?php
                    ?>
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
                    <p>
                        <b>Todo este trabalho foi desenvolvido por:</b>
                    </p>
                    <ul>
                        <li>Bruno Azevedo - <a href="malito:azevedo.252@gmail.com">azevedo.252@gmail.com</a></li>
                        <li>Miguel Costa - <a href="malito:miguelpintodacosta@gmail.com">miguelpintodacosta@gmail.com</a></li>
                    </ul>
                    <br/>
                    <p>
                        <b>E foi supervisionado por:</b>
                    </p>
                    <ul>
                        <li>Jos� Carlos Ramalho - <a href="malito:jcr@di.uminho.pt">jcr@di.uminho.pt</a></li>
                    </ul>
                    <br/>
                    Desenvolvido no �mbito do m�dulo de Processamento Estruturado de Dados
                    do Mestrado de Engenharia de Linguagens (Mestrado em Engenharia Inform�tica).
                    <br/>
                    <div style="width: 100%; text-align: center;">
                        <img src="css/images/about.png"/>
                    </div>
                </div>
                <div id="content_bottom"></div>

                <?php
                include 'menus/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
