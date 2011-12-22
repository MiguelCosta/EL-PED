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
            include '../menus/header.php';
            include '../menus/menu_submeter.php';
            include '../menus/leftmenuSubmeter.php';
            include '../ini.php';
            ?>


            <div id="content">
                <div id="content_top"></div>
                <div id="content_main">
                    <h2>Project Record</h2>

                    <?php
                    var_dump($_POST);

                    // Local onde vai ficar o ficheiro XML Submetido
                    $xml_file = "../uploads/pr/pr.xml";
                    $deliverable_path = "../uploads/deliverables";

                    $msg_erro = "";

                    $xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";
                    $xml .= "<meta>";

                    $key_name = $_REQUEST["key_name"];
                    $title = $_REQUEST["title"];
                    $subtitle = $_REQUEST["subtitle"];
                    $bdate = $_REQUEST["begin_date"];
                    $edate = $_REQUEST["end_date"];
                    $abstract = $_REQUEST["abstract_text"];
                    

                    if ($_REQUEST["key_name"] == null) {
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

                    if ($_POST["checkbox_supervisor"] != null) {
                        $num_sup = sizeof($_POST["checkbox_supervisor"]);
                    } else {
                        $num_sup = 0;
                        $msg_erro .= "Nenhum Supervisor adicionado!<br/>";
                    }

                    for ($i = 0; $i < $num_sup; $i++) {
                        $sel_id = $_POST["checkbox_supervisor"][$i];
                        $supervisors_id[$i] = $sel_id;
                    }
                    echo "<br/>Supervisores<br/>";
                    var_dump($supervisors_id);
                    /* ________________________________________________________________________________________________ */

                    /* ___________________________________________ WORKTEAM ___________________________________________ */
                    if ($_POST["checkbox_author"] != null) {
                        $num_author = sizeof($_POST["checkbox_author"]);
                    } else {
                        $num_author = 0;
                        $msg_erro .= "Nenhum Supervisor adicionado!<br/>";
                    }

                    for ($i = 0; $i < $num_author; $i++) {
                        $sel_id = $_POST["checkbox_author"][$i];
                        $authors_id[$i] = $sel_id;
                    }
                    echo "<br/>Authors<br/>";
                    var_dump($authors_id);
                    
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
                        $xml .= supervisor_xml($supervisor1, $supervisor2);
                        $xml .= "</meta>";
                        $xml .= workteam_xml($workteam1, $workteam2, $workteam3);
                        $xml .= "<abstract>$abstract</abstract>";
                        $xml .= delivarables($deliverable_path);
                        $xml .= "</pr>";

                        $xml_file = "../uploads/pr/pr.xml";
                        //$xml_file = $key_name . ".xml";
                        $f = fopen($xml_file, "w");
                        fprintf($f, "$xml");

                        fclose($f);
                        echo "<hr/><br/>Clique <a href=\"" . $xml_file . "\">para ver o resultado do que foi inserido.</a><br/><hr/><br/>";
                        /* ________________________________________________________________________________________________ */
                    } else {
                        echo "$msg_erro";
                    }

                    function supervisor_check($supervisor) {
                        $msg = "";
                        if ($supervisor["email"] == null) {
                            $msg .= "Email supervisor incorrect.";
                            return $msg;
                        } else if ($supervisor["name"] == null) {
                            $msg .= "Name supervisor incorrect.";
                            return $msg;
                        } else if ($supervisor["link"] == null) {
                            $msg .= "Link supervisor incorrect.";
                            return $msg;
                        } else if ($supervisor["department"] == null) {
                            $msg .= "Department supervisor incorrect.";
                            return $msg;
                        }

                        return ($msg);
                    }

                    function supervisor_xml($supervisor1, $supervisor2) {
                        $msg = "<supervisors>";

                        $msg .= "<supervisor>";
                        $msg .= "<name>" . $supervisor1["name"] . "</name>";
                        $msg .= "<email>" . $supervisor1["email"] . "</email>";
                        $msg .= "<url>" . $supervisor1["link"] . "</url>";
                        $msg .= "<affil>" . $supervisor1["department"] . "</affil>";
                        $msg .= "</supervisor>";

                        if (supervisor_check($supervisor2) == "") {
                            $msg .= "<supervisor>";
                            $msg .= "<name>" . $supervisor2["name"] . "</name>";
                            $msg .= "<email>" . $supervisor2["email"] . "</email>";
                            $msg .= "<url>" . $supervisor2["link"] . "</url>";
                            $msg .= "<affil>" . $supervisor2["department"] . "</affil>";
                            $msg .= "</supervisor>";
                        }

                        $msg .= "</supervisors>";
                        return ($msg);
                    }

                    function workteam_check($workteam) {
                        $msg = "";
                        if ($workteam["email"] == null) {
                            $msg .= "Email workteam incorrect.";
                            return $msg;
                        } else if ($workteam["name"] == null) {
                            $msg .= "Name workteam incorrect.";
                            return $msg;
                        } else if ($workteam["id"] == null) {
                            $msg .= "ID workteam incorrect.";
                            return $msg;
                        }

                        return ($msg);
                    }

                    function workteam_xml($workteam1, $workteam2, $workteam3) {
                        $msg = "<workteam>";

                        $msg .= "<author>";
                        $msg .= "<name>" . $workteam1["name"] . "</name>";
                        $msg .= "<id>" . $workteam1["id"] . "</id>";
                        $msg .= "<email>" . $workteam1["email"] . "</email>";
                        $msg .= "</author>";

                        if (workteam_check($workteam2) == "") {
                            $msg .= "<author>";
                            $msg .= "<name>" . $workteam2["name"] . "</name>";
                            $msg .= "<id>" . $workteam2["id"] . "</id>";
                            $msg .= "<email>" . $workteam2["email"] . "</email>";
                            $msg .= "</author>";
                        }

                        if (workteam_check($workteam3) == "") {
                            $msg .= "<author>";
                            $msg .= "<name>" . $workteam3["name"] . "</name>";
                            $msg .= "<id>" . $workteam3["id"] . "</id>";
                            $msg .= "<email>" . $workteam3["email"] . "</email>";
                            $msg .= "</author>";
                        }

                        $msg .= "</workteam>";
                        return ($msg);
                    }

                    function delivarables($delivarable_path) {
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

                    function delivarable_create($file, $name, $deliverable_path) {
                        $xml = "";
                        if (!$_FILES[$file]["error"] > 0) {
                            if (file_exists("uploads/" . $_FILES[$file]["name"])) {
                                echo $_FILES[$file]["name"] . "já existe.";
                            } else {
                                $xml .= "<deliverable>";
                                $xml .= "<description>$_REQUEST[$name]</description>";
                                $tmp_name = $_FILES[$file]["tmp_name"];

                                $key_name = $_REQUEST["key_name"];
                                $edate = $_REQUEST["end_date"];
                                $workteam1["name"] = $_REQUEST["workteam1_Name"];
                                $file = str_replace("/", "-", $key_name . "_" . $edate . "_" . $workteam1["name"] . "_" . $_FILES[$file]["name"]);
                                $namef = $deliverable_path . $file;

                                move_uploaded_file($tmp_name, $namef);

                                $xml .= "<path>$file</path>";
                                $xml .= "</deliverable>";
                                //echo "Guardado em: " . "uploads/" . $_FILES[$file]["name"] . "<br />";
                                //echo "Use o link para aceder ao ficheiro carregado: " . "<a href=\"" . $namef . "\">" . $namef . "</a><br />";
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