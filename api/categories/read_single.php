<?php
    // Instantiate category object
    $category = new Category($db);

    // Get ID
    $category->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get category
    $category->read_single();

    // Create array
    $category_arr = array(
        'id' => $category->id,
        'category_id' => $category->category_id
    );

    // Convert PHP array to JSON
    print_r(json_encode($category_arr));