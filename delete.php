<?php

    require_once "connect.php";

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
    }

    $sql = "DELETE FROM `qodirali` WHERE id='$id'";

    if (mysqli_query($connect, $sql) === TRUE) {
        header('location: index.php');
    } else {
        echo "xato";
    }

?>