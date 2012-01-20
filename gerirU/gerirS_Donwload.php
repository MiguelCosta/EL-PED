<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['type'] = 'u'; // Unknown
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir->Submissoes->Listar - RepositórioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            require_once '../header.php';
            require_once '../menus/menu_gerirU.php';
            require_once '../menus/leftmenuGerir.php';
            include '../ini.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Download <?php echo $_REQUEST['projcode']; ?></h2>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            if (!is_dir("../uploads/zip/download/")) {
                                mkdir("../uploads/zip/download", 0777, true);
                            }

                            $projcode = $_REQUEST['projcode'];
                            //echo $projcode;

                            $sql = "SELECT path FROM Project WHERE projcode='$projcode'";
                            $result = mysql_query($sql);

                            $path = "";
                            while ($rows = mysql_fetch_array($result)) {
                                $path = $rows["path"];
                            }
                            $origem = "../uploads/$path";
                            $valido = true;
                            if (!is_dir($origem)) {
                                echo "A pasta do projeto já não existe... Contacte um administrador.";
                                $valido = false;
                            }

                            if ($valido) {
                                $t = time();
                                if ($path != "") {
                                    $destino = "../uploads/zip/download/" . $projcode . ".zip";
                                    $origem = "../uploads/$path";
                                    Zip($origem, $destino);
                                    ?>
                                    <div id="download">
                                        <a href="getFile.php?file=<? echo $destino; ?>">
                                            <input type="image" src="../css/images/zip2.png"/><br/>
                                            <b>Clique para guardar o ficheiro no seu computador.</b>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
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

<?php
?>
