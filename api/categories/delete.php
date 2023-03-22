<?php
    // Instantiate category object
    $category = new Category($db);

    // Get the raw category data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to delete
    $category->id = $data->id;

    // Delete category
    if($category->delete()) {
        writeMessage('Author Deleted');
    } else {
        writeMessage('Author Not Deleted');
    }