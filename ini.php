
<?php
$con = mysql_connect("localhost", "miguel", "miguel");
mysql_select_db("PED", $con);

/**
 * Este tipo de ligação é necessário para se coneguir realizar transações
 */
$link = mysqli_connect("localhost", "miguel", "miguel", "PED");


/* * ****************
 * MINHAS FUNÇÕES *
 * **************** */

function go_back() {
    echo "<span class=\"go_back\"><A HREF=\"javascript:javascript:history.go(-1)\">Voltar</A></span>";
}
?>
