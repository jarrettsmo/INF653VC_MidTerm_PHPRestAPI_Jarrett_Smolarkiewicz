<?php
    require 'inc.php';

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'OPTIONS':
            exit();
        case 'GET':
            if (isset($_GET['id'])) {
                include_once 'read_single.php';
            } else {
                include_once 'read.php';
            };
            break;
        case 'PUT':
            include_once 'update.php';
            break;
        case 'POST':
            include_once 'create.php';
            break;
        case 'DELETE':
            include_once 'delete.php';
            break;
        default:
            echo "Unsupported Method.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INF653 Midterm</title>
</head>
<body>
    <h1>INF 653 VC Midterm PHP OOP Rest API: Jarrett Smolarkiewicz</h1>
</body>
</html>
