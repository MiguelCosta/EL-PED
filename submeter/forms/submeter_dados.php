
<div id="form_submeter">
    <form name="projetc_record" action="submeter_form_resp.php" method="post" enctype="multipart/form-data">

        <h3>Header</h3>

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

        <div id="form_submeter_supervisor">
            <b  class="required">Supervisor: </b>
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
        </div>

        <div class="clr"></div>

        <div id="form_submeter_workteam">
            <h3>WorkTeam</h3>

            <label>Email:</label> <input name="workteam1_email" type="text"
                                         size="25" maxlength="100" /> 
            <label>Name:</label> <input name="workteam1_Name"
                                        type="text" size="25" maxlength="100" /> 
            <label>ID:</label> <input
                name="workteam1_id" type="text" size="25" maxlength="100" />

            <br/>
            <label>Email:</label> <input name="workteam2_email" type="text"
                                         size="25" maxlength="100" /> 
            <label>Name:</label> <input name="workteam2_Name"
                                        type="text" size="25" maxlength="100" /> 
            <label>ID:</label> <input
                name="workteam2_id" type="text" size="25" maxlength="100" />
            <br />

            <label>Email:</label> <input name="workteam3_email" type="text"
                                         size="25" maxlength="100" /> 
            <label>Name:</label> <input name="workteam3_Name"
                                        type="text" size="25" maxlength="100" /> 
            <label>ID:</label> <input
                name="workteam3_id" type="text" size="25" maxlength="100" />
        </div>

        <div class="clr"></div>

        <div id="form_submeter_abstract">
            <h3>Abstract</h3>
            <textarea name="abstract_text" id="abstract" placeholder="Insira aqui o seu resumo..." setbg('#E1F5A9');" onblur="setbg('#FBEFEF')"></textarea>
            <input type="button" value="bold" onclick="insereTextoBold()"/>
            <input type="button" value="italic" onclick="insereTextoItalic()"/>
            <input type="button" value="underline" onclick="insereTextoUnderline()"/>
            <input type="button" value="paragraph" onclick="insereTextoParagraph()"/>
            <input type="button" value="key word" onclick="insereTextoKW()"/>
            <input type="button" value="url" onclick="insereTextoXRef()"/>
            <input type="button" value="html" onclick="text2html()"/>

        </div>
        <div id="form_submeter_deliverables">
            <h3>Deliverables</h3>
            <label>Name:</label><input type="text" name="deliverable1_name"/>
            <label>File:</label><input type="file" name="deliverable1_file" id="file1"/>
            <div class="clr"></div>
            <label>Name:</label><input type="text" name="deliverable2_name" size="25" maxlength="100"/>
            <label>File:</label><input type="file" name="deliverable2_file" id="file2"/>
            <div class="clr"></div>
            <label>Name:</label><input type="text" name="deliverable3_name" size="25" maxlength="100"/>
            <label>File:</label><input type="file" name="deliverable3_file" id="file3"/>
            <div class="clr"></div>
            <label>Name:</label><input type="text" name="deliverable4_name" size="25" maxlength="100"/>
            <label>File:</label><input type="file" name="deliverable4_file" id="file3"/>
            <div class="clr"></div>
            <label>Name:</label><input type="text" name="deliverable5_name" size="25" maxlength="100"/>
            <label>File:</label><input type="file" name="deliverable5_file" id="file3"/>
            <div class="clr"></div>
            <label>Name:</label><input type="text" name="deliverable6_name" size="25" maxlength="100"/>
            <label>File:</label><input type="file" name="deliverable6_file" id="file3"/>
        </div>
        <hr />

        <input type="submit" value="Enviar" />
    </form>
</div>

<span style="float: right" class="required">Campo Obrigatório</span>





<script language="javascript">  
    
    function text2html() {
        document.project_record.abstract_text.value += "newtext";
        var newtext = doctype.project_record.abstract_text.value;
        if (document.project_record.placement[1].checked) {
            document.project_record.abstract_text.value = "";
        }
        
        document.project_record.abstract_text.value += "newtext";
    }
    
    function insereTextoBold(){
        insereTexto('<b></b>');
    }
    
    function insereTextoItalic(){
        insereTexto('<i></i>');
    }
    
    function insereTextoUnderline(){
        insereTexto('<u></u>');
    }
    
    function insereTextoKW(){
        insereTexto('<kw></kw>');
    }
    
    function insereTextoParagraph(){
        insereTexto('<p></p>');
    }
    
    function insereTextoXRef(){
        var url = prompt("Qual é URL que pretende inserir?");
        var nome = prompt("Qual o nome do URL?");
        var texto = "<xref url=\"" + url + "\">"+nome+"</xref>";        
        insereTexto(texto);
    }
    
    function insereTexto(tipo){  
        //Pega a textarea  
        var textarea = document.getElementById("abstract");  
              
        //Texto a ser inserido  
        var texto = tipo;  
              
        //inicio da seleção  
        var sel_start = textarea.selectionStart;              
              
        //final da seleção  
        var sel_end = textarea.selectionEnd;  
              
              
        if (!isNaN(textarea.selectionStart))  
        //tratamento para Mozilla  
        {  
            var sel_start = textarea.selectionStart;  
            var sel_end = textarea.selectionEnd;  
  
            mozWrap(textarea, texto, '')  
            textarea.selectionStart = sel_start + texto.length;  
            textarea.selectionEnd = sel_end + texto.length;  
        }     
              
        else if (textarea.createTextRange && textarea.caretPos)   
        {  
            if (baseHeight != textarea.caretPos.boundingHeight)   
            {  
                textarea.focus();  
                storeCaret(textarea);  
            }        
            var caret_pos = textarea.caretPos;  
            caret_pos.text = caret_pos.texto.charAt(caret_pos.texto.length - 1) == ' ' ? caret_pos.text + text + ' ' : caret_pos.text + text;  
                 
        }  
        else //Para quem não é possível inserir, inserimos no final mesmo (IE...)  
        {  
            textarea.value = textarea.value + texto;  
        }        
    }  
           
    /* 
         Essa função abre o texto em duas strings e insere o texto bem na posição do cursor, após ele une novamento o texto mas com o texto inserido 
         Essa maravilhosa função só funciona no Mozilla... No IE não temos as propriedades selectionstart, textLength... 
     */  
    function mozWrap(txtarea, open, close)  
    {  
        var selLength = txtarea.textLength;  
        var selStart = txtarea.selectionStart;  
        var selEnd = txtarea.selectionEnd;  
        var scrollTop = txtarea.scrollTop;  
  
        if (selEnd == 1 || selEnd == 2)   
        {  
            selEnd = selLength;  
        }  
        //S1 tem o texto do começo até a posição do cursor  
        var s1 = (txtarea.value).substring(0,selStart);  
              
        //S2 tem o texto selecionado  
        var s2 = (txtarea.value).substring(selStart, selEnd)  
              
        //S3 tem todo o texto selecionado  
        var s3 = (txtarea.value).substring(selEnd, selLength);  
              
        //COloca o texto na textarea. Utiliza a string que estava no início, no meio a string de entrada, depois a seleção seguida da string  
        //de fechamento e por fim o que sobrou após a seleção  
        txtarea.value = s1 + open + s2 + close + s3;           
        txtarea.selectionStart = selEnd + open.length + close.length;  
        txtarea.selectionEnd = txtarea.selectionStart;  
        txtarea.focus();  
        txtarea.scrollTop = scrollTop;  
        return;  
    }  
    /* 
         Insert at Caret position. Code from 
         [url]http://www.faqts.com/knowledge_base/view.phtml/aid/1052/fid/130[/url] 
     */  
    function storeCaret(textEl)  
    {  
        if (textEl.createTextRange)  
        {  
            textEl.caretPos = document.selection.createRange().duplicate();  
        }  
    }  
  
</script>  
