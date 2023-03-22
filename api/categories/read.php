<?php
    // Instantiate category object
    $category = new Category($db);

    // Category read query
    $result = $category->read();
    // Get row count
    $num = $result->rowCount();

    // Check if any categories
    if($num > 0) {
        // Category array
        $categories_arr = array();
        //$categories_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $category_item = array(
                'id' => $id,
                'category' => $category
            );

            // $category_item = array(
            //     'id' => $row['id'],
            //     'category' => $row['category']
            // );

            // Push to "data"
            //array_push($categories_arr['data'], $category_item);
            array_push($category_item);
        }

        // Convert from PHP array to JSON
        echo json_encode($categories_arr);

    } else {
        // No categories
        writeMessage('No Categories Found');
    }