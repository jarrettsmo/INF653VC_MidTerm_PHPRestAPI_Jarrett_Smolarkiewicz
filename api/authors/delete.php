<?php
    // Instantiate author object
    $author = new Author($db);

    // Get the raw author data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to delete
    $author->id = $data->id;

    // Delete author
    if($author->delete()) {
        writeMessage('Author Deleted');
    } else {
        writeMessage('Author Not Deleted');
    }