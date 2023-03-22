<?php
    // Instantiate quote object
    $quote = new Quote($db);

    // Get the raw quote data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to delete
    $quote->id = $data->id;

    // Delete quote
    if($quote->delete()) {
        writeMessage('Quote Deleted');
    } else {
        writeMessage('Quote Not Deleted');
    }