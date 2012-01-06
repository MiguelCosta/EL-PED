<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username']) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Nº total de acessos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>
    <body>
        <div id="container">
            <?php
            include '../header.php';
            include '../menus/menu_estatisticas.php';
            include '../menus/leftmenuEstatisticas.php';
            include '../ini.php';
            //include '../pChart/pChart/pCache.class';
            include '../pChart/pChart/pChart.class';
            include '../pChart/pChart/pData.class';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Nº total de acessos</h2>
                    <br/>
                    <br/>
                    <div style="text-align: center">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {
                            $sql = "SELECT * FROM ViewNumAccessDate";
                            $res = mysql_query($sql, $con);
                            // Dataset definition
                            $MyData = new pData();
                            while ($row = mysql_fetch_array($res)) {
                                //echo $row["month"], "/", $row["year"], " -> ", $row["access"];
                                $MyData->AddPoint($row["month"] . "/" . $row["year"], "Data");
                                $MyData->AddPoint($row["access"], "Acessos");
                            }

                            $MyData->AddAllSeries();
                            $MyData->SetAbsciseLabelSerie("Data");

                            /* Bruno */
                            // Initialise the graph
                            $Test = new pChart(380, 200);
                            $Test->drawFilledRoundedRectangle(7, 7, 373, 193, 5, 240, 240, 240);
                            $Test->drawRoundedRectangle(5, 5, 375, 195, 5, 230, 230, 230);

                            // Draw the pie chart
                            $Test->setFontProperties("../pChart/Fonts/tahoma.ttf", 8);
                            $Test->drawPieGraph($MyData->GetData(), $MyData->GetDataDescription(), 150, 90, 110, PIE_PERCENTAGE, TRUE, 50, 20, 5);
                            $Test->drawPieLegend(310, 15, $MyData->GetData(), $MyData->GetDataDescription(), 250, 250, 250);

                            $Test->Render("acesso_total.png");


                            /* Miguel */
                            // definicao do objeto, e adicao dos dados

                            $DataSet = new pData;
                            //$DataSet->AddPoint(array(1, 4, 3, 2, 3, 3, 2, 1, 0, 7, 4, 3, 2, 3, 3, 5, 1, 0, 7));
                            
                            $sql = "SELECT * FROM ViewNumAccessDate";
                            $res = mysql_query($sql, $con);
                            $arr = array();
                            $i = 0;
                            while ($row = mysql_fetch_array($res)) {
                                $arr[$i] = $row["access"];
                                $i++;
                            }

                            $DataSet->AddPoint($arr);
                            $DataSet->AddSerie();
                            $DataSet->SetSerieName("Total Acessos");

                            // Inicializacao do grafico
                            $Test = new pChart(600, 230);
                            $Test->setFontProperties("../pChart/Fonts/tahoma.ttf", 10);
                            $Test->setGraphArea(40, 30, 580, 200);
                            $Test->drawGraphArea(252, 252, 252);
                            $Test->drawScale($DataSet->GetData(), $DataSet->GetDataDescription(), 5, 150, 150, 150, TRUE, 0, 2);
                            $Test->drawGrid(5, TRUE, 230, 230, 230, 255);

                            // pintura da linha
                            $Test->drawLineGraph($DataSet->GetData(), $DataSet->GetDataDescription());
                            $Test->drawPlotGraph($DataSet->GetData(), $DataSet->GetDataDescription(), 3, 2, 255, 255, 255);

                            // Finalizacao do grafico
                            $Test->setFontProperties("../pChart/Fonts/tahoma.ttf", 10);
                            $Test->drawLegend(65, 35, $DataSet->GetDataDescription(), 255, 255, 255);
                            //$Test->drawTitle(60, 22, "Acessos", 50, 50, 50, 585);
                            $Test->Render("acesso_total_line.png");
                        }
                        ?>
                        <img src="acesso_total.png"/>
                        <img src="acesso_total_line.png"/>
                        <br/>
                        Ainda não está direito este último.
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