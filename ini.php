
<?php
$con = mysql_connect("localhost", "miguel", "miguel");
mysql_select_db("PED", $con);

/**
 * Este tipo de liga��o � necess�rio para se coneguir realizar transa��es
 */
$link = mysqli_connect("localhost", "miguel", "miguel", "PED");


/* * ****************
 * MINHAS FUN��ES *
 * **************** */

function go_back() {
    echo "<span class=\"go_back\"><A HREF=\"javascript:javascript:history.go(-1)\">Voltar</A></span>";
}
?>
