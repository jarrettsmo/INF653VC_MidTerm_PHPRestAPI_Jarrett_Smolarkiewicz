<?php
    // IN THIS FILE DO I NEED TO BE CAREFUL DUE TO FOREIGN KEYS ????????????????????????????????????????????????????????????????
    // NOT SURE WHAT I DO FOR HEADERS HERE - OR IS THIS CORRECT ????????????????????????????????????????????????????????????????
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers:   Access-Control-Allow-Headers,
                                            Content-Type, 
                                            Access-Control-Allow-Methods, 
                                            Authorization, 
                                            X-Requested-With'
    );

    include_once '../../config/Database.php';
    // WHICH OF THESE ARE NEEDED ???????????????????????????????????????????????????????????????????????????????????????????????
    include_once '../../models/Author.php';
    include_once '../../models/Categories.php';
    include_once '../../models/Quote.php';

    // Instantiate Database and Connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate author object
    $author = new Author($db);

    // IS THIS CORRECT FOR THE APPROACH I'M TAKING TO UPDATE ??????????????????????????????????????????????????????????????????
    // Get the raw author data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to update
    $author->id = $data->id;

    // THIS IS ALL I NEED TO UPDATE IN THIS TABLE CORRECT ?????????????????????????????????????????????????????????????????????
    $author->author = $data->author;

    // Update author
    if($author->update()) {
        echo json_encode(
            array('message' => 'Author Updated')
        );
    } else {
        echo json_encode(
            array('message' => 'Author Not Updated')
        );
    }