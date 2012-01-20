<div id="leftmenu">

    <div id="leftmenu_top"></div>

    <div id="leftmenu_main">
            
            <?php
            if ($_SESSION['type'] == 'a') {
			   echo "<h3>Utilizadores</h3>
			        <ul>
				   <li><a href=\"gerirU_Listar.php\">Listar</a></li>
				    <li><a href=\"gerirU_Inserir.php\">Inserir</a></li>
		            <li><a href=\"gerirU_Alterar.php\">Alterar</a></li>
					<li><a href=\"gerirU_Remover.php\">Remover</a></li>
				 </ul>";
            }
            ?>
        <h3>Autores e Supervisores</h3>
        <ul>
            <li><a href="gerirAS_Listar.php">Listar</a></li>
            <?php
            if ($_SESSION['type'] == 'a') {
                echo "<li><a href=\"gerirAS_Inserir.php\">Inserir</a></li>
            		<li><a href=\"gerirAS_Alterar.php\">Alterar</a></li>
					<li><a href=\"gerirAS_Remover.php\">Remover</a></li>";
            }
            ?>
        </ul>

        <h3>Submissões</h3>
        <ul>
            <li><a href="gerirS_Listar.php">Listar</a></li>
            <?php
            if ($_SESSION['type'] == 'a') {
                echo "<li><a href=\"gerirS_Remover.php\">Remover</a></li>";
            }
            ?>
        </ul>
        <?php
            if ($_SESSION['type'] == 'a') {
                echo "<h3>Exportar</h3>";
                echo "<ul>";
                echo "<li><a href=\"gerirExportar.php\">Exportar para zip</a></li>";
                echo "</ul>";
            }
            ?>
    </div>
    <div id="leftmenu_bottom"></div>
</div>
