<?php
    class Quote {
        // Database Actions
        private $conn;
        private $table = 'quotes';


        // DID I SETUP THESE PROPERTIES CORRECTLY ????????????????????????????????????????????????????????????????????????????????    
        // Quote Properties
        public $id;
        public $quote;
        public $author_id;
        public $category_id;

        // Constructor with Database
        public function __construct($db) {
            $this->conn = $db;
        }

        // DID I SETUP THIS QUERY METHOD CORRECTLY ???????????????????????????????????????????????????????????????????????????????? 
        // Get Quote
        public function read() {
            // Create query
            $query =    'SELECT 
                            a.author as quote_author,
                            c.category as category_name,
                            q.id,
                            q.quote,
                            q.author_id,
                            q.category_id
                        FROM
                            ' . $this->table . ' q
                        INNER JOIN
                            authors a ON q.author_id = a.id
                        INNER JOIN
                            categories c ON q.category_id = c.id';

            // PDO Prepared Statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // DID I SETUP THIS QUERY METHOD CORRECTLY ????????????????????????????????????????????????????????????????????????????????
        // Get single Post
        public function read_single() {
            // Create query
            $query =    'SELECT 
                            a.author as quote_author,
                            c.category as category_name,
                            q.id,
                            q.quote,
                            q.author_id,
                            q.category_id
                        FROM
                            ' . $this->table . ' q
                        INNER JOIN
                            authors a ON q.author_id = a.id
                        INNER JOIN
                            categories c ON q.category_id = c.id
                        WHERE
                            q.id = :id
                        LIMIT 0,1';

            // PDO Prepared Statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            //$stmt->bindParam(1, $this->id);
            $stmt->bindParam(':id', $this->id);

            // Execute query
            //$stmt->execute();
            if($stmt->execute()) {
                return true;
            } 

            // Print error if problems
            printf('Error: %s.\n', $stmt->error);
            
            return false;

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // DID I SETUP THESE PROPERTIES CORRECTLY ????????????????????????????????????????????????????????????????????????????????
            // Set properties
            $this->id = $row['id'];
            $this->quote = $row['quote'];
            $this->author_id = $row['author_id'];
            $this->category_id = $row['category_id'];
        }

        // DID I SETUP THIS QUERY METHOD CORRECTLY ????????????????????????????????????????????????????????????????????????????????
        // Create Quote
        public function create() {
            // Create query
            $query =    'INSERT INTO ' . $this->table . '
                        SET
                            quote = :quote,
                            author_id = :author_id,
                            category_id = :category_id';
        
            // PDO Prepared Statement
            $stmt = $this->conn->prepare($query);

            // DID I SETUP THESE DATA CLEANING VARIABLES CORRECTLY ???????????????????????????????????????????????????????????????
            // Clean data
            $this->quote = htmlspecialchars(strip_tags($this->quote));
            $this->author_id = htmlspecialchars(strip_tags($this->author_id));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));

            // DID I SETUP THESE DATA BINDING PARAMETERS CORRECTLY ???????????????????????????????????????????????????????????????
            // Bind data
            $stmt->bindParam(':quote', $this->quote);
            $stmt->bindParam(':author_id', $this->author_id);
            $stmt->bindParam(':category_id', $this->category_id);

            // Execute query
            if($stmt->execute()) {
                return true;
            } 

            // Print error if problems
            printf('Error: %s.\n', $stmt->error);
            
            return false;
        }

        // DID I SETUP THIS QUERY METHOD CORRECTLY ????????????????????????????????????????????????????????????????????????????????
         // Update Quote
         public function update() {
            // Create query
            $query =    'UPDATE ' . $this->table . '
                        SET
                            quote = :quote,
                            author_id = :author_id,
                            category_id = :category_id
                        WHERE
                            id = :id';
        
            // PDO Prepared Statement
            $stmt = $this->conn->prepare($query);

            // DID I SETUP THESE DATA CLEANING VARIABLES CORRECTLY ???????????????????????????????????????????????????????????????
            // Clean data
            $this->quote = htmlspecialchars(strip_tags($this->quote));
            $this->author_id = htmlspecialchars(strip_tags($this->author_id));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // DID I SETUP THESE DATA BINDING PARAMETERS CORRECTLY ???????????????????????????????????????????????????????????????
            // Bind data
            $stmt->bindParam(':quote', $this->quote);
            $stmt->bindParam(':author_id', $this->author_id);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            } 

            // Print error if problems
            printf('Error: %s.\n', $stmt->error);
            
            return false;
        }

        // DID I SETUP THIS QUERY METHOD CORRECTLY ????????????????????????????????????????????????????????????????????????????????
        // Delete Post
        public function delete() {
            // Create query
            $query =    'DELETE FROM ' . $this->table . '
                        WHERE
                            id = :id';
        
            // PDO Prepared Statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind data
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            } 

            // Print error if problems
            printf('Error: %s.\n', $stmt->error);
            
            return false;
        }
    }