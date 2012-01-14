<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'c'))) {
    header("Location: ../home.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerir - Reposit�rioPED</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
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
                    try {
                        $xml_local = "../uploads/pr/";                      // local onde vai ficar o xml
                        $deliverable_path = "../uploads/deliverables/";     // local onde v�o ser colocados os ficheiros do formul�rio

                        $msg_erro = "";                                     // mensagem que vai conter os erros
                        //var_dump($_GET);

                        $xml_name = $_GET["xml_file"];                      // nome que � passado como parametro
                        $xml_path = $xml_local . $xml_name;                 // local onde est� o ficheiro xml

                        if (file_exists("$xml_path")) {
                            $xml = simplexml_load_file("$xml_path");            // carrega o ficheiro xml
                            //echo $xml->getName();
                            $keyname = utf8_decode($xml->meta->keyname);        // o decode � porque o ficheiro est� com codifica��o utf8
                            $title = utf8_decode($xml->meta->title);
                            $subtitle = utf8_decode($xml->meta->subtitle);
                            $bdate = utf8_decode($xml->meta->bdate);
                            $edate = utf8_decode($xml->meta->edate);
                            $abstract = utf8_decode($xml->abstract->asXML());
                            $supervisores_emails;                               // array com os emails dos supervisors
                            $authors_emails;                                    // array com os ids dos authors
                            $deliverables = array();                            // array associativo dos ficheiros

                            /**
                             * SUPERVISORS
                             */
                            $i = 0;
                            foreach ($xml->meta->supervisors->children() as $child) {
                                if ($child->getName() == "supervisor") {
                                    foreach ($child->children() as $child_s) {
                                        if ($child_s->getName() == "email") {
                                            $email = $child_s;
                                            $supervisores_emails[$i] = $email;
                                            //echo "$email";
                                        }
                                    }
                                    $i++;
                                }
                            }

                            /**
                             * AUTHORS
                             */
                            $i = 0;
                            foreach ($xml->workteam->children() as $child) {
                                if ($child->getName() == "author") {
                                    foreach ($child->children() as $child_s) {
                                        if ($child_s->getName() == "email") {
                                            $email = $child_s;
                                            $authors_emails[$i] = $email;
                                            //echo "$email";
                                        }
                                    }
                                    $i++;
                                }
                            }

                            /**
                             * key words
                             */
                            $kw = $xml->xpath('//kw');

                            $i = 0;
                            while (list(, $node) = each($kw)) {
                                $keywords[$i] = strtoupper($node);
                                $i++;
                            }


                            /**
                             * DELIVERABLES
                             */
                            foreach ($xml->deliverables->children() as $child) {
                                if ($child->getName() == "deliverable") {
                                    foreach ($child->children() as $child_s) {
                                        if ($child_s->getName() == "description") {
                                            $description = $child_s;
                                            //echo "$description";
                                        }
                                        if ($child_s->getName() == "path") {
                                            $path = $child_s;
                                            //echo "$path";
                                        }
                                    }
                                    $deliverables["$path"] = $description;
                                }
                            }

                            //var_dump($supervisores_emails);
                            //var_dump($authors_emails);
                            //var_dump($deliverables);

                            $lig = $link;
                            inserir_xml_base_dados($lig, $keyname, $title, $subtitle, $bdate, $edate, $abstract, $supervisores_emails, $authors_emails, $keywords, $deliverables, $xml_path);
                        } else {
                            echo "<div class=\"failure\">J� n�o � poss�vel submeter o trabalho.
                                Isto pode acontecer porque j� foi submtido. Caso n�o tenha sido,
                                contacte um administrador.</div>";
                        }
                    } catch (Exception $e) {
                        echo "J� n�o � poss�vel submeter o trabalho";
                    }

                    /**
                     * Fun��o que insere toda a informa��o retirada do xml na Base de Dados
                     * @param type $keyname
                     * @param type $title
                     * @param type $subtitle
                     * @param type $bdate
                     * @param type $edate
                     * @param type $abstract
                     * @param type $supervisores_emails array de emails dos supervisores
                     * @param type $authors_emails      array de emails dos autores
                     * @param type $deliverables        array associativo path => description
                     * @param type $xml_path
                     */
                    function inserir_xml_base_dados($link, $keyname, $title, $subtitle, $bdate, $edate, $abstract, $supervisores_emails, $authors_emails, $keywords, $deliverables, $xml_path) {
                        if (!$link) {
                            printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
                            exit();
                        }

                        try {
                            // altera o autocommit das queries
                            mysqli_autocommit($link, FALSE);

                            $ano = date("Y");
                            $mes = date("m");
                            $dia = date("d");
                            $md5_xml = trim(md5_file($xml_path));
                            $local_projeto = "../uploads/$ano/$mes/$dia/$md5_xml/";
                            //este � o que vai ficar na base de dados
                            $local_projeto_bd = "$ano/$mes/$dia/$md5_xml/";

                            // verifica se j� existe um project record praticamente igual $keyname
                            $sql = "SELECT projcode FROM Project WHERE keyname='$keyname' AND title='$title' AND subtitle='$subtitle' AND abstract='$abstract'";
                            $result = mysqli_query($link, $sql);

                            if (mysqli_fetch_row($result) != null) {
                                ?>
                                <div class="failure">Aten��o, a informa��o que quer submeter
                                    j� existe algo muito parecido na base de dados. Por isso
                                    n�o foi submetida.
                                    Contacte um administrador.</div>
                                <?php
                                $msg = "ATEN��O: A informa��o que quer submeter j� existe ";
                                $msg .= "algo muito parecido na base de dados. ";
                                $msg .= "Contacte um administrador!";
                                //echo "$msg";
                                return;
                            }

                            // caso n�o existe informa��o parecida na Base de Dados, vai inseri-la
                            $sql = "INSERT INTO `PED`.`Project` VALUES (NULL, '$keyname', '$title', '$subtitle', '$bdate', '$edate', NOW(), '$abstract', '1', '$local_projeto_bd')";
                            echo "$sql";
                            $result = mysqli_query($link, $sql);

                            // projcode que foi inserido temporariamente
                            $new_projcode = mysqli_insert_id($link);
                            //echo "<br/>ID: $new_projcode<br/>";

                            /**
                             * vai a todos os emails dos supervisors, procura o supcode e
                             * insere na tabela ProjSup com o $new_projcode
                             */
                            foreach ($supervisores_emails as $value) {
                                // seleccionar o id do supervisor
                                $sql = "SELECT supcode FROM Supervisor WHERE email='$value';";
                                $result = mysqli_query($link, $sql);

                                while ($rows = mysqli_fetch_row($result)) {
                                    $supcod = $rows[0];
                                }

                                $sql = "INSERT INTO `PED`.`ProjSup` VALUES ('$new_projcode', '$supcod');";
                                $result = mysqli_query($link, $sql);
                            }

                            /**
                             * vai a todos os emails dos authores, procura o authorcode e
                             * insere na tabela ProjAut com o $new_projcode
                             */
                            foreach ($authors_emails as $value) {
                                // seleccionar o id do supervisor
                                $sql = "SELECT authorcode FROM Author WHERE email='$value';";
                                $result = mysqli_query($link, $sql);

                                while ($rows = mysqli_fetch_row($result)) {
                                    //var_dump($rows);
                                    $authorcode = $rows["0"];
                                }

                                $sql = "INSERT INTO `PED`.`ProjAut` VALUES ('$new_projcode', '$authorcode');";
                                $result = mysqli_query($link, $sql);
                            }

                            /**
                             * vai a todas as key words e vai inserir na base de dados a kw,
                             * ou caso exista, apenas associa ao projecto
                             */
                            foreach ($keywords as $value) {
                                $sql = "SELECT COUNT(kwcode) AS total FROM KeyWord WHERE keyword='$value'";
                                //echo "<br/>$sql";
                                $result = mysqli_query($link, $sql);
                                $total_kw = 0;
                                while ($rows = mysqli_fetch_row($result)) {
                                    $total_kw = $rows[0];
                                }
                                //echo "<br/>Total: $total_kw<br/>";
                                // caso ainda n�o exista a key word na base de dados, vai inserir
                                if ($total_kw == 0) {
                                    $sql = "INSERT INTO `PED`.`KeyWord` VALUES (NULL, '$value'); ";
                                    $result = mysqli_query($link, $sql);
                                    // kwcode que foi inserido temporariamente
                                    $new_kw = mysqli_insert_id($link);

                                    $sql = "INSERT INTO `PED`.`ProjKW` VALUES ('$new_projcode', $new_kw);";
                                    $result = mysqli_query($link, $sql);
                                } else {
                                    $sql = "SELECT kwcode FROM KeyWord WHERE keyword='$value'";
                                    $result = mysqli_query($link, $sql);
                                    $id_kw = 0;
                                    while ($rows = mysqli_fetch_row($result)) {
                                        $id_kw = $rows[0];
                                    }
                                    $sql = "INSERT INTO `PED`.`ProjKW` VALUES ('$new_projcode', $id_kw);";
                                    $result = mysqli_query($link, $sql);
                                }
                            }



                            /* _________________________________________________________ */
                            /*                       FICHEIROS                           */
                            // mover os ficheiros de s�tio
                            $ano = date("Y");
                            $mes = date("m");
                            $dia = date("d");
                            $md5_xml = trim(md5_file($xml_path));
                            $local_projeto = "../uploads/$ano/$mes/$dia/$md5_xml/";
                            //este � o que vai ficar na base de dados
                            $local_projeto_bd = "$ano/$mes/$dia/$md5_xml/";

                            // verifica se a pasta j� existe ou n�o
                            if (!is_dir($local_projeto)) {
                                if (!mkdir($local_projeto, 0777, true)) {
                                    die("Ocoreu um erro ao criar a pasta $local_projeto");
                                    return;
                                }
                            }

                            // move os ficheiros que estavam na pasta deliverables para o local correcto
                            // key � o path, $value � o nome
                            foreach ($deliverables as $key => $value) {
                                $f1 = "../uploads/deliverables/$key";
                                $f2 = "$local_projeto" . "$key";
                                rename($f1, $f2);               // isto faz um move do ficheiro
                            }

                            // move o ficheiro xml tamb�m para a pasta
                            rename($xml_path, $local_projeto . "pr.xml");

                            /**
                             * pega no array associativo dos deliverables path => description 
                             * e insere na tabela Deliverable com o $new_projcode
                             */
                            foreach ($deliverables as $key => $value) {
                                $sql = "INSERT INTO `PED`.`Deliverable` VALUES (NULL , '$value', '$local_projeto_bd$key', '$new_projcode');";
                                $result = mysqli_query($link, $sql);
                            }

                            mysqli_commit($link);

                            mysqli_autocommit($link, TRUE);

                            mysqli_close($link);
                            ?>
                            <div class="clr"></div>
                            <div class="success">Informa��o submetida com sucesso!</div>

                            <strong>Detalhes da submiss�o</strong>
                            <div class="clr"></div>
                            <b>ID: </b> <?php echo $new_projcode; ?>
                            <div class="clr"></div>
                            <b>Data: </b> <?php echo date('Y-m-d'); ?>
                            <div class="clr"></div>
                            <b>Hora: </b> <?php echo date('H:i:s'); ?>
                            <div class="clr"></div>

                            <?php
                        } catch (Exception $e) {
                            ?>
                            <div class="failure">Ocorreu um erro ao submeter a informa��o!</div>
                            <?php
                        }
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