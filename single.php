<?php
require_once "config.php";


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
    $result = mysqli_query($con, $sql);
    $record = mysqli_fetch_assoc($result);

    echo json_encode($record);
    exit;
}
