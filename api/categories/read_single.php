<?php
    // IN THIS FILE DO I NEED TO BE CAREFUL DUE TO FOREIGN KEYS ????????????????????????????????????????????????????????????????
    // NOT SURE WHAT I DO FOR HEADERS HERE - OR IS THIS CORRECT ????????????????????????????????????????????????????????????????
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    // WHICH OF THESE ARE NEEDED ???????????????????????????????????????????????????????????????????????????????????????????????
    include_once '../../models/Author.php';
    include_once '../../models/Categories.php';
    include_once '../../models/Quote.php';

    // Instantiate Database and Connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate category object
    $category = new Category($db);

    // Get ID
    $category->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get category
    $category->read_single();

    // Create array
    $category_arr = array(
        'id' => $category->id,
        'category_id' => $category->category_id
    );

    // Convert PHP array to JSON
    print_r(json_encode($category_arr));