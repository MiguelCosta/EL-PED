<div id="menu">
    <ul>
        <li class="menuitem"><a href="../home.php">Início</a></li>
        <?php
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['username']) && $_SESSION['username'] && $_SESSION['type'] != 'c') {
            echo "<li class=\"menuitem\"><a href=\"submeter.php\">Submeter</a></li>";
        }
        if (isset($_SESSION['username']) && $_SESSION['username'] && $_SESSION['type'] != 'p') {
            echo "<li class=\"menuitem\"><a href=\"../gerirU/gerir.php\">Gerir</a></li>";
        }
        ?>
        <li class="menuitem"><a href="#">Acerca</a></li>
        <li class="menuitem"><a href="#">Contactos</a></li>
    </ul>
</div>