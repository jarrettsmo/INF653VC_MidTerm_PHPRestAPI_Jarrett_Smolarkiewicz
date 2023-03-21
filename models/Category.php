<?php
    class Category {
        // Database
        private $conn;
        private $table = 'categories';

        // Properties
        public $id;
        public $category;

        // Constructor with Database
        public function __construct($db) {
            $this->conn = $db;
        }

        // DID I SETUP THIS QUERY METHOD CORRECTLY ???????????????????????????????????????????????????????????????
        // Get Categories
        public function read() {
            // Create query
            $query =    'SELECT 
                            id,
                            category
                        FROM
                            ' . $this->table . '
                        ORDER BY
                            category DESC';

            // PDO Prepared Statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
    }