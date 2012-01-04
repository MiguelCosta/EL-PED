<!DOCTYPE html>

<html>
    <head>
        <title>Gerir->Autores e Supervisores->Listar - RepositórioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
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
                    <h2>Detalhes do Author</h2>
                    <br/>
                    <br/>
                    <div id="containt_main_users">
                        <?php
                        if (!$con) {
                            echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                        } else {

                            // authorcode passado como método get
                            $authorcode = $_GET["authorcode"];

                            $sql = "SELECT * FROM Author WHERE authorcode='$authorcode';";
                            $res = mysql_query($sql, $con);

                            // tabela que vai conter a informação básica o author
                            while ($row = mysql_fetch_array($res)) {
                                ?>
                                <div id="details">

                                    <h3>Informação do Author</h3>
                                    <table>
                                        <tr>
                                            <th>Code</th>
                                            <td><?php echo $row['authorcode'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nome</th>
                                            <td><?php echo $row['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <td><?php echo $row['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $row['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Url</th>
                                            <td>
                                                <a href="<?php echo $row['url']; ?>" target="_blank">
                                                    <?php echo $row['url'] ?>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                } // fecha o ciclo while para ir buscar a informação do author
                                ?>


                                <h3>Projetos Submetidos</h3>
                                <?php
                                $sql = "SELECT projcode FROM ProjAut WHERE authorcode='$authorcode'";
                                $res = mysql_query($sql, $con);
                                ?>

                                <table>
                                    <tr>
                                        <th>Project Code</th>
                                        <th>Key Name</th>
                                        <th>Title</th>
                                        <th>Submission Date</th>
                                    </tr>
                                    <?php
                                    while ($row = mysql_fetch_array($res)) {
                                        $projcode = $row['projcode'];

                                        $sql2 = "SELECT projcode, keyname, title, subdate FROM Project WHERE projcode='$projcode'";
                                        $res2 = mysql_query($sql2, $con);

                                        while ($row2 = mysql_fetch_array($res2)) {
                                            echo "<tr>";
                                            echo "<td>$projcode</td>";
                                            echo "<td>" . $row2['keyname'] . "</td>";
                                            echo "<td>" . $row2['title'] . "</td>";
                                            echo "<td>" . $row2['subdate'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </table>


                                <h3>Work Team</h3>
                                <?php
                                // este select dá toda a informação dos autores que fizeram
                                // trabalho com o $authorcode
                                $sql = "SELECT * FROM Author WHERE authorcode IN (
                                    SELECT authorcode FROM ProjAut WHERE projcode IN (
                                    SELECT projcode FROM ProjAut WHERE authorcode='$authorcode') 
                                    AND authorcode!='$authorcode')";
                                $res = mysql_query($sql, $con);
                                ?>
                                <table>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Url</th>
                                    </tr>
                                    <?php
                                    while ($row = mysql_fetch_array($res)) {
                                        $id = $row['authorcode'];
                                        echo "<tr>";
                                        echo "<td><a href=\"gerirAS_Show_author.php?authorcode=$id\">" . $id . "</a></td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['url'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>

                                <h3>Supervisors</h3>
                                <?php
                                // este select dá toda a informação dos autores que fizeram
                                // trabalho com o $authorcode
                                $sql = "SELECT * FROM Supervisor WHERE supcode IN(
                                    SELECT supcode FROM ProjSup WHERE projcode IN(
                                    SELECT projcode FROM ProjAut WHERE authorcode='$authorcode'))";
                                $res = mysql_query($sql, $con);
                                ?>
                                <table>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Url</th>
                                        <th>Affil</th>
                                    </tr>
                                    <?php
                                    while ($row = mysql_fetch_array($res)) {
                                        $id = $row['supcode'];
                                        echo "<tr>";
                                        echo "<td><a href=\"gerirAS_Show_supervisor.php?supcode=$id\">" . $id . "</a></td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['url'] . "</td>";
                                        echo "<td>" . $row['affil'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>

                                <?php
                            } // Fecha o else da ligação
                            ?>
                        </div>
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
