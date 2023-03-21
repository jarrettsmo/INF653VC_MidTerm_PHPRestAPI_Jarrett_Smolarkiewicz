<?php
/**
 * Traversy Media PHP OOP REST API Tutorial
 * #1
 * PHP REST API From Scratch [1] - Database & Read
 * https://www.youtube.com/watch?v=OEWXbpUMODk 
 * 
 * #2
 * PHP REST API From Scratch [2] - Single & Create
 * https://www.youtube.com/watch?v=-nq4UbD0NT8
 * 
 * #3
 * PHP REST API From Scratch [3] - Update & Delete
 * https://www.youtube.com/watch?v=tG2U18EmIu4
 * 
 */
//$_ENV['user'] = "Bob";
//$_ENV['password'] = "Bob12345";

$path = $_SERVER['PATH_INFO'];
$id = $_REQUEST['id'];
$author_id = $_REQUEST['author_id'];
$category_id = $_REQUEST['category_id'];
//echo "path: " . substr($path, 1, (strlen($path) - 2)) . " id: " . $id;

$num_in = numMagic();
echo    "id: " . $num_in['id'] . "<br>" . 
        " author id: " . $num_in['author_id'] . "<br>" . 
        " category id: " . $num_in['category_id'];

echo "<hr>";

$type_in = typeMagic();
echo    "current type in URL: " . $type_in . "<br>" .
        "current number in URL: " . $num_in . "<br>";

echo "<hr>";

if (substr($path, 1, (strlen($path) - 2)) == 'quotes') {
    echo qFunc($type_in, $num_in);
} elseif (substr($path, 1, (strlen($path) - 2)) == 'authors') {
    echo aFunc('a', 'b');
} elseif (substr($path, 1, (strlen($path) - 2)) == 'categories') {
    echo cFunc('c', 'd');
}

function numMagic() {
    $nums = [];

    if (isset($_REQUEST['id'])) {
        // append the value to the $nums array.
        $nums['id'] = $_REQUEST['id'];
    };
    
    if (isset($_REQUEST['author_id'])) {
        // append the value to the $nums array.
        $nums['author_id'] = $_REQUEST['author_id'];
    }

    if (isset($_REQUEST['category_id'])) {
        // append the value to the $nums array.
        $nums['category_id'] = $_REQUEST['category_id'];
    }

    return $nums;
}

function typeMagic() {
    if (isset($_REQUEST['id'])) {
        return "id";
    } elseif (isset($_REQUEST['author_id'])) {
        return "author_id";
    } elseif (isset($_REQUEST['category_id'])) {
        return "category_id";
    }
}

function qFunc($type, $num) {
    return $num[$type];
    // Call to database
}

// Not sure if done yet
function aFunc($type, $num) {
    return $type . "<br>" . $num;
}

// Not done yet
function cFunc($type, $num) {
    return $type . "<br>" . $num;
}

//phpinfo(INFO_MODULES);
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
