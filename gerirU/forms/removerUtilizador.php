<script type="text/javascript">
    function remover_user()
    {
        if(document.getElementById("username").valueOf().value == ""){alert("Campo Username inválido!");return;}
        if(document.getElementById("password").valueOf().value == ""){alert("Campo Password inválido!");return;}
        
        if (confirm('Tem a certeza que pretende remover o utilizador?')) document.forms["remover"].submit(); else alert("Utilizador não foi removido!"); 
    }
</script>


<form name="remover" method="post" action="gerirU_Remover_resp.php"  enctype="multipart/form-data">
    <div class="user_insert">Username:*</div>
    <input id="username" name="username" type="text" size="25" />
    <br/>
    <b class="user_insert">Password:*</b>
    <input id="password" name="password" type="password" size="25" />
    <br/>
    <input type="button" value="Enviar" onclick="remover_user()" />
</form>

<span class="required_fields">* Campo Obrigatório</span>
