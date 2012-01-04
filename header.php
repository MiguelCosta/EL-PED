<div id="header">
    <h1>EL<span class="off">PED</span></h1>
    <?php
    session_start();
    if (!isset($_SESSION['username']) || !$_SESSION['username']) {
        require_once 'forms/login.php';
    } else {
        echo "<div id=\"login_start\">Bem-vindo ", $_SESSION['username'], "!";
        echo "<div class=\"clr\"></div>";
        if (basename(getcwd()) == 'PED-Project')
            echo "<a href=\"forms/logout.php\">Logout</a></div>";
        else
            echo "<a href=\"../forms/logout.php\">Logout</a></div>";
    }
    ?>
    <h2>Universidade do Minho</h2>
</div>

