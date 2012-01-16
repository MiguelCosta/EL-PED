<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'p'))) {
    header("Location: ../home.php");
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

                            if($valido) {
                                $t = time();
                                if ($path != "") {
                                    $destino = "../uploads/zip/" . $projcode . "-" . $t . ".zip";
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

function Zip($source, $destination) {
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));
    //echo "<br/>Source = $source<br/>";
    //echo "<br/>Destino = $destination<br/>";

    if (is_dir($source) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {
            $file = str_replace('\\', '/', realpath($file));

            if (is_dir($file) === true) {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            } else if (is_file($file) === true) {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    } else if (is_file($source) === true) {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}
?>