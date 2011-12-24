
<?php
include '../ini.php';
?>


<script type="text/javascript">
    function submeter()
    {
        //if(document.getElementById("key_name").valueOf().value == ""){alert("Campo Key Name inválido!");return;}
        if(document.getElementById("title").valueOf().value == ""){alert("Campo Title inválido!");return;}
        
        /***    Begin Date     **/
        var bg_date = document.getElementById("begin_date").valueOf().value
        if( bg_date == ""){alert("Campo Begin Date inválido!");return;}
        var bg_date_erro = validar_data(bg_date);
        if(bg_date_erro != ""){
            alert("Begin date: " + bg_date_erro);
            return;
        }
        /***    End Date     **/
        var end_date = document.getElementById("end_date").valueOf().value
        if( end_date == ""){alert("Campo End Date inválido!");return;}
        var end_date_erro = validar_data(end_date);
        if(end_date_erro != ""){
            alert("End date: " + end_date_erro);
            return;
        }

        if(document.getElementById("abstract").valueOf().value == ""){alert("Campo Abstract inválido!");return;}
        
                     
        if (confirm('Pertende submeter a informação?')) document.forms["projetc_record"].submit(); 
        else alert("Não foi submetido!"); 
    }
    
    function validar_data(data){
        re = /\d{4}-\d{2}-\d{2}/i;          // expressão regular para o formato aaaa-mm-dd
        var found = data.match(re);         // verifica se faz match com a expressão regular
        if(found==null || found == ""){
            return "Data inválida!";
        }
        var found2 = found+"";
        //alert(found2);
        campos = found2.split("-");
        if(campos.length != 3){
            return "Data inválida!";
        }
        ano = campos[0];
        mes = campos[1];
        dia = campos[2];
        if(ano > 2100 || ano < 2010){
            return "Ano inválido";
        }
        if(mes > 12 || mes < 1){
            return "Mes inválido";
        }
        if(dia > 31 || dia < 1){
            return "Dia inválido";
        }
        return "";       
    }
</script>


<div id="form_submeter">
    <form name="projetc_record" action="submeter_form_resp.php" method="post" enctype="multipart/form-data" autocomplete="on">

        <h3>Header</h3>

        <div id="form_input_left">
            <label class="required">Key Name: </label>
            <input id="key_name" 
                   name="key_name" 
                   type="text" 
                   required="" 
                   pattern="^[a-zA-Z][\w:_.&/|\s]*" 
                   />

            <div class="clr"></div>

            <label class="required">Title: </label>
            <input id="title" 
                   name="title" 
                   type="text" 
                   required="" 
                   pattern="^[a-zA-Z][\w:_.&/|\s]*" 
                   />

            <div class="clr"></div>

            <label>Subtitle: </label>
            <input name="subtitle" 
                   type="text"
                   pattern="^[a-zA-Z][\w:_.&/|\s]*" 
                   />
        </div>

        <div id="form_input_right">
            <label class="required">Begin Date: </label>
            <input id="begin_date" 
                   name="begin_date" 
                   type="date" 
                   required="" 
                   pattern="\d{4}\-\d{2}\-\d{2}" 
                   placeholder="aaaa-mm-dd" 
                   />

            <div class="clr"></div>
            <label class="required">End Date: </label>
            <input id="end_date" 
                   name="end_date" 
                   type="date" 
                   required="" 
                   pattern="\d{4}\-\d{2}\-\d{2}" 
                   placeholder="aaaa-mm-dd"
                   />

        </div>

        <div class="clr"></div>

        <div id="form_submeter_supervisor">
            <h3>Supervisors</h3>
            <div class="clr"></div>

            <?php
            if (!$con) {
                echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
            } else {
                $sql = "SELECT supcode, name, email,url, affil FROM Supervisor ORDER BY name";
                $result = mysql_query($sql);
                $count_supervisors = mysql_num_rows($result);
                ?>
                <div style="height:100px; overflow: auto; border: 1px solid">
                    <table class="user">
                        <tr>
                            <th class="user">Select</th>
                            <th class="user">Name</th>
                            <th class="user">Email</th>
                            <th class="user">URL</th>
                            <th class="user">Affil</th>
                        </tr>

                        <?php
                        while ($rows = mysql_fetch_array($result)) {
                            /* <?php echo "$l"; ?> */
                            ?>
                            <tr class="user">
                                <td class="user"><input name="checkbox_supervisor[]" type="checkbox" value="<? echo $rows['supcode']; ?>"/></td>
                                <td class="user"><? echo $rows['name']; ?></td>
                                <td class="user"><? echo $rows['email']; ?></td>
                                <td class="user"><? echo $rows['url']; ?></td>
                                <td class="user"><? echo $rows['affil']; ?></td>
                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                <?php } ?>
            </div>

        </div>

        <div class="clr"></div>

        <div id="form_submeter_workteam">
            <h3>WorkTeam</h3>
            <?php
            if (!$con) {
                echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
            } else {
                $sql = "SELECT * FROM Author ORDER BY name";
                $result = mysql_query($sql);
                $count = mysql_num_rows($result);
                ?>

                <div style="height:100px; overflow: auto; border: 1px solid">
                    <table class="user">
                        <tr>
                            <th class="user">Select</th>
                            <th class="user">Name</th>
                            <th class="user">ID</th>
                            <th class="user">EMAIL</th>
                            <th class="user">URL</th>
                        </tr>

                        <?php
                        while ($rows = mysql_fetch_array($result)) {
                            ?>
                            <tr class="user">
                                <td class="user"><input name="checkbox_author[]" type="checkbox" value="<? echo $rows['authorcode']; ?>"/></td>
                                <td class="user"><? echo $rows['name']; ?></td>
                                <td class="user"><? echo $rows['id']; ?></td>
                                <td class="user"><? echo $rows['email']; ?></td>
                                <td class="user"><? echo $rows['url']; ?></td>
                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                <?php } ?>
            </div>

        </div>

        <div class="clr"></div>

        <div id="form_submeter_abstract">
            <h3>Abstract</h3>
            <textarea name="abstract_text" id="abstract" required placeholder="Insira aqui o seu resumo..." setbg('#E1F5A9');" onblur="setbg('#FBEFEF')"></textarea>
            <input type="button" value="bold" onclick="insereTextoBold()"/>
            <input type="button" value="italic" onclick="insereTextoItalic()"/>
            <input type="button" value="underline" onclick="insereTextoUnderline()"/>
            <input type="button" value="paragraph" onclick="insereTextoParagraph()"/>
            <input type="button" value="key word" onclick="insereTextoKW()"/>
            <input type="button" value="url" onclick="insereTextoXRef()"/>

        </div>

        <div id="form_submeter_deliverables">
            <h3>Deliverables</h3>

            <div id="file1" style="display: none">
                <label id="d_label_n_1">Name:</label>
                <input id="d_name_n_1" type="text" name="deliverable1_name"/>
                <label id="d_label_f_1">File:</label>
                <input id="d_file_1" type="file" name="deliverable1_file" id="file1"/>
            </div>
            <div class="clr"></div>

            <div id="file2" style="display: none">
                <label id="d_label_n_2">Name:</label>
                <input id="d_name_n_2" type="text" name="deliverable2_name"/>
                <label id="d_label_f_2">File:</label>
                <input id="d_file_2" type="file" name="deliverable2_file" id="file2"/>
            </div>
            <div class="clr"></div>

            <div id="file3" style="display: none">
                <label id="d_label_n_3">Name:</label>
                <input id="d_name_n_3" type="text" name="deliverable3_name"/>
                <label id="d_label_f_3">File:</label>
                <input id="d_file_3" type="file" name="deliverable3_file" id="file3"/>
            </div>
            <div class="clr"></div>

            <div id="file4" style="display: none">
                <label id="d_label_n_4">Name:</label>
                <input id="d_name_n_4" type="text" name="deliverable4_name"/>
                <label id="d_label_f_4">File:</label>
                <input id="d_file_4" type="file" name="deliverable4_file" id="file4"/>
            </div>
            <div class="clr"></div>

            <div id="file5" style="display: none">
                <label id="d_label_n_5">Name:</label>
                <input id="d_name_n_5" type="text" name="deliverable5_name"/>
                <label id="d_label_f_5">File:</label>
                <input id="d_file_5" type="file" name="deliverable5_file" id="file5"/>
            </div>
            <div class="clr"></div>

            <div id="file6" style="display: none">
                <label id="d_label_n_6">Name:</label>
                <input id="d_name_n_6" type="text" name="deliverable6_name"/>
                <label id="d_label_f_6">File:</label>
                <input id="d_file_6" type="file" name="deliverable6_file" id="file6"/>
            </div>
            <div class="clr"></div>

            <input id="add_del" type="button" name="add_deli" value="add" onclick="addDeliverable()" style="width: 100px; text-align: center"/>
            <input id="rem_del" type="button" name="rem_deli" value="remove" onclick="removeDeliverable()" style="width: 100px; text-align: center"/>
        </div>
        <hr />

        <div id="btn_user">
            <input id="submit_btn" type="button" value="Enviar" onclick="submeter()" />
        </div>
    </form>
</div>
<div class="clr"></div>
<span style="float: right" class="required">Campo Obrigatório</span>





<script language="javascript">  
    
    var files = 0;
    
    function addDeliverable(){
        if(files == 6){
            alert("Máximo de 6 deliverables!");
        }
        
        if(files < 7){
            if(files < 6 ) files++;
            var file = 'file'+(files+'');
            document.getElementById(file).style.display = "inline";
            
        } else {
            
        }
        
        if(files > 6){
            files = 6;
        }
        //alert("File: "+file );
    }
    
    function removeDeliverable(){
        if(files > 0){
            var file = 'file'+(files+'');
            document.getElementById(file).style.display = "none";
            var file_name = 'd_name_n_'+(files+'');
            var file_file = 'd_file_'+(files+'');
            document.getElementById(file_name).value = "";
            document.getElementById(file_file).value = "";
            if(files >= 1) files--;
        }
        if(files < 1){
            files = 0;
        }
        //alert("File: "+file );
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
