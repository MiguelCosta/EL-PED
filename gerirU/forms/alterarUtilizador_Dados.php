
<script type="text/javascript">
    function alterar_user()
    {
        if(document.getElementById("name").valueOf().value == ""){alert("Campo Name inválido!");return;}
        if(document.getElementById("username").valueOf().value == ""){alert("Campo Username inválido!");return;}
        if(document.getElementById("password").valueOf().value == ""){alert("Campo Password inválido!");return;}
        if(document.getElementById("email").valueOf().value == ""){alert("Campo Email inválido!");return;}

        if (confirm('Pertende submeter a informação?')) document.forms["alterar"].submit(); else alert("Utilizador não foi alterado!"); 
    }
</script>


<?php
require_once '../ini.php';
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
//echo "SQL: $sql <br/>";
$user = mysql_query($sql, $con) or die(mysql_error());
;

$name = "";
while ($user_r = mysql_fetch_array($user)) {
    $name = $user_r["name"];
    $email = $user_r["email"];
    $affil = $user_r["affil"];
    $url = $user_r["url"];
    $type = $user_r["type"];
}

if ($name == null || $name == "") {
    echo "Dados incorrectos!";
    go_back();
    return;
}
?>

<div id="formInsertUser">
    <form id="formUser" name="alterar" method="post" action="gerirU_Alterar_Dados_resp.php"  enctype="multipart/form-data">

        <label class="required">Name:</label>
        <input id="name" name="name" type="text" size="25" value="<?php echo $name ?>"/>
        <div class="clr"></div>

        <label class="required">Username:</label>
        <input id="username" name="username" type="text" size="25" readonly="readonly" value="<?php echo $username ?>"/>
        <div class="clr"></div>

        <label class="required">Password:</label>
        <input id="password" name="password" type="password" size="25" value="<?php echo $password ?>"/>
        <div class="clr"></div>

        <label class="required">Email:</label>
        <input id="email" name="email" type="text" size="25" value="<?php echo $email ?>"/>
        <div class="clr"></div>

        <label class="required">Affil:</label>
        <input id="affil" name="affil" type="text" size="25" value="<?php echo $affil ?>"/>
        <div class="clr"></div>

        <label class="required">url:</label>
        <input id="url" name="url" type="text" size="25" value="<?php echo $url ?>"/>
        <div class="clr"></div>

        <label class="required">Type:</label>
        <div id="formUserType">
            <?php
            $admin_status = 'unchecked';
            $producer_status = 'unchecked';
            $consumer_status = 'unchecked';
            if ($type == 'a')
                $admin_status = 'checked';
            else if ($type == 'p')
                $producer_status = 'checked';
            else if ($type == 'c')
                $consumer_status = 'checked';
            ?>
            <input type="radio" name="type" value="a" <?PHP print $admin_status; ?>/> Managment
            <input type="radio" name="type" value="p" <?PHP print $producer_status; ?>/> Producer
            <input type="radio" name="type" value="c" <?PHP print $consumer_status; ?>/> Consumer
        </div>

        <div class="clr"></div>

        <div id="btn_user">
            <input type="button" value="Enviar" onclick="alterar_user()" />
        </div>
        <div class="clr"></div>

    </form>
</div>
<div class="clr"></div>
<span class="required" style="float: right">Campo Obrigatório</span>
