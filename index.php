<?php

require_once "connect.php";

$sql = "SELECT * FROM `qodirali`";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="app font-monospace">
        <div class="content">
            <div class="info">
                <p class="fs-3 text-uppercase">Barcha kinolar: </p>
                <p class="fs-4 text-uppercase">Yoqtirilgan kinolar: </p>
            </div>
            <div class="search">
                <input type="text" class="form-control search-input" placeholder="Search">
            </div>
            <ul class="films">
                <?php

                if ($result = mysqli_query($connect, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "
                            <li class='list-group-item d-flex justify-content-between favourite'>
                                <span class='list-group-item-label'>" . $row['name'] . "</span>
                                <input type='number' class='list-group-item-input' value='" . $row['view'] . "' disabled>
                                <div class='d-flex justify-content-center align-items-center'>
                                    <button type='button' class='btn-cookie btn-sm'>
                                        <i class='fas fa-cookie'></i>
                                    </button>
                                    <a href='delete.php?delete=". $row['id'] ."' class='btn-trash btn-sm'>
                                        <i class='fas fa-trash'></i>
                                    </a>
                                    <i class='fas fa-star'></i>
                                </div>
                            </li>
                        ";
                        }
                    } else {
                        echo "
                            <li class='list-group-item d-flex justify-content-between favourite'>
                                <span class='list-group-item-label'>Filmlar yo'q</span>
                            </li>
                        ";
                    }
                }

                ?>

            </ul>
            <div class="addForm">
                <h3>Yangi kino qo'shish</h3>
                <form action="add.php" method="POST" class="add-form d-flex">
                    <input type="text" class="form-control new-post-label" placeholder="Qanday kino?" name="name">
                    <input type="number" class="form-control new-post-label" placeholder="Nechi marotaba ko'rilgan?" name="view">
                    <button class="btn btn-outline-dark">Qo'shish</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php

mysqli_close($connect)

?>