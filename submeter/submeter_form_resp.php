<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type']=='c'))) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir - RepositórioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <script language="javascript">
            function go_back(){
                history.go(-1);
            }
        </script>
    </head>

    <body>
        <div id="container">
            <?php
            include '../header.php';
            include '../menus/menu_submeter.php';
            include '../menus/leftmenuSubmeter.php';
            include '../ini.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Project Record</h2>

                    <?php
                    //var_dump($_POST);
                    // Local onde vai ficar o ficheiro XML Submetido
                    $xml_file = "../uploads/pr/";                       // local onde vai ficar o xml
                    $deliverable_path = "../uploads/deliverables/";     // local onde vão ser colocados os ficheiros do formulário

                    $msg_erro = "";                                     // mensagem que vai conter os erros
                    ?>
                    <div id="form_submeter_resp">
                        <?php
                        $key_name = $_REQUEST["key_name"];                  // key_name
                        $title = $_REQUEST["title"];                        // title
                        $subtitle = $_REQUEST["subtitle"];                  // subtitle
                        $bdate = $_REQUEST["begin_date"];                   // begin date
                        $edate = $_REQUEST["end_date"];                     // end date
                        $abstract = $_REQUEST["abstract_text"];             // abstract


                        if ($_REQUEST["key_name"] == null) {                // verifica se os campos estão preenchidos
                            $msg_erro .= "key name invalid.<br/>";
                        } else if ($_REQUEST["title"] == null) {
                            $msg_erro .= "title invalid.<br/>";
                        } else if ($_REQUEST["begin_date"] == null) {
                            $msg_erro .= "begin_date invalid.<br/>";
                        } else if ($_REQUEST["end_date"] == null) {
                            $msg_erro .= "end_date invalid.<br/>";
                        } else if ($_REQUEST["abstract_text"] == null) {
                            $msg_erro .= "abstract invalid.<br/>";
                        }

                        /* __________________________________________ SUPERVISORS _________________________________________ */

                        if (!empty($_POST["checkbox_supervisor"])) {            // verifica se o array de supervisores existe
                            $num_sup = sizeof($_POST["checkbox_supervisor"]);   // se existir guarda quantas posições tem
                        } else {
                            $num_sup = 0;
                            $msg_erro .= "Nenhum Supervisor adicionado!<br/>";  // se for 0 ocorre um erro porque não foi selecioado nenhum array
                        }

                        for ($i = 0; $i < $num_sup; $i++) {
                            if (!empty($_POST["checkbox_supervisor"][$i])) {
                                $sel_id = $_POST["checkbox_supervisor"][$i];
                                $supervisors_id[$i] = $sel_id;                  // coloca os ids dos supervisores num array
                            }
                        }
                        //echo "<br/><br/>";
                        //var_dump($supervisors_id);
                        //echo "<br/><br/>";
                        /* ________________________________________________________________________________________________ */

                        /* ___________________________________________ WORKTEAM ___________________________________________ */
                        if (!empty($_POST["checkbox_author"])) {
                            $num_author = sizeof($_POST["checkbox_author"]);
                        } else {
                            $num_author = 0;
                            $msg_erro .= "Nenhum Author adicionado!<br/>";
                        }

                        for ($i = 0; $i < $num_author; $i++) {
                            if (!empty($_POST["checkbox_author"][$i])) {
                                $sel_id = $_POST["checkbox_author"][$i];
                                $authors_id[$i] = $sel_id;
                            }
                        }
                        //echo "<br/><br/>";
                        //var_dump($authors_id);
                        //echo "<br/><br/>";

                        /* ________________________________________________________________________________________________ */

                        if ($msg_erro == "") {
                            /* ___________________________________________ XML ___________________________________________ */
                            $xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?><pr><meta>";
                            $xml .= "<keyname>$key_name</keyname>";
                            $xml .= "<title>$title</title>";
                            if (!empty($subtitle)) {
                                $xml .= "<subtitle>$subtitle</subtitle>";
                            }
                            $xml .= "<bdate>$bdate</bdate>";
                            $xml .= "<edate>$edate</edate>";
                            $xml .= supervisor_xml($supervisors_id);
                            $xml .= "</meta>";
                            $xml .= workteam_xml($authors_id);
                            $xml .= "<abstract>$abstract</abstract>";
                            $xml .= delivarables($deliverable_path);
                            $xml .= "</pr>";

                            $xml_md5 = md5($xml);   // atenção que aqui é o md5 do texto do ficheiro e não do ficheiro
                            $xml_name = "$xml_md5.xml";
                            $xml_file = "../uploads/pr/$xml_name";
                            //$xml_file = $key_name . ".xml";
                            $f = fopen($xml_file, "w");
                            fprintf($f, "$xml");

                            fclose($f);

                            // aqui é preciso verificar se o ficheiro está correcto com o xsd
                            ?>
                            <h3>Resultado</h3>
                            Foi criado um ficheiro xml que contêm toda a informação que foi submetida no formulário
                            anterior.
                            <div class="clr"></div>
                            Clique no link para abrir esse ficheiro:

                            <a href="<?php echo $xml_file; ?>" target="_blank">Ficheiro XML</a>
                            <?php
                            //echo "<a href=\"" . $xml_file . "\" target=\"_blank\">Clique para ver o resultado do que foi carregado.</a>";
                            /* ________________________________________________________________________________________________ */


                            /* ____________________________________ INSERIR NA BASE DE DADOS __________________________________ */
                            ?>
                            <div class="clr"></div>
                            <h3>Confirmação</h3>
                            A informação apenas foi carregada para o servidor, para inserir o que foi carregado 
                            terá de confirmar a informação.
                            <div class="clr"></div>
                            <form id ="form_xml_submit"
                                  name="xml_submit"
                                  method="get"
                                  autocomplete="on"
                                  action="submeter_form_resp_xml.php"
                                  >
                                <input name="xml_file" type="text" readonly="" required="" value="<?php echo $xml_name ?>" style="display: none"/>
                                <A HREF="javascript:javascript:history.go(-1)"></A>
                                <input name="btn_go_back" type="button" value="voltar" onclick="go_back()"/>
                                <input name="btn_submit_form" type="submit" value="Confirmar Informação"/>
                            </form>
                            <div class="clr"></div>
                            <?php
                            /* ________________________________________________________________________________________________ */
                        } else {
                            echo "$msg_erro";
                        }
                        ?>
                    </div>
                    <?php

                    /**
                     * Trata de colcar a informação dos supervisores no xml
                     * @param type $sup_array Array de Supervisores
                     * @return type 
                     */
                    function supervisor_xml($sup_array) {
                        $xml = "<supervisors>";

                        for ($i = 0; $i < sizeof($sup_array); $i++) {
                            $id = $sup_array[$i];
                            $sql = "SELECT name, email, url, affil FROM Supervisor WHERE supcode='$id'";
                            $result = mysql_query($sql);

                            $xml .= "<supervisor>";
                            while ($rows = mysql_fetch_array($result)) {
                                $xml .= "<name>" . $rows["name"] . "</name>";
                                $xml .= "<email>" . $rows["email"] . "</email>";
                                $xml .= "<url>" . $rows["url"] . "</url>";
                                $xml .= "<affil>" . $rows["affil"] . "</affil>";
                            }
                            $xml .= "</supervisor>";
                        }
                        $xml .= "</supervisors>";
                        return ($xml);
                    }

                    /**
                     * Trata de colocar a informação dos autores no xml
                     * @param type $auth_array Array com ids de autores
                     * @return type 
                     */
                    function workteam_xml($auth_array) {
                        $xml = "<workteam>";

                        for ($i = 0; $i < sizeof($auth_array); $i++) {
                            $id = $auth_array[$i];
                            $sql = "SELECT name, id, email, url FROM Author WHERE authorcode='$id'";
                            $result = mysql_query($sql);

                            $xml .= "<author>";
                            while ($rows = mysql_fetch_array($result)) {
                                $xml .= "<name>" . $rows["name"] . "</name>";
                                $xml .= "<id>" . $rows["id"] . "</id>";
                                $xml .= "<email>" . $rows["email"] . "</email>";
                                $xml .= "<url>" . $rows["url"] . "</url>";
                            }
                            $xml .= "</author>";
                        }

                        $xml .= "</workteam>";
                        return ($xml);
                    }

                    /**
                     * Função que trata com a juda de uma função auxiliar de renoimear os ficheiros e colocar no sitio certo
                     * @param type $delivarable_path local onde vai ser colocado o ficheiro
                     * @return string 
                     */
                    function delivarables($delivarable_path) {

                        echo "<h3>Ficheiros Carregados</h3>";

                        $xml = "<deliverables>";
                        $xml .= delivarable_create("deliverable1_file", "deliverable1_name", $delivarable_path);
                        $xml .= delivarable_create("deliverable2_file", "deliverable2_name", $delivarable_path);
                        $xml .= delivarable_create("deliverable3_file", "deliverable3_name", $delivarable_path);
                        $xml .= delivarable_create("deliverable4_file", "deliverable4_name", $delivarable_path);
                        $xml .= delivarable_create("deliverable5_file", "deliverable5_name", $delivarable_path);
                        $xml .= delivarable_create("deliverable6_file", "deliverable6_name", $delivarable_path);
                        $xml .= "</deliverables>";
                        return $xml;
                    }

                    /**
                     * Função que trata um ficheiro adicionado no formulário
                     * @param type $file
                     * @param type $name
                     * @param type $deliverable_path
                     * @return string 
                     */
                    function delivarable_create($file, $name, $deliverable_path) {
                        $xml = "";
                        if (!$_FILES[$file]["error"] > 0) {
                            if (file_exists("uploads/" . $_FILES[$file]["name"])) {         // verifica se o ficheiro existe
                                echo $_FILES[$file]["name"] . "já existe.";
                            } else {
                                $xml .= "<deliverable>";
                                $xml .= "<description>$_REQUEST[$name]</description>";      // nome do ficheiro inserido no formulário
                                $tmp_name = $_FILES[$file]["tmp_name"];                     // path temporário do ficheiro submetido

                                $nome = $_FILES[$file]["name"];                             // nome do ficheiro
                                $pattern = "/\.[a-zA-Z]{3,4}$/";                            // expressão regular para apanhar a extensão
                                $extensao = "";                                             // variável onde vai ficar o resultado da expressão regular
                                preg_match($pattern, $nome, $extensao_array);               // faz o match da expressão regular com o nome do ficheiro
                                //echo "<br/>Extensoes: $extensao_array[0]<br/>";
                                $extensao = $extensao_array[0];

                                $file_md5 = trim(md5_file($tmp_name));                      // calcula o md5 do ficheiro

                                $namef = $deliverable_path . $file_md5 . $extensao;         // local para onde vai ser movido o ficheiro
                                move_uploaded_file($tmp_name, $namef);                      // acção de mover o ficheiro
                                //var_dump($_FILES);
                                //echo "MD5: $file_md5<br/>";

                                $xml .= "<path>" . $file_md5 . $extensao . "</path>";       // path que vai ser colocado no xml
                                $xml .= "</deliverable>";

                                //echo "Guardado em: " . $namef . "<br />";
                                echo "Ficheiro: " . "<a href=\"" . $namef . "\" target=\"_blank\">" . $_REQUEST[$name] . "</a><br />";
                            }
                        }
                        return $xml;
                    }
                    ?>
                    <br/>
                    <br/>
                </div>
                <div id="content_bottom"></div>

                <?php
                include '../menus/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>