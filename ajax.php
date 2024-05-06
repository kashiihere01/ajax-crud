<?php
require_once "config.php";

$q = ( isset($_GET['query']) && !empty($_GET['query'])) ? trim($_GET['query']) : null; 

$sql = "SELECT * FROM users ";

if($q !== null) {
    $sql .= " WHERE name LIKE '%".$q."%' ";
}

$result = mysqli_query($con, $sql);

$html = "<table class='table table-striped'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>ID</th>";
$html .= "<th>Name</th>";
$html .= "<th>email</th>";
$html .= "<th>password</th>";
$html .= "<th>Actions</th>";
$html .= "</tr>";
$html .= "</thead>";


$html .= "<tbody>";

while($row = mysqli_fetch_assoc($result)){
    $html .= "<tr>";
    $html .= "<td>$row[id]</td>";
    $html .= "<td>$row[name]</td>";
    $html .= "<td>$row[email]</td>";
    $html .= "<td>$row[password]</td>";
    $html .= "<td><button class='btn btn-warning btn-sm me-2 editBtn' data-id='$row[id]'>Edit</button><button class='btn btn-danger btn-sm deleteBtn' data-id='$row[id]'>Delete</button></td>";
    $html .= "</tr>";
}


$html .= "</tbody></table>";


echo $html;
exit;


