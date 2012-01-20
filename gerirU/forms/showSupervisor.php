<?php
// authorcode passado como método get
$supcode = $_GET["supcode"];
$page_p = $_GET["page_p"];

$sql = "SELECT * FROM Supervisor WHERE supcode='$supcode'";
$res = mysql_query($sql, $con);

// tabela que vai conter a informação básica o author
while ($row = mysql_fetch_array($res)) {
    ?>
    <div id="details">

        <h3>Informação do Supervisor</h3>
        <table>
            <tr>
                <th>Code</th>
                <td><?php echo $row['supcode'] ?></td>
            </tr>
            <tr>
                <th>Nome</th>
                <td><?php echo $row['name'] ?></td>
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
            <tr>
                <th>Affil</th>
                <td><?php echo $row['affil'] ?></td>
            </tr>
        </table>
        <?php
    } // fecha o ciclo while para ir buscar a informação do author
    ?>


    <h3>Projetos em que é Supervisor</h3>
    <?php
    $v_p_max = $page_p * 10;
    $v_p_min = $v_p_max - 10;
    $sql = "SELECT projcode FROM ProjSup WHERE supcode='$supcode' LIMIT $v_p_min, $v_p_max";
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

            $sql2 = "SELECT projcode, keyname, title, subdate FROM Project WHERE remove=0 AND projcode='$projcode'";
            $res2 = mysql_query($sql2, $con);

            while ($row2 = mysql_fetch_array($res2)) {
                echo "<tr>";
                echo "<td><a href=\"gerirS_Show.php?projcode=$projcode\"> $projcode</a></td>";
                echo "<td>" . $row2['keyname'] . "</td>";
                echo "<td>" . $row2['title'] . "</td>";
                echo "<td>" . $row2['subdate'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <div id="page">
        <?php
        $page_menos = 1;
        $page_mais = $page_p + 1;
        if ($page_p > 1) {
            $page_menos = $page_p - 1;
        } else {
            $page_menos = 1;
        }
        $link_menos = "gerirAS_Show_supervisor.php?supcode=$supcode&page_p=$page_menos";
        $link_mais = "gerirAS_Show_supervisor.php?supcode=$supcode&page_p=$page_mais";
        ?>
        <?php
        if ($page_p > 1) {
            ?>
            <a href="<?php echo $link_menos; ?>">
                <div id="page_less">
                </div>
            </a> 
            <?php
        }
        $sql = "SELECT COUNT(projcode) AS total FROM ProjSup WHERE supcode='$supcode'";
        $res = mysql_query($sql, $con);
        $total = 0;
        while ($row = mysql_fetch_array($res)) {
            $total = $row["total"];
        }

        if ($page_p * 10 < $total) {
            ?>

            <a href="<?php echo $link_mais; ?>">
                <div id="page_more">
                </div>
            </a>

            <?php
        }
        ?>
    </div>
    <h3>Supervisor dos Authors</h3>
    <?php
    // este select dá toda a informação dos autores que fizeram
    // trabalho com o $authorcode
    $sql = "SELECT * FROM Author WHERE authorcode IN(
							  SELECT authorcode FROM ProjAut WHERE projcode IN(
								 SELECT projcode FROM ProjSup WHERE supcode='$supcode'))";
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

    <h3>É Supervisor com</h3>
    <?php
    // este select dá toda a informação dos autores que fizeram
    // trabalho com o $authorcode
    $sql = "SELECT * FROM Supervisor WHERE supcode IN(
									SELECT supcode FROM ProjSup WHERE projcode IN(
									   SELECT projcode FROM ProjSup WHERE supcode='$supcode')
									   AND supcode !='$supcode')";
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
            echo "<td><a href=\"gerirAS_Show_supervisor.php?supcode=$id&page_p=1\">" . $id . "</a></td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['url'] . "</td>";
            echo "<td>" . $row['affil'] . "</td>";
            echo "</tr>";
        }

        $username = isset($_SESSION['username']) ? $_SESSION['username'] : "Unknown";
        $name = isset($_SESSION['name']) ? $_SESSION['name'] : "Unknown";

        // Atualiza as consultas na BD
        $sql = "INSERT INTO Queries VALUES (NULL,'$username', NULL, NULL," . $supcode . ", NOW())";
        mysql_query($sql) or die(mysql_error());

        // Insercao no registo de logs
        if ($_SESSION['type'] == 'a')
            log_insert($username, $name, agora(), $log_msg["lis_sup"]["act"], $log_msg["lis_sup"]["desc"] . " $supcode");
        else if ($_SESSION['type'] == 'c' || $_SESSION['type'] == 'u')
            log_insert($username, $name, agora(), $log_msg["lis_dis_sup"]["act"], $log_msg["lis_dis_sup"]["desc"] . " $supcode");
        ?>
    </table>
</div>
