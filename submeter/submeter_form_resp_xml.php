<!DOCTYPE html>
<html>
    <head>
        <title>Gerir - RepositórioPED</title>
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
                    $xml_local = "../uploads/pr/";                      // local onde vai ficar o xml
                    $deliverable_path = "../uploads/deliverables/";     // local onde vão ser colocados os ficheiros do formulário

                    $msg_erro = "";                                     // mensagem que vai conter os erros
                    //var_dump($_GET);

                    $xml_name = $_GET["xml_file"];                      // nome que é passado como parametro
                    $xml_path = $xml_local . $xml_name;                 // local onde está o ficheiro xml

                    $xml = simplexml_load_file("$xml_path");            // carrega o ficheiro xml
                    //echo $xml->getName();
                    $keyname = utf8_decode($xml->meta->keyname);        // o decode é porque o ficheiro está com codificação utf8
                    $title = utf8_decode($xml->meta->title);
                    $subtitle = utf8_decode($xml->meta->subtitle);
                    $bdate = utf8_decode($xml->meta->bdate);
                    $edate = utf8_decode($xml->meta->edate);
                    $abstract = utf8_decode($xml->abstract);
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

                    inserir_xml_base_dados($lig, $keyname, $title, $subtitle, $bdate, $edate, $abstract, $supervisores_emails, $authors_emails, $deliverables);

                    /**
                     * Função que insere toda a informação retirada do xml na Base de Dados
                     * @param type $keyname
                     * @param type $title
                     * @param type $subtitle
                     * @param type $bdate
                     * @param type $edate
                     * @param type $abstract
                     * @param type $supervisores_emails array de emails dos supervisores
                     * @param type $authors_emails      array de emails dos autores
                     * @param type $deliverables        array associativo path => description
                     */
                    function inserir_xml_base_dados($link, $keyname, $title, $subtitle, $bdate, $edate, $abstract, $supervisores_emails, $authors_emails, $deliverables) {
                        if (!$link) {
                            printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
                            exit();
                        }

                        try {
                            // altera o autocommit das queries
                            mysqli_autocommit($link, FALSE);

                            // verifica se já existe um project record praticamente igual
                            $sql = "SELECT projcode FROM Project WHERE keyname='$keyname' AND title='$title' AND subtitle='$subtitle' AND abstract='$abstract'";
                            $result = mysqli_query($link, $sql);

                            if (mysqli_fetch_row($result) != null) {
                                ?>
                                <div class="failure">Atenção, a informação que quer submeter
                                    já existe algo muito parecido na base de dados. Por isso
                                    não foi submetida.
                                    Contacte um administrador.</div>
                                <?php
                                $msg = "ATENÇÃO: A informação que quer submeter já existe ";
                                $msg .= "algo muito parecido na base de dados. ";
                                $msg .= "Contacte um administrador!";
                                //echo "$msg";
                                return;
                            }

                            // caso não existe informação parecida na Base de Dados, vai inseri-la
                            $sql = "INSERT INTO `PED`.`Project` VALUES (NULL, '$keyname', '$title', '$subtitle', '$bdate', '$edate', NOW(), '$abstract', '1')";
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
                                    $authorcode = $rows["0"];
                                }

                                $sql = "INSERT INTO `PED`.`ProjAut` VALUES ('$new_projcode', '$authorcode');";
                                $result = mysqli_query($link, $sql);
                            }

                            /**
                             * pega no array associativo dos deliverables path => description 
                             * e insere na tabela Deliverable com o $new_projcode
                             */
                            foreach ($deliverables as $key => $value) {
                                $sql = "INSERT INTO `PED`.`Deliverable` VALUES (NULL , '$value', '$key', '$new_projcode');";
                                $result = mysqli_query($link, $sql);
                            }

                            mysqli_commit($link);

                            mysqli_autocommit($link, TRUE);

                            mysqli_close($link);
                            ?>
                            <div class="clr"></div>
                            <div class="success">Informação submetida com sucesso!</div>

                            <strong>Detalhes da submissão</strong>
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
                            <div class="failure">Ocorreu um erro ao submeter a informação!</div>
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
