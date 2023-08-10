<?php

    $server = "localhost";
    $root = "root";
    $password = "";
    $base = "shaptoli";
    
    $connect = new mysqli($server, $root, $password, $base);

    if ($connect->connect_error) {
        die("Ulanmadi");
    }

?>
