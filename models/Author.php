<?php
    class Author {
        // Database
        private $conn;
        private $table = 'categories';

        // Properties
        public $id;
        public $name;
        public $created_at;

        // Constructor with Database
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Categories
        public function read() {
            // Create query
            $query =    'SELECT 
                            id,
                            name,
                            created_at
                        FROM
                            ' . $this->table . '
                        ORDER BY
                            created_at DESC';

            // PDO Prepared Statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
    }