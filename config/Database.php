<?php
    // Database class
    class Database {
        // Database Parameters
        private $conn;

        // Database Connection
        public function connect() {
            $this->conn = null;
            // Environment Variables
            $host = isset($_ENV['INF653_HOST']) ? $_ENV['INF653_HOST'] : '';
            $db_name = isset($_ENV['INF653_DB']) ? $_ENV['INF653_DB'] : '';
            $username = isset($_ENV['INF653_USER']) ? $_ENV['INF653_USER'] : '';
            $password = isset($_ENV['INF653_PW']) ? $_ENV['INF653_PW'] : '';

            try {
                $this->conn = new PDO('psql:host=' . $host . ';dbname=' . $db_name, $username, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }

            return $this->conn;
        }
    }