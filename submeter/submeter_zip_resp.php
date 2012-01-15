<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'c'))) {
    header("Location: ../home.php");
}
?>

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
                    <h2>Submissão por Zip</h2>                    

                    <?php
                    $file = 'zip_file';
                    $deliverable_path = "../uploads/zip/";

                    if (!$_FILES[$file]["error"] > 0) {
                        if (file_exists("uploads/" . $_FILES[$file]["name"])) {         // verifica se o ficheiro existe
                            echo $_FILES[$file]["name"] . "já existe.";
                        } else {
                            $tmp_name = $_FILES[$file]["tmp_name"];                     // path temporário do ficheiro submetido

                            $nome = $_FILES[$file]["name"];                             // nome do ficheiro
                            $pattern = "/\.[a-zA-Z]{0,4}$/";                            // expressão regular para apanhar a extensão
                            $extensao = "";                                             // variável onde vai ficar o resultado da expressão regular
                            preg_match($pattern, $nome, $extensao_array);               // faz o match da expressão regular com o nome do ficheiro
                            //echo "<br/>Extensoes: $extensao_array[0]<br/>";
                            $extensao = $extensao_array[0];

                            $file_md5 = trim(md5_file($tmp_name));                      // calcula o md5 do ficheiro

                            $namef = $deliverable_path . $file_md5 . $extensao;         // local para onde vai ser movido o ficheiro
                            move_uploaded_file($tmp_name, $namef);                      // acção de mover o ficheiro
                            //var_dump($_FILES);
                            //echo "MD5: $file_md5<br/>";

                            echo "Ficheiro: " . "<a href=\"" . $namef . "\" target=\"_blank\">" . $_FILES[$file]["name"] . "</a><br />";



                            $zip = zip_open("$namef");
                            $doc = new DOMDocument();       // DOM xml
                            $files_zip;                     // array com os ficheiros que estão no zip
                            $i = 0;                         // índice para o array $files_zip
                            $xml = "";                      // simple xml
                            $valido = false;                // estado do xml validado pelo schema
                            $contem_ficheiros = true;       // estado de verificar se os ficheiros que estão no xml também estão no zip
                            // vai percorrer todos os ficheiros do zip
                            if ($zip) {
                                while ($zip_entry = zip_read($zip)) {
                                    echo "Name:               " . zip_entry_name($zip_entry) . "<br/>\n";
                                    echo "Actual Filesize:    " . zip_entry_filesize($zip_entry) . "<br/>\n";
                                    echo "Compressed Size:    " . zip_entry_compressedsize($zip_entry) . "<br/>\n";
                                    echo "Compression Method: " . zip_entry_compressionmethod($zip_entry) . "<br/>\n";

                                    // se for o pr.xml vai ler para a variável $xml o seu conteúdo
                                    if (zip_entry_name($zip_entry) == 'pr.xml') {
                                        echo "É o ficheiro xml.";
                                        if (zip_entry_open($zip, $zip_entry, "r")) {
                                            echo "File Contents:<br/>\n";
                                            // $buf contêm todo o conteúdo do ficheiro
                                            $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                                            //echo "$buf\n";
                                            // faz load para o simple xml
                                            $xml = simplexml_load_string($buf);
                                            // faz load para o Dom Document
                                            $doc->loadXML($buf);
                                            // fecha o ficheiro em causa depois de o ler
                                            zip_entry_close($zip_entry);
                                        }
                                    } else {
                                        $files_zip[$i] = zip_entry_name($zip_entry);
                                    }

                                    echo "<br/>";
                                }
                                // fim de percorrer os ficheiros

                                echo "Agora vai verificar se o xml está correcto.<br/>";

                                // verificar se o xml está correcto com o schema
                                libxml_use_internal_errors(true);           // para ativar os erros
                                if (!$doc->schemavalidate('../util/pr.xsd')) {
                                    //print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
                                    libxml_display_errors();
                                } else {
                                    $valido = true;
                                    echo "Documento válido.";
                                    echo "<br/>";
                                }

                                // vai verificar se o xml contêm os ficheiros que diz no zip
                                // passa os paths que está no xml para um array
                                if ($valido) {
                                    $ficheiros = $xml->xpath('//path');
                                    $ficheiros2;

                                    $i = 0;
                                    while (list(, $node) = each($ficheiros)) {
                                        $ficheiros2[$i] = utf8_decode($node);
                                        $i++;
                                    }
                                }
                                echo "<br/>";
                                var_dump($ficheiros);
                                echo "<br/>";
                                var_dump($ficheiros2);
                                echo "<br/>";
                                var_dump($files_zip);

                                // verifica se os ficheiros que estão no xml, também estão dentro do zip
                                foreach ($ficheiros2 as $f) {
                                    $encontrado = false;
                                    foreach ($files_zip as $f_z) {
                                        if ($f == $f_z) {
                                            $encontrado = true;
                                            break;
                                        }
                                    }
                                    if (!$encontrado) {
                                        $contem_ficheiros = false;
                                        break;
                                    }
                                }

                                
                                if ($contem_ficheiros && $valido) {
                                    echo "<br/>A Informação inserida está válida<br/>";
                                    echo "<br/>Resultado<br/>:";

                                    // se estiver tudo direito, vai transformar o xml para html
                                    $xslt = new XSLTProcessor();
                                    $XSL = new DOMDocument();
                                    $XSL->load('../util/pr.xsl', LIBXML_NOCDATA);
                                    $xslt->importStylesheet($XSL);
                                    echo $xslt->transformToXML($doc);
                                    
                                    
                                    
                                }
                                zip_close($zip);
                            }
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

<?php
?>