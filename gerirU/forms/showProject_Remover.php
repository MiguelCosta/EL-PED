<script language="javascript">
    function go_back(){
        history.go(-1);
    }
</script>

<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['type']) || $_SESSION['type'] != 'a') {
    header("Location: ../home.php");
}
?>

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
                       pattern="^[a-zA-Z������������������][\w������������������:_.-&/|\s]*"
                       readonly
                       value="<?php echo $rows['keyname']; ?>"
                       />

                <div class="clr"></div>

                <label class="required">Title: </label>
                <input id="title" 
                       name="title" 
                       type="text" 
                       required="" 
                       pattern="^[a-zA-Z������������������][\w������������������:_.-&/|\s]*"
                       readonly
                       value="<?php echo $rows['title']; ?>"
                       />

                <div class="clr"></div>

                <label>Subtitle: </label>
                <input name="subtitle" 
                       type="text"
                       pattern="^[a-zA-Z������������������][\w������������������:_.-&/|\s]*"
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
                                <td class="user"><a href="gerirAS_Show_supervisor.php?supcode=<? echo $rows2['supcode']; ?>&page_p=1"><? echo $rows2['supcode']; ?></a></td>
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
						SELECT authorcode FROM ProjAut WHERE projcode='$projcode'
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

            <div id="form_submeter_keywords">

                <?php
                if (!$con) {
                    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                } else {
                    $sql5 = "SELECT * FROM KeyWord WHERE kwcode IN (
						   SELECT kwcode FROM ProjKW WHERE projcode='$projcode'
						) ORDER BY keyword";
                    $result5 = mysql_query($sql5);
                    $count5 = mysql_num_rows($result5);
                    if ($count5 > 0) {
                        echo "<h3>Key Words</h3>";
                        ?>
                        <ul>
                            <?php
                            while ($rows5 = mysql_fetch_array($result5)) {
                                ?>
                                <li>
                                    <a href="gerirS_Show_KW.php?kwcode=<? echo $rows5["kwcode"]; ?>&page_p=1">
                                        <? echo $rows5["keyword"] ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                    }
                }
                ?>
            </div>

            <div id="form_submeter_deliverables">

                <?php
                if (!$con) {
                    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                } else {
                    $sql4 = "SELECT description, path FROM Deliverable 
						WHERE projcode='$projcode'
						ORDER BY description";
                    $result4 = mysql_query($sql4);
                    $count4 = mysql_num_rows($result4);
                    if ($count4 > 0) {
                        echo "<h3>Deliverables</h3>";
                        ?>
                        <ul>
                            <?php
                            while ($rows4 = mysql_fetch_array($result4)) {
                                ?>
                                <li>
                                    <a href="getFile.php?file=../uploads/<? echo $rows4['path']; ?>" target="_blank">
                                        <?
                                        if ($rows4['description'] == "" || !$rows4['description']) {
                                            echo "Sem nome";
                                        } else {
                                            echo $rows4['description'];
                                        }
                                        ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                    }
                }
                ?>


                <div class="clr"></div>
            </div>
            <form id ="form_xml_submit" name="remove_project" action="gerirS_Remover_Dados_resp.php" method="post">
                <input name="projcode" hidden="" type="text" value="<? echo $projcode; ?>"/>

                <A HREF="javascript:javascript:history.go(-1)"></A>
                <input name="btn_go_back" type="button" value="voltar" onclick="go_back()"/>
                <input name="btn_submit_form" type="submit" value="Confirmar Remo��o"/>
            </form>
        </div>


        <div class="clr"></div>

        <?php
    }
}
?>
