<?php

require_once("dbconfig.php");

$db = new Database("localhost", "registration_pdo", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo json_encode($db->query("SELECT * FROM tbl_user"));
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "This is post metho.d";
} else {
    http_response_code(405);
}

?>