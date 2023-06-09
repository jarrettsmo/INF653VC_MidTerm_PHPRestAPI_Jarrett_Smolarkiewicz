<?php
    // Instantiate quote object
    $quote = new Quote($db);

    // Quote query
    $result = $quote->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any quotes
    if($num > 0) {
        // Quote array
        $quotes_arr = array();
        //$quotes_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // extract($row);

            // $quote_item = array(
            //     'id' => $id,
            //     'quote' => html_entity_decode($quote),
            //     'author' => $author,
            //     'category' => $category
            // );

            $quote_item = array(
                'id' => $row['id'],
                'quote' => html_entity_decode($row['quote']),
                'author' => $row['author_id'],
                'category' => $row['category_id']
            );

            // Push to "data"
            //array_push($quotes_arr['data'], $quote_item);
            array_push($quotes_arr, $quote_item);
        }

        // Convert from PHP array to JSON
        echo json_encode($quotes_arr);

    } else {
        // No Quotes
        writeMessage('No Quotes Found');
    }
