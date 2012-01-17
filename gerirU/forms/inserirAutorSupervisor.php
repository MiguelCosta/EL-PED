<?php
   if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] != 'a'))) {   
	  header("Location: ../home.php");
   } 
?>
<script>
   function autoForm()
   {
		 NameChanger();
   }

   window.onload = autoForm;

</script>

<script type="text/javascript">
<<<<<<< HEAD
   function inserir_user()
   {
		 if (radioCheck()=="author"){
			   if(document.getElementById("a_name_id").valueOf().value == ""){alert("Campo Name inválido!");return;}
			   if(document.getElementById("a_id_id").valueOf().value == ""){alert("Campo ID inválido!");return;}
			   if(document.getElementById("a_email_id").valueOf().value == ""){alert("Campo Email inválido!");return;}
			   if(document.getElementById("a_url_id").valueOf().value == ""){alert("Campo URL inválido!");return;}

			   if (confirm('Pertende submeter a informação?')) document.forms["inserirAuthor"].submit(); else alert("Utilizador não foi inserido!");
		 }

		 if (radioCheck()=="supervisor"){
			   if(document.getElementById("s_name_id").valueOf().value == ""){alert("Campo Name inválido!");return;}
			   if(document.getElementById("s_email_id").valueOf().value == ""){alert("Campo Email inválido!");return;}
			   if(document.getElementById("s_url_id").valueOf().value == ""){alert("Campo URL inválido!");return;}
			   if(document.getElementById("s_affil_id").valueOf().value == ""){alert("Campo Affil inválido!");return;}

			   if (confirm('Pertende submeter a informação?')) document.forms["inserirSupervisor"].submit(); else alert("Utilizador não foi inserido!");
		 }

   }

   function radioCheck(){ 
		 var i 
		 for (i=0;i<document.tipos.tipo.length;i++){ 
			   if (document.tipos.tipo[i].checked){
					 var c = document.tipos.tipo[i].value;
					 break; 
			   }
		 } 
		 return c;
   } 

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
=======
    function inserir_user()
    {
        if (radioCheck()=="author"){
            if(document.getElementById("a_name_id").valueOf().value == ""){alert("Campo Name inválido!");return;}
            if(document.getElementById("a_id_id").valueOf().value == ""){alert("Campo ID inválido!");return;}
            if(document.getElementById("a_email_id").valueOf().value == ""){alert("Campo Email inválido!");return;}
            
            if (confirm('Pertende submeter a informação?')) document.forms["inserirAuthor"].submit(); else alert("Utilizador não foi inserido!");
        }
        
        if (radioCheck()=="supervisor"){
            if(document.getElementById("s_name_id").valueOf().value == ""){alert("Campo Name inválido!");return;}
            if(document.getElementById("s_email_id").valueOf().value == ""){alert("Campo Email inválido!");return;}
            
            if (confirm('Pertende submeter a informação?')) document.forms["inserirSupervisor"].submit(); else alert("Utilizador não foi inserido!");
        }
                
         
    }
    
    function radioCheck(){ 
        var i 
        for (i=0;i<document.tipos.tipo.length;i++){ 
            if (document.tipos.tipo[i].checked){
                var c = document.tipos.tipo[i].value;
                break; 
            }
        } 
        return c;
    } 
    
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
>>>>>>> 21108adf97c891dea20696ea3f3c22bd387ece04
</script>

<form id="formInsertAS_Type" name="tipos" method="post">
   <input id="author" type="radio" name="tipo" value="author" CHECKED onclick="NameChanger()"/> Author
   <input id="supervisor" type="radio" name="tipo" value="supervisor" onclick="NameChanger()"/> Supervisor
</form>

<div id="formInsertAS">
   <div id="formInsertAS_Author">
	  <form id="formAuthor" name="inserirAuthor" method="post" action="gerirAS_Inserir_respAuthor.php"  enctype="multipart/form-data">

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

		 <label class="required">Curso</label>
		 <select name="a_course">
			<?php
			   if (!$con) {
				  echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
			   } else {
				  $sql = "SELECT coursedescription FROM Course";
				  $res = mysql_query($sql, $con) or die(mysql_error());

				  while ($reg = mysql_fetch_array($res)) {
					 echo "<option>" . $reg["coursedescription"] . "</option>";
				  }
			   }
			?>
		 </select>
		 <div class="clr"></div>

		 <div id="a_btn_submit">
			<input type="button" value="Submit Author" onclick="inserir_user()" />
		 </div>

	  </form>
   </div>

   <div id="formInsertAS_Supervisor">
	  <form id="formSupervisor" name="inserirSupervisor" method="post" action="gerirAS_Inserir_respSupervisor.php"  enctype="multipart/form-data">

		 <input type="hidden" name="tipo_utilizador" value="supervisor"/>

		 <label class="required">Name:</label>
		 <input id="s_name_id" name="s_name" type="text"/>
		 <div class="clr"></div>

		 <label class="required">Email:</label>
		 <input id="s_email_id" name="s_email" type="text"/>
		 <div class="clr"></div>

		 <label class="required">URL:</label>
		 <input id="s_url_id" name="s_url" type="text" />
		 <div class="clr"></div>

		 <label class="required">Affil:</label>
		 <input id="s_affil_id" name="s_affil" type="text" />
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
