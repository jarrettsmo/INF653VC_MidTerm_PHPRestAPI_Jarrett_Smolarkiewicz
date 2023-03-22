<?php
    // Instantiate category object
    $category = new Category($db);

    // Get the raw category data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to update
    $category->id = $data->id;
    $category->category = $data->category;

    // Update category
    if($category->update()) {
        writeMessage('Category Updated');
    } else {
        writeMessage('Category Not Updated');
    }