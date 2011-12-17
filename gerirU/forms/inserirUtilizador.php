<script type="text/javascript">
    function inserir_user()
    {
        if(document.getElementById("name").valueOf().value == ""){alert("Campo Name inválido!");return;}
        if(document.getElementById("username").valueOf().value == ""){alert("Campo Username inválido!");return;}
        if(document.getElementById("password").valueOf().value == ""){alert("Campo Password inválido!");return;}
        if(document.getElementById("email").valueOf().value == ""){alert("Campo Email inválido!");return;}
        if(document.getElementById("affil").valueOf().value == ""){alert("Campo Affil inválido!");return;}
        if(document.getElementById("url").valueOf().value == ""){alert("Campo url inválido!");return;}
        if(document.getElementById("type").valueOf().value == ""){alert("Campo Type inválido!");return;}

        if (confirm('Pertende submeter a informação?')) document.forms["inserir"].submit(); else alert("Utilizador não foi inserido!"); 
    }
</script>

<form name="inserir" method="post" action="gerirU_Inserir_resp.php"  enctype="multipart/form-data">

    <div class="user_insert">Name:*</div>
    <input id="name" name="name" type="text" size="25" />
    <br/>
    <div class="user_insert">Username:* </div>
    <input id="username" name="username" type="text" size="25" />
    <br/>
    <b class="user_insert">Password:* </b>
    <input id="password" name="password" type="password" size="25" />
    <br/>
    <b class="user_insert">Email:* </b>
    <input id="email" name="email" type="text" size="25" />
    <br/>
    <b class="user_insert">Affil:* </b>
    <input id="affil" name="affil" type="text" size="25" />
    <br/>
    <b class="user_insert">url:* </b>
    <input id="url" name="url" type="text" size="25" />
    <br/>
    <b class="user_insert">Type:* </b>
    <input id="type" name="type" type="text" size="25" />
    <br/>
    <input type="button" value="Enviar" onclick="inserir_user()" />
</form>

<span class="required_fields">* Campo Obrigatório</span>