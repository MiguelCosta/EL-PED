<div id="menu">
    <ul>
        <li class="menuitem"><a href="../home.php">Ínicio</a></li>
        <?php
        if (isset($_SESSION['username']) && $_SESSION['username'] && $_SESSION['type'] != 'c') {
            echo "<li class=\"menuitem\"><a href=\"../submeter/submeter.php\">Submeter</a></li>";
        }
        if (isset($_SESSION['username']) && $_SESSION['username'] && $_SESSION['type'] != 'p') {
            echo "<li class=\"menuitem\"><a href=\"gerir.php\">Gerir</a></li>";
        }
        ?>
        <li class="menuitem"><a href="#">Acerca</a></li>
        <li class="menuitem"><a href="#">Contactos</a></li>
    </ul>
</div>