<?php
    // Instantiate author object
    $author = new Author($db);

    // Get the raw author data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to update
    $author->id = $data->id;
    $author->author = $data->author;

    // Update author
    if($author->update()) {
        writeMessage('Author Updated');
    } else {
        writeMessage('Author Not Updated');
    }