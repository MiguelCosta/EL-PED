
<?php
$supcode = $_REQUEST['supcode'];
$sql = "SELECT supcode, name, email, url, affil FROM Supervisor WHERE supcode='$supcode'";
$res = mysql_query($sql, $con);
$row = mysql_fetch_row($res);
if (!$row) {
    echo "Erro ao alterar o Autor.";
    exit();
}
$name = "";
$affil = "";
$email = "";
$url = "";
if ($row[1]) {
    $name = $row[1];
}
if ($row[2]) {
    $email = $row[2];
}
if ($row[3]) {
    $url = $row[3];
}
if ($row[4]) {
    $affil = $row[4];
}
?>


<div id="formInsertAS">

    <div id="formInsertAS_Supervisor">
        <form id="formSupervisor" name="inserirSupervisor" method="post" action="gerirAS_Alterar_respSupervisor.php">

            <input type="hidden" 
                   name="supcode" 
                   value="<?echo $supcode;?>"
                   />

            <label class="required">Nome:</label>
            <input name="s_name" 
                   type="text"
                   required=""
                   value="<?echo $name;?>"
                   />
            <div class="clr"></div>

            <label class="required">Email:</label>
            <input name="s_email" 
                   type="text"
                   required=""
                   value="<?echo $email;?>"
                   />
            <div class="clr"></div>

            <label>URL:</label>
            <input name="s_url" 
                   type="text" 
                   value="<?echo $url;?>"
                   />
            <div class="clr"></div>

            <label>Depart.:</label>
            <input name="s_affil" 
                   type="text" 
                   value="<?echo $affil;?>"
                   />
            <div class="clr"></div>

            <div id="s_btn_submit">
                <input type="submit" 
                       value="Alterar Supervisor"/>
            </div>

            <div class="clr"></div>
        </form>
    </div>
    <div class="clr"></div>
</div>
<div class="clr"></div>

<span class="required" style="float: right">Campo Obrigatório</span>