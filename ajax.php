<?php
require_once "./db.php";

$sql = "SELECT * FROM items";
$result = mysqli_query($con, $sql);

$html = "<table class='table table-striped'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>ID</th>";
$html .= "<th>Name</th>";
$html .= "<th>Description</th>";
$html .= "<th>Price</th>";
$html .= "<th>Actions</th>";
$html .= "</tr>";
$html .= "</thead>";


$html .= "<tbody>";

while($row = mysqli_fetch_assoc($result)){
    $html .= "<tr>";
    $html .= "<td>$row[id]</td>";
    $html .= "<td>$row[name]</td>";
    $html .= "<td>$row[description]</td>";
    $html .= "<td>$row[price]</td>";
    $html .= "<td><button class='btn btn-warning btn-sm me-2 editBtn' data-id='$row[id]'>Edit</button><button class='btn btn-danger btn-sm'>Delete</button></td>";
    $html .= "</tr>";
}


$html .= "</tbody></table>";


echo $html;
exit;


