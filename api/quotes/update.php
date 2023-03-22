<?php
    // Instantiate quote object
    $quote = new Quote($db);

    // Get the raw quote data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to update
    $quote->id = $data->id;
    $quote->quote = $data->quote;
    $quote->author_id = $data->author_id;
    $quote->category_id = $data->category_id;

    // Update quote
    if($quote->update()) {
        writeMessage('Quote Updated');
    } else {
        writeMessage('Quote Not Updated');
    }