<?php
    // IN THIS FILE DO I NEED TO BE CAREFUL DUE TO FOREIGN KEYS ????????????????????????????????????????????????????????????????
    // NOT SURE WHAT I DO FOR HEADERS HERE - OR IS THIS CORRECT ????????????????????????????????????????????????????????????????
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
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

    // IS THIS VARIABLE NAME ACCEPTABLE ????????????????????????????????????????????????????????????????????????????????????????
    // Instantiate category object
    $category = new Category($db);

    // IS THIS NEEDED ??????????????????????????????????????????????????????????????????????????????????????????????????????????
    // Get the raw category data
    $data = json_decode(file_get_contents("php://input"));

    // ARE THESE SETUP CORRECTLY ???????????????????????????????????????????????????????????????????????????????????????????????
    $category->id = $data->id;
    $category->category = $data->category;

    // IS THIS SETUP CORRECTLY ?????????????????????????????????????????????????????????????????????????????????????????????????
    // Create category
    if($category->create()) {
        echo json_encode(
            array('message' => 'Category Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Category Not Created')
        );
    }