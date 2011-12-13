
<?php
$con = mysql_connect("localhost", "miguel", "miguel");
mysql_select_db("PED1", $con);



/* * ****************
 * MINHAS FUNÇÕES *
 * **************** */

function go_back() {
    echo "<span class=\"go_back\"><A HREF=\"javascript:javascript:history.go(-1)\">Voltar</A></span>";
}
?>

