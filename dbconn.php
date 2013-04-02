<?php
    $kapcs = mysql_connect("oziris2.nyme.hu/phpmyadmin","iliasr", "ili6543tQ");
    if (!$kapcsolat) {
        die('Hiba a csatlakozáskor: ' . mysql_error()); 
    }
    mysql_select_db("iliasr", $kap);
?>

