<?php
    // IN THIS FILE DO I NEED TO BE CAREFUL DUE TO FOREIGN KEYS ????????????????????????????????????????????????????????????????
    // NOT SURE WHAT I DO FOR HEADERS HERE - OR IS THIS CORRECT ????????????????????????????????????????????????????????????????
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:   Access-Control-Allow-Headers,
                                            Content-Type, 
                                            Access-Control-Allow-Methods, 
                                            Authorization, 
                                            X-Requested-With'
    );

    include_once '../../config/Database.php';
    include_once '../../models/Author.php';

    // Instantiate Database and Connect
    $database = new Database();
    $db = $database->connect();

    // IS THIS VARIABLE NAME ACCEPTABLE ????????????????????????????????????????????????????????????????????????????????????????
    // Instantiate author object
    $author = new Author($db);

    // Get the raw author data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to delete
    $author->id = $data->id;

    // Delete author
    if($author->delete()) {
        echo json_encode(
            array('message' => 'Author Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Author Not Deleted')
        );
    }