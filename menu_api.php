<?php
include "connect.php";

$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);

$menu = [];
while ($row = mysqli_fetch_assoc($result)) {
    $menu[] = $row;
}

echo json_encode($menu);
?>
