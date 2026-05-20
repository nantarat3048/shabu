<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "shabu1_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}
?>
