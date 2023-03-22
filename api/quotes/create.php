<?php
    // Instantiate quote object
    $quote = new Quote($db);

    // Get the raw quote data
    $data = json_decode(file_get_contents("php://input"));
    $quote->id = $data->id;
    $quote->quote = $data->quote;
    $quote->author_id = $data->author_id;
    $quote->category_id = $data->category_id;

    // Create author
    if($quote->create()) {
        writeMessage('Quote Created');
    } else {
        writeMessage('Quote Not Created');
    }