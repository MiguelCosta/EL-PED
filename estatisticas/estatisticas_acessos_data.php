<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username']) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Acessos por data</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <SCRIPT LANGUAGE="Javascript" SRC="../FusionCharts/FusionCharts.js"></SCRIPT>
    </head>
    <body>
        <div id="container">
            <?php
            include '../header.php';
            include '../menus/menu_estatisticas.php';
            include '../menus/leftmenuEstatisticas.php';
            include '../ini.php';
            include '../FusionCharts/Includes/FusionCharts.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Acessos por data</h2>
                    <br/>
                    <br/>
                    <div style="text-align: center">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $sql = "SELECT accesses FROM ViewNumAccessTotal";
                            $result = mysql_query($sql) or die(mysql_error());

                            if ($result) {
                                while ($ors = mysql_fetch_array($result))
                                    $acc = $ors['accesses'];
                                mysql_free_result($result);
                            }
                            echo "<h4>Total de acessos: " . $acc . "</h4>";

                            $strDataURL = "acessos_anuais_chart.php";
                            echo renderChart("../FusionCharts/FCF_Line.swf", $strDataURL, "", "AcessosAnuais", 650, 450);
                            $strDataURL = "acessos_mensais_chart.php";
                            echo renderChart("../FusionCharts/FCF_Line.swf", $strDataURL, "", "AcessosMensais", 650, 450);
                        }
                        ?>
                    </div>
                </div>
                <div id="content_bottom"></div>

                <?php
                include '../menus/footer.php';
                ?> 

            </div>
        </div>
    </body>
</html>