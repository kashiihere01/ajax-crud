<?php
require_once "config.php";


if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET `name`='$name', `email`='$email', `password`='$password' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "successfully updated";
    } else {
        echo "something went wrong";
    }
}
