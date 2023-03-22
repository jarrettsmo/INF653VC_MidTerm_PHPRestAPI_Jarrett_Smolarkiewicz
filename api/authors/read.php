<?php
    // Instantiate author object
    $author = new Author($db);

    // Author query
    $result = $author->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any authors
    if($num > 0) {
        // Author array
        $authors_arr = array();
        $authors_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $author_item = array(
                'id' => $id,
                'author' => $author
            );

            // $author_item = array(
            //     'id' => $row['id'],
            //     'author' => $row['author']
            // );

            // Push to "data"
            array_push($authors_arr['data'], $author_item);
        }

        // Convert from PHP array to JSON
        echo json_encode($posts_arr);

    } else {
        // No Authors
        writeMessage('No Authors Found');
    }
