<?php

include  ("config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$qry = "INSERT INTO `users`(`name`, `email`, `password`) 
VALUES ('$name','$email','$password')";

if (mysqli_query($con, $qry)) {
    echo "Data inserted successfully....!";
} else {
    echo "Data is not inserted ....!";
}
