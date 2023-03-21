<?php
    class Author {
        // Database
        private $conn;
        private $table = 'authors';

        // Properties
        public $id;
        public $author;

        // Constructor with Database
        public function __construct($db) {
            $this->conn = $db;
        }

        // DID I SETUP THIS QUERY METHOD CORRECTLY ???????????????????????????????????????????????????????????????
        // Get Authors
        public function read() {
            // Create query
            $query =    'SELECT 
                            id,
                            author
                        FROM
                            ' . $this->table . '
                        ORDER BY
                            author DESC';

            // PDO Prepared Statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
    }