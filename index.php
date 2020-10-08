<?php

header('Content-Type: application/json;');

require_once("dbconfig.php");

$db = new DATABASE();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM tbl_user";
    try {
        $select_stmt = $db->query($sql);
    } catch (PDOException $e) {
        $e->getMessage();
    } finally {
        echo json_encode($select_stmt);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM tbl_user WHERE row_id = {$_POST['id']}";
    try {
        $select_stmt = $db->query($sql);
    } catch (PDOException $e) {
        $e->getMessage();
    } finally {
        echo json_encode($select_stmt);
    }
} else {
    http_response_code(405);
}

?>
