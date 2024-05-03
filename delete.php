<?php
 include("config.php");

 $id = $_GET['id'];

 $sql = "DELETE FROM students WHERE id = $id";
 $result = mysqli_query($con , $sql);
 if ($result) {
   echo "Data deleted successfully....!";
} else {
   echo "Data is not Not deleted ....!";
}

?>