
<?php
$authorcode = $_REQUEST['authorcode'];
$sql = "SELECT authorcode, name, id, email, url FROM Author WHERE authorcode='$authorcode'";
$res = mysql_query($sql, $con);
$row = mysql_fetch_row($res);
if (!$row) {
    echo "Erro ao alterar o Autor.";
    exit();
}
$name = "";
$id = "";
$email = "";
$url = "";
if ($row[1]) {
    $name = $row[1];
}
if ($row[2]) {
    $id = $row[2];
}
if ($row[3]) {
    $email = $row[3];
}
if ($row[4]) {
    $url = $row[4];
}
?>

<div id="formInsertAS">
    <div id="formInsertAS_Author">
        <form id="formAuthor" name="inserirAuthor" method="post" action="gerirAS_Alterar_respAuthor.php">

            <input name="authorcode" 
                   type="text"
                   value="<? echo $authorcode; ?>"
                   hidden=""
                   />

            <label class="required">Nome:</label>
            <input name="a_name" 
                   type="text" 
                   required=""
                   value="<? echo $name; ?>"
                   />

            <div class="clr"></div>

            <label class="required">ID:</label>
            <input name="a_id" 
                   type="text"
                   required=""
                   value="<? echo $id; ?>"
                   />
            <div class="clr"></div>

            <label class="required">Email:</label>
            <input name="a_email" 
                   type="email" 
                   required=""
                   value="<? echo $email; ?>"
                   />
            <div class="clr"></div>

            <label>URL:</label>
            <input name="a_url" 
                   type="url"
                   value="<? echo $url; ?>"
                   />
            <div class="clr"></div>

            <label class="required">Curso</label>
            <select name="a_course">
                <?php
                if (!$con) {
                    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
                } else {
                    $sql = "SELECT coursedescription FROM Course";
                    $res = mysql_query($sql, $con) or die(mysql_error());

                    while ($reg = mysql_fetch_array($res)) {
                        echo "<option>" . $reg["coursedescription"] . "</option>";
                    }
                }
                ?>
            </select>
            <div class="clr"></div>

            <div id="a_btn_submit">
                <input type="submit" value="Alterar Autor" />
            </div>

        </form>
    </div>

    <div class="clr"></div>
</div>
<div class="clr"></div>

<span class="required" style="float: right">Campo Obrigatório</span>