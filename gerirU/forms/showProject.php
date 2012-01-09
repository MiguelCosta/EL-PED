
<?php
$projcode = $_REQUEST['projcode'];
//echo "<br/>Projecto: $projcode <br/>";

if (!$con) {
    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
} else {
    $sql = "SELECT * FROM Project WHERE projcode='$projcode'";
    $result = mysql_query($sql);

    while ($rows = mysql_fetch_array($result)) {
        ?>

        <div id="form_submeter">

            <h3>Header</h3>

            <div id="form_input_left">
                <label class="required">Key Name: </label>
                <input id="key_name" 
                       name="key_name" 
                       type="text" 
                       required="" 
                       pattern="^[a-zA-ZáàãõéíóúçÁÀÃÕÉÍÓÚÇ][\wáàãõéíóúçÁÀÃÕÉÍÓÚÇ:_.-&/|\s]*"
                       readonly
                       value="<?php echo $rows['keyname']; ?>"
                       />

                <div class="clr"></div>

                <label class="required">Title: </label>
                <input id="title" 
                       name="title" 
                       type="text" 
                       required="" 
                       pattern="^[a-zA-ZáàãõéíóúçÁÀÃÕÉÍÓÚÇ][\wáàãõéíóúçÁÀÃÕÉÍÓÚÇ:_.-&/|\s]*"
                       readonly
                       value="<?php echo $rows['title']; ?>"
                       />

                <div class="clr"></div>

                <label>Subtitle: </label>
                <input name="subtitle" 
                       type="text"
                       pattern="^[a-zA-ZáàãõéíóúçÁÀÃÕÉÍÓÚÇ][\wáàãõéíóúçÁÀÃÕÉÍÓÚÇ:_.-&/|\s]*"
                       readonly
                       value="<?php echo $rows['subtitle']; ?>"
                       />
            </div>

            <div id="form_input_right">
                <label class="required">Begin Date: </label>
                <input id="begin_date" 
                       name="begin_date" 
                       type="date" 
                       required="" 
                       pattern="\d{4}\-\d{2}\-\d{2}" 
                       placeholder="aaaa-mm-dd" 
                       readonly
                       value="<?php echo $rows['bdate']; ?>"
                       />

                <div class="clr"></div>
                <label class="required">End Date: </label>
                <input id="end_date" 
                       name="end_date" 
                       type="date" 
                       required="" 
                       pattern="\d{4}\-\d{2}\-\d{2}" 
                       placeholder="aaaa-mm-dd"
                       readonly
                       value="<?php echo $rows['edate']; ?>"
                       />

            </div>

            <div class="clr"></div>

            <div id="form_submeter_supervisor">
                <h3>Supervisors</h3>
                <div class="clr"></div>

                <?php
                if (!$con) {
                    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                } else {
                    $sql2 = "SELECT * FROM Supervisor WHERE supcode IN (
                                    SELECT supcode FROM ProjSup WHERE projcode='$projcode'
                                ) ORDER BY name";
                    $result2 = mysql_query($sql2);
                    $count_supervisors2 = mysql_num_rows($result2);
                    ?>
                    <table class="user">
                        <tr>
                            <th class="user">Supcode</th>
                            <th class="user">Name</th>
                            <th class="user">Email</th>
                            <th class="user">URL</th>
                            <th class="user">Affil</th>
                        </tr>

                        <?php
                        while ($rows2 = mysql_fetch_array($result2)) {
                            ?>
                            <tr class="user">
                                <td class="user"><a href="gerirAS_Show_supervisor.php?supcode=<? echo $rows2['supcode']; ?>"><? echo $rows2['supcode']; ?></a></td>
                                <td class="user"><? echo $rows2['name']; ?></td>
                                <td class="user"><? echo $rows2['email']; ?></td>
                                <td class="user"><? echo $rows2['url']; ?></td>
                                <td class="user"><? echo $rows2['affil']; ?></td>
                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                <?php } ?>


            </div>

            <div class="clr"></div>

            <div id="form_submeter_workteam">
                <h3>WorkTeam</h3>
                <?php
                if (!$con) {
                    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                } else {
                    $sql3 = "SELECT * FROM Author WHERE authorcode IN (
                                    SELECT authorcode FROM ProjAut WHERE projcode='56'
                                ) ORDER BY name";
                    $result3 = mysql_query($sql3);
                    $count3 = mysql_num_rows($result3);
                    ?>

                    <table class="user">
                        <tr>
                            <th class="user">Code</th>
                            <th class="user">Name</th>
                            <th class="user">ID</th>
                            <th class="user">EMAIL</th>
                            <th class="user">URL</th>
                        </tr>

                        <?php
                        while ($rows3 = mysql_fetch_array($result3)) {
                            ?>

                            <tr class="user">
                                <td class="user"><a href="gerirAS_Show_author.php?authorcode=<? echo $rows3['authorcode']; ?>"><? echo $rows3['authorcode']; ?></a></td>
                                <td class="user"><? echo $rows3['name']; ?></td>
                                <td class="user"><? echo $rows3['id']; ?></td>
                                <td class="user"><? echo $rows3['email']; ?></td>
                                <td class="user"><? echo $rows3['url']; ?></td>
                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                <?php } ?>


            </div>

            <div class="clr"></div>

            <div id="form_submeter_abstract">
                <h3>Abstract</h3>
                <?php echo $rows['abstract']; ?>


            </div>

            <div id="form_submeter_deliverables">
                <h3>Deliverables</h3>

                <?php
                if (!$con) {
                    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                } else {
                    $sql4 = "SELECT description, path FROM Deliverable 
                                WHERE projcode='$projcode'
                        ORDER BY description";
                    $result4 = mysql_query($sql4);
                    $count4 = mysql_num_rows($result4);
                    ?>
                    <ul>
                        <?php
                        while ($rows4 = mysql_fetch_array($result4)) {
                            ?>
                            <li>
                                <a href="getFile.php?file=../uploads/deliverables/<? echo $rows4['path'] ?>" target="_blank">
                                    <? echo $rows4['description'] ?>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>


                <div class="clr"></div>

            </div>

        </div>
        <div class="clr"></div>


        <?php
    }
}
?>