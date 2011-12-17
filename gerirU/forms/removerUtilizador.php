<script type="text/javascript">
    function remover_user()
    {
        if(document.getElementById("username").valueOf().value == ""){alert("Campo Username inválido!");return;}
        if(document.getElementById("password").valueOf().value == ""){alert("Campo Password inválido!");return;}
        
        if (confirm('Tem a certeza que pretende remover o utilizador?')) document.forms["remover"].submit(); else alert("Utilizador não foi removido!"); 
    }
</script>

<div id="formInsertUser">

    <form id="formUser" name="remover" method="post" action="gerirU_Remover_resp.php"  enctype="multipart/form-data">
        <label class="required">Username:</label>
        <input id="username" name="username" type="text" size="25" />
        <div class="clr"></div>

        <label class="required">Password:</label>
        <input id="password" name="password" type="password" size="25" />
        <div class="clr"></div>

        <div id="btn_user">
            <input type="button" value="Enviar" onclick="remover_user()" />
        </div>
    </form>
</div>
<div class="clr"></div>
<span class="required" style="float: right">Campo Obrigatório</span>