<!DOCTYPE html>
<html>
    <head>
        <title>HOME - RepositórioPED</title>
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
                    <h2>Repositório para Submissão de Trabalhos</h2>
                    <br/>
                    <br/>
                    <h3>Objectivo deste Repositório</h3>
                    <?php
                    ?>
                    <br/>
                    <p>No mundo académico há uma enorme quantidade de trabalhos que são produzidos, 
                        muitos deles de boa qualidade que podiam ser úteis para outras pessoas aprenderem, 
                        tirarem ideias, terem como suporte noutro trabalho... no entando, depois de 
                        avaliados são esquecidos.</p>
                    <br/>
                    <p>Para resolver este problema criamos um repositório, com uma série de funcionalidades, 
                        que permite armazenar projectos/trabalhos desenvolvidos por alunos e que 
                        seja possível consultar e exportar toda a informação que tenha sido submetida.</p>
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
                        <li>José Carlos Ramalho - <a href="malito:jcr@di.uminho.pt">jcr@di.uminho.pt</a></li>
                    </ul>
                    <br/>
                    Desenvolvido no âmbito do módulo de Processamento Estruturado de Dados
                    do Mestrado de Engenharia de Linguagens (Mestrado em Engenharia Informática).
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
