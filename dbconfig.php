<?php

    class DATABASE {

        private $mysql;
        private $con;

        private const MYSQL_CONNECTION = "mysql:host=localhost;dbname=registration_pdo;";
        private const MYSQL_USERNAME = "root";
        private const MYSQL_PASSWORD = "nopassword";

        public function __construct()
        {
            $this->con = new PDO(
                DATABASE::MYSQL_CONNECTION,
                DATABASE::MYSQL_USERNAME,
                DATABASE::MYSQL_PASSWORD
            );
            $this->con->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $this->mysql = $this->con;
        }

        public function query($show) {
            $stmt = $this->mysql->prepare($show);
            $stmt->execute();
            if ($show) {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
        }

    }

?>