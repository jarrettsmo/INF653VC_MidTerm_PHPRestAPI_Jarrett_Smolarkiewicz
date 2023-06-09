<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin, Accept, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'config/Database.php';
    include_once 'models/Author.php';
    include_once 'models/Category.php';
    include_once 'models/Quote.php';

    // Instantiate Database and Connect
    $database = new Database();
    $db = $database->connect();

    function writeMessage ($msg) {
        echo json_encode(
            array('message' => $msg)
        );
    }

    // $path = $_SERVER['REQUEST_URI'];
    // $id = $_REQUEST['id'];
    // $author_id = $_REQUEST['author_id'];
    // $category_id = $_REQUEST['category_id'];
    //echo "path: " . substr($path, 1, (strlen($path) - 2)) . " id: " . $id;

    // $num_in = numMagic();
    // echo    "id: " . $num_in['id'] . "<br>" . 
    //         " author id: " . $num_in['author_id'] . "<br>" . 
    //         " category id: " . $num_in['category_id'];

    // echo "<hr>";

    // $type_in = typeMagic();
    // echo    "current type in URL: " . $type_in . "<br>" .
    //         "current number in URL: " . $num_in . "<br>";

    // echo "<hr>";

    // if (str_starts_with($path, '/api/quotes')) {
    //     echo qFunc($type_in, $num_in);
    // } elseif (str_starts_with($path, '/api/authors')) {
    //     echo aFunc('a', 'b');
    // } elseif (str_starts_with($path, '/api/categories')) {
    //     echo cFunc('c', 'd');
    // }

    // function numMagic() {
    //     $nums = [];

    //     if (isset($_REQUEST['id'])) {
    //         // append the value to the $nums array.
    //         $nums['id'] = $_REQUEST['id'];
    //     };
        
    //     if (isset($_REQUEST['author_id'])) {
    //         // append the value to the $nums array.
    //         $nums['author_id'] = $_REQUEST['author_id'];
    //     }

    //     if (isset($_REQUEST['category_id'])) {
    //         // append the value to the $nums array.
    //         $nums['category_id'] = $_REQUEST['category_id'];
    //     }

    //     return $nums;
    // }

    // function typeMagic() {
    //     if (isset($_REQUEST['id'])) {
    //         return "id";
    //     } elseif (isset($_REQUEST['author_id'])) {
    //         return "author_id";
    //     } elseif (isset($_REQUEST['category_id'])) {
    //         return "category_id";
    //     }
    // }

    // function qFunc($type, $num) {
    //     return $num[$type];
    //     // Call to database
    // }

    // // Not sure if done yet
    // function aFunc($type, $num) {
    //     return $type . "<br>" . $num;
    // }

    // // Not done yet
    // function cFunc($type, $num) {
    //     return $type . "<br>" . $num;
    // }