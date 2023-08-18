<?php

    require_once "connect.php";

    $name = $_POST['name'];
    $view = $_POST['view'];

    if (empty($name)) {
        $name = "Nomsiz";
    }
    if (empty($view)) {
        $view = "0";
    }

    $sql = "INSERT INTO `qodirali`(`name`, `view`, `like`) VALUES ('$name', '$view', 0)";

    if (mysqli_query($connect, $sql)) {
        header('location: index.php');
    } else {
        echo "Xatolik";
    }

?>