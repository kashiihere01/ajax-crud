<?php
 include("config.php");

 $id = $_GET['id'];

 $sql = "DELETE FROM users WHERE id = $id";
 
 if (mysqli_query($con , $sql)) {

   echo "successfully deletes";
}

?>