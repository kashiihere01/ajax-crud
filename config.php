<?php

// database connection
$con = mysqli_connect("localhost", "root", "", "ajax-crud");
if (!$con) {
    die("database not connected");
}
