<?php
    // Instantiate author object
    $author = new Author($db);

    // Get the raw author data
    $data = json_decode(file_get_contents("php://input"));
    $author->id = $data->id;
    $author->author = $data->author;

    // Create author
    if($author->create()) {
        writeMessage('Author Created');
    } else {
        writeMessage('Author Not Created');
    }