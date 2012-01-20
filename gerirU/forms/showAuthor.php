
<?php
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
            <tr>
                <th>Curso</th>
                <td>
                    <?php
                    $course = $row['coursecode'];
                    $sql2 = "SELECT coursedescription FROM Course WHERE coursecode=$course";
                    $res2 = mysql_query($sql2, $con);
                    $course_name = "";
                    while ($reg2 = mysql_fetch_array($res2)) {
                        $course_name = $reg2["coursedescription"];
                    }
                    echo "<a href=\"gerirCourse_Show.php?id=$course\" >";
                    echo $course_name;
                    echo "</a>";
                    ?>
                </td>
            </tr>


        </table>
        <?php
    } // fecha o ciclo while para ir buscar a informação do author
    ?>


    <h3>Projetos Submetidos</h3>
    <?php
    $sql = "SELECT projcode FROM ProjAut WHERE authorcode='$authorcode' ORDER BY projcode DESC";
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
            echo "<td><a href=\"gerirAS_Show_supervisor.php?supcode=$id&page_p=1\">" . $id . "</a></td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['url'] . "</td>";
            echo "<td>" . $row['affil'] . "</td>";
            echo "</tr>";
        }

        $username = isset($_SESSION['username']) ? $_SESSION['username'] : "Unknown";
        $name = isset($_SESSION['name']) ? $_SESSION['name'] : "Unknown";

        // Actualiza as consultas na BD
        $sql = "INSERT INTO Queries VALUES (NULL, '$username', NULL, $authorcode, NULL, NOW())";
        mysql_query($sql) or die(mysql_error());

        // Insercao no registo de logs
        if ($_SESSION['type'] == 'a')
            log_insert($username, $name, agora(), $log_msg["lis_aut"]["act"], $log_msg["lis_aut"]["desc"] . " $authorcode");
        else if ($_SESSION['type'] == 'c' || $_SESSION['type'] == 'u')
            log_insert($username, $name, agora(), $log_msg["lis_dis_aut"]["act"], $log_msg["lis_dis_aut"]["desc"] . " $authorcode");
        ?>
    </table>
     </div>