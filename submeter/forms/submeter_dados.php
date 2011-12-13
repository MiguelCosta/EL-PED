
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
    
    function setbg(color)
    {
        document.getElementById("styled").style.background=color
    }
</script>

<div id="form_submeter">
    <form action="pr4-miguelcosta.php" method="post" enctype="multipart/form-data">

        <h3>Header:</h3>
        <hr/>
        <hr/>
        <div id="form_input_left">
            <label class="required">Key Name: </label>
            <input name="key_name" type="text" size="25" />
            <div class="clr"></div>
            <label class="required">Title: </label>
            <input name="title" type="text" size="25" />
            <div class="clr"></div>
            <label>Subtitle: </label>
            <input name="subtitle" type="text" size="25" />
        </div>

        <div id="form_input_right">
            <label class="required">Begin Date: </label>
            <input name="begin_date" type="text" size="25" />
            <div class="clr"></div>
            <label class="required">End Date: </label>
            <input name="end_date" type="text" size="25" />
        </div>

        <div class="clr"></div>

        <b>Supervisor: </b>
        <div class="clr"></div>
        <label for="supervisor1_email"> Email:</label> 
        <input id="supervisor1_email" name="supervisor1_email" type="text" size="10" maxlength="100" /> 

        <label>Name:</label> 
        <input name="supervisor1_Name" type="text" size="10" maxlength="100" /> 

        <label>Link:</label> 
        <input name="supervisor1_link" type="text" size="10" maxlength="100" />

        <label>Department:</label>
        <input name="supervisor1_Department" type="text" size="10" maxlength="100" />
        <div class="clr"></div>

        <label>Email:</label> 
        <input name="supervisor2_email" type="text" size="10" maxlength="100" /> 
        <label>Name:</label> 
        <input name="supervisor2_Name" type="text" size="10" maxlength="100" /> 

        <label>Link:</label> 
        <input name="supervisor2_link" type="text" size="10" maxlength="100" />

        <label>Department:</label> 
        <input name="supervisor2_Department" type="text" size="10" maxlength="100" />

        <div class="clr"></div>


        <h3>WorkTeam:</h3>
        <hr />
        <hr />
        <font size="1">Email:</font> <input name="workteam1_email" type="text"
                                            size="25" maxlength="100" /> 
        <font size="1">Name:</font> <input name="workteam1_Name"
                                           type="text" size="25" maxlength="100" /> 
        <font size="1">ID:</font> <input
            name="workteam1_id" type="text" size="25" maxlength="100" />

        <br/>
        <font size="1">Email:</font> <input name="workteam2_email" type="text"
                                            size="25" maxlength="100" /> 
        <font size="1">Name:</font> <input name="workteam2_Name"
                                           type="text" size="25" maxlength="100" /> 
        <font size="1">ID:</font> <input
            name="workteam2_id" type="text" size="25" maxlength="100" />
        <br />

        <font size="1">Email:</font> <input name="workteam3_email" type="text"
                                            size="25" maxlength="100" /> 
        <font size="1">Name:</font> <input name="workteam3_Name"
                                           type="text" size="25" maxlength="100" /> 
        <font size="1">ID:</font> <input
            name="workteam3_id" type="text" size="25" maxlength="100" />

        <h3>Abstract:</h3>
        <hr />
        <hr />
        <textarea name="styled-textarea" id="styled"placeholder="Insira aqui o seu resumo..." setbg('#E1F5A9');" onblur="setbg('#FBEFEF')"></textarea>

        <h3>Deliverables:</h3>
        <hr />
        <hr />
        <font size="1">Name:</font> <input type="text" name="deliverable1_name" size="25" maxlength="100"/>
        <font size="1">File:</font> <input type="file" name="deliverable1_file" id="file1"/> <br/>
        <font size="1">Name:</font> <input type="text" name="deliverable2_name" size="25" maxlength="100"/>
        <font size="1">File:</font> <input type="file" name="deliverable2_file" id="file2"/> <br/>
        <font size="1">Name:</font> <input type="text" name="deliverable3_name" size="25" maxlength="100"/>
        <font size="1">File:</font> <input type="file" name="deliverable3_file" id="file3"/> <br/>
        <font size="1">Name:</font> <input type="text" name="deliverable4_name" size="25" maxlength="100"/>
        <font size="1">File:</font> <input type="file" name="deliverable4_file" id="file3"/> <br/>
        <font size="1">Name:</font> <input type="text" name="deliverable5_name" size="25" maxlength="100"/>
        <font size="1">File:</font> <input type="file" name="deliverable5_file" id="file3"/> <br/>
        <font size="1">Name:</font> <input type="text" name="deliverable6_name" size="25" maxlength="100"/>
        <font size="1">File:</font> <input type="file" name="deliverable6_file" id="file3"/> <br/>

        <hr />
        <input type="image" name="store" src="imagens/send_email_icon.gif"/>
        <input type="submit" value="Enviar" />
    </form>
</div>

<span style="float: right" class="required">Campo Obrigatório</span>
