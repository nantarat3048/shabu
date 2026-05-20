<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $date = $_POST["date"] ?? "";
    $time = $_POST["time"] ?? "";
    $seats = $_POST["seats"] ?? "";

    if ($name && $phone && $date && $time && $seats) {
        $stmt = $conn->prepare("INSERT INTO reservations (name, phone, date, time, seats) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $phone, $date, $time, $seats);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }

        $stmt->close();
    } else {
        echo "error";
    }
}
?>
