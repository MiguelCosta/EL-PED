<?php

session_start();

require_once '../ini.php';
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$sql = "SELECT * FROM Users WHERE username='$username'";
$query = mysql_query($sql, $con) or die(mysql_error());

$numRows = mysql_num_rows($query);

if ($numRows != 0) {
    while ($row = mysql_fetch_assoc($query)) {
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
        $dbtype = $row['type'];
    }

    if ($username == $dbpassword && $password == $dbpassword) {
        $_SESSION['username'] = $dbusername;
        $_SESSION['type'] = $dbtype;

        //echo $_SESSION['username'] , " AND " , $_SESSION['type'] ;
    }
    else
        echo "<script type=\"text/javascript\">alert(\"Password incorrecta!\");</script>";
}
else {
    echo "<script type=\"text/javascript\">alert(\"Esse utilizador não existe!\");</script>";
    // @TODO: nao sei se isto teria outra forma de ser feito
}
header("Location: ../home.php");
// @TODO: as verificacoes de existencia, depois do alert têm de ficar na mesma pag
?>