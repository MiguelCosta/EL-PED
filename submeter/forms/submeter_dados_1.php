
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

<form action="pr4-miguelcosta.php" method="post" enctype="multipart/form-data">
    <h1 align="center">Project Record</h1>
    <hr />
    <table width="100%" align="center" border="0">
        <tr>
            <td width="50%">
                <b>KEY NAME: </b>
                <input name="key_name" type="text" size="25" />
            </td>
            <td width="50%">
                <b>BEGIN DATE: </b>
                <input name="begin_date" type="text" size="25" />
            </td>
        </tr>
        <tr>
            <td width="50%">
                <b>TITLE: </b>
                <input name="title" type="text" size="25" />
            </td>
            <td width="50%">
                <b>END DATE: </b>
                <input name="end_date" type="text" size="25" />
            </td>
        </tr>
        <tr>
            <td width="50%" valign="top">
                <b>SUBTITLE: </b>
                <input name="subtitle" type="text" size="25" />
            </td>
            <td width="50%">
                <b>SUPERVISORS: </b> <br/>
                <font size="1">Email:</font> <input name="supervisor1_email" type="text"
                                                    size="10" maxlength="100" /> 
                <font size="1">Name:</font> <input name="supervisor1_Name"
                                                   type="text" size="10" maxlength="100" /> 
                <font size="1">Link:</font> <input
                    name="supervisor1_link" type="text" size="10" maxlength="100" />
                <font size="1">Department:</font> <input name="supervisor1_Department" type="text" size="10"
                                                         maxlength="100" />
                <br/>
                <font size="1">Email:</font> <input name="supervisor2_email" type="text"
                                                    size="10" maxlength="100" /> 
                <font size="1">Name:</font> <input name="supervisor2_Name"
                                                   type="text" size="10" maxlength="100" /> 
                <font size="1">Link:</font> <input
                    name="supervisor2_link" type="text" size="10" maxlength="100" />
                <font size="1">Department:</font> <input name="supervisor2_Department" type="text" size="10"
                                                         maxlength="100" />
            </td>
        </tr>
    </table>
    <hr />

    <hr />
    <h3>WorkTeam:</h3>
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
    <hr />

    <hr />
    <h3>ABSTRACT:</h3>

    <textarea rows="8" cols="150" name="abstract"></textarea>


    <hr />

    <hr />
    <h3>Deliverables:</h3>


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

<span class="required_fields">* Campo Obrigatório</span>
