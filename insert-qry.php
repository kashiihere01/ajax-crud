<?php

include("config.php");

$name = $_POST['name'];
$email = $_POST['email'];

$qry = "INSERT INTO `users`(`name`, `email`) 
VALUES ('$name','$email')";

if (mysqli_query($db_con, $qry)) {
    echo "Data inserted successfully....!";
} else {
    echo "Data is not inserted ....!";
}
