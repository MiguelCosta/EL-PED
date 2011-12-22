<script type="text/javascript">
    function inserir_user()
    {
        if(document.getElementById("name").valueOf().value == ""){alert("Campo Name inválido!");return;}
        if(document.getElementById("username").valueOf().value == ""){alert("Campo Username inválido!");return;}
        if(document.getElementById("password").valueOf().value == ""){alert("Campo Password inválido!");return;}
        if(document.getElementById("email").valueOf().value == ""){alert("Campo Email inválido!");return;}

        if (confirm('Pertende submeter a informação?')) document.forms["inserir"].submit(); else alert("Utilizador não foi inserido!"); 
    }
</script>

<div id="formInsertUser">
    <form id="formUser" name="inserir" method="post" action="gerirU_Inserir_resp.php"  enctype="multipart/form-data" autocomplete="on">

        <label class="required">Name:</label>
        <input id="name" name="name" type="text"/>
        <div class="clr"></div>

        <label class="required">Username:</label>
        <input id="username" name="username" type="text"/>
        <div class="clr"></div>

        <label class="required">Password:</label>
        <input id="password" name="password" type="password" />
        <div class="clr"></div>

        <label class="required">Email:</label>
        <input id="email" name="email" type="email"/>
        <div class="clr"></div>

        <label>Affil:</label>
        <input id="affil" name="affil" type="text" />
        <div class="clr"></div>

        <label>url:</label>
        <input id="url" name="url" type="url"/>
        <div class="clr"></div>

        <label class="required">Type:</label>
        <div id="formUserType">
            <input type="radio" name="type" value="a" CHECKED/> Managment
            <input type="radio" name="type" value="p"/> Producer
            <input type="radio" name="type" value="c"/> Consumer
        </div>
        <div class="clr"></div>

        <div id="btn_user">
            <input type="button" value="Enviar" onclick="inserir_user()" />
        </div>
        <div class="clr"></div>
    </form>
</div>
<div class="clr"></div>
<span class="required" style="float: right">Campo Obrigatório</span>