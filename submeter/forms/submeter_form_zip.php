
<?php
include '../ini.php';
?>

<script>
    function check_file(){
        str=document.getElementById('zip_file').value.toUpperCase();
        suffix=".ZIP";
        if(!(str.indexOf(suffix, str.length - suffix.length) !== -1)){
            alert('File type not allowed,\nAllowed file: *.zip');
            document.getElementById('zip_file').value='';
        }
    }
</script>

<div id="form_submeter_zip">
    <form name="projetc_zip" action="submeter_zip_resp.php" method="post" enctype="multipart/form-data" autocomplete="on">
        <h3>Ficheiro</h3>
        <div class="clr"></div>
        <label class="required">Ficheiro zip:</label>

        <input id="zip_file" type="file" name="zip_file" required="" onchange="check_file()"/>
        <br/>
        <input type="checkbox" name="private"/> <b>Tornar o projeto privado</b>.
        <hr />
        
        <div id="btn_user">
            <!-- Aqui era para testar com java script
                <input id="submit_btn" type="button" value="Enviar" onclick="submeter()" /> 
            -->
            <input id="submit_btn" type="submit" value="Enviar" />
        </div>
    </form>
</div>
<div class="clr"></div>
<span style="float: right" class="required">Campo Obrigatório</span>
