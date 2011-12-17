
<script>


    function autoForm()
    {
        NameChanger();
    }

    window.onload = autoForm;

</script>

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


<script type="text/javascript" language="JavaScript">
    //<!-- 
    function NameChanger()
    {
        if(document.tipos.author.checked == true) {
            
            var a = document.getElementById('formAuthor');
            a.style.visibility = "visible";
            
            var div_a = document.getElementById('formInsertAS_Author')
            div_a.style.zIndex="2";
            
            var s = document.getElementById('formSupervisor');
            s.style.visibility = "hidden";
            
            var div_s = document.getElementById('formInsertAS_Supervisor')
            div_s.style.zIndex="1";
            
        }
        if(document.tipos.supervisor.checked == true) {
            //window.alert("supervisor");
            var a = document.getElementById('formAuthor');
            a.style.visibility = "hidden";
            var div_a = document.getElementById('formInsertAS_Author')
            div_a.style.zIndex="1";
            
            var s = document.getElementById('formSupervisor');
            s.style.visibility = "visible";
            
            var div_s = document.getElementById('formInsertAS_Supervisor')
            div_s.style.zIndex="2";
        }
        return true;
    }
    // -->
</script>


<form id="formInsertAS_Type" name="tipos" method="post">
    <input id="author" type="radio" name="tipo" value="author" CHECKED onclick="NameChanger()"/> Author
    <input id="supervisor" type="radio" name="tipo" value="supervisor" onclick="NameChanger()"/> Supervisor
</form>

<div id="formInsertAS">
    <div id="formInsertAS_Author">
        <form id="formAuthor" name="inserirAuthor" method="post" action="gerirU_Inserir_resp.php"  enctype="multipart/form-data">

            <input type="hidden" name="tipo_utilizador" value="author"/>

            <label class="required">Name:</label>
            <input id="a_name_id" name="a_name" type="text"/>

            <div class="clr"></div>

            <label class="required">ID:</label>
            <input id="a_id_id" name="a_id" type="text" />
            <div class="clr"></div>

            <label class="required">Email:</label>
            <input id="a_email_id" name="a_email" type="text"/>
            <div class="clr"></div>

            <label class="required">URL:</label>
            <input id="a_url_id" name="a_url" type="text" />
            <div class="clr"></div>

            <div id="a_btn_submit">
                <input type="button" value="Submit Author" onclick="inserir_user()" />
            </div>

        </form>
    </div>

    <div id="formInsertAS_Supervisor">
        <form id="formSupervisor" name="inserirSupervisor" method="post" action="gerirU_Inserir_resp.php"  enctype="multipart/form-data">

            <input type="hidden" name="tipo_utilizador" value="supervisor"/>

            <label class="required">Name:</label>
            <input id="s_name_id" name="s_name" type="text"/>
            <div class="clr"></div>

            <label class="required">Email:</label>
            <input id="s_email" name="s_email" type="text"/>
            <div class="clr"></div>

            <label class="required">URL:</label>
            <input id="s_url_id" name="s_url" type="text" />
            <div class="clr"></div>

            <label class="required">Affil:</label>
            <input id="s_affil" name="s_affil" type="text" />
            <div class="clr"></div>

            <div id="s_btn_submit">
                <input type="button" value="Submit Supervisor" onclick="inserir_user()" />
            </div>

            <div class="clr"></div>
        </form>
    </div>
    <div class="clr"></div>
</div>
<div class="clr"></div>

<span class="required" style="float: right">Campo Obrigatório</span>
