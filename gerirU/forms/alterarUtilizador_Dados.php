
<script type="text/javascript">
    function alterar_user()
    {
        if(document.getElementById("name").valueOf().value == ""){alert("Campo Name inválido!");return;}
        if(document.getElementById("username").valueOf().value == ""){alert("Campo Username inválido!");return;}
        if(document.getElementById("password").valueOf().value == ""){alert("Campo Password inválido!");return;}
        if(document.getElementById("email").valueOf().value == ""){alert("Campo Email inválido!");return;}
        if(document.getElementById("affil").valueOf().value == ""){alert("Campo Affil inválido!");return;}
        if(document.getElementById("url").valueOf().value == ""){alert("Campo url inválido!");return;}
        if(document.getElementById("type").valueOf().value == ""){alert("Campo Type inválido!");return;}

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


<form name="alterar" method="post" action="gerirU_Alterar_Dados_resp.php"  enctype="multipart/form-data">

    <div class="user_insert">Name:*</div>
    <input id="name" name="name" type="text" size="25" value="<?php echo $name ?>"/>
    <br/>
    <div class="user_insert">Username:*</div>
    <input id="username" name="username" type="text" size="25" readonly="readonly" value="<?php echo $username ?>"/>
    <br/>
    <b class="user_insert">Password:* </b>
    <input id="password" name="password" type="password" size="25" value="<?php echo $password ?>"/>
    <br/>
    <b class="user_insert">Email:* </b>
    <input id="email" name="email" type="text" size="25" value="<?php echo $email ?>"/>
    <br/>
    <b class="user_insert">Affil:* </b>
    <input id="affil" name="affil" type="text" size="25" value="<?php echo $affil ?>"/>
    <br/>
    <b class="user_insert">url:* </b>
    <input id="url" name="url" type="text" size="25" value="<?php echo $url ?>"/>
    <br/>
    <b class="user_insert">Type:* </b>
    <input id="type" name="type" type="text" size="25" value="<?php echo $type ?>"/>
    <br/>
    <input type="button" value="Enviar" onclick="alterar_user()" />
</form>

<span class="required_fields">* Campo Obrigatório</span>
