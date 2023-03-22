<?php
    // Instantiate category object
    $category = new Category($db);

    // Get the raw category data
    $data = json_decode(file_get_contents("php://input"));
    $category->id = $data->id;
    $category->category = $data->category;

    // Create category
    if($category->create()) {
        writeMessage('Category Created');
    } else {
        writeMessage('Category Not Created');
    }