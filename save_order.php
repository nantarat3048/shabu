<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["order"]) && isset($_POST["customer_name"])) {
    $customerName = $_POST["customer_name"];
    $orderData = json_decode($_POST["order"], true);

    if (is_array($orderData)) {
        foreach ($orderData as $item) {
            $menu = $item["name"] ?? "";
            $price = $item["price"] ?? 0;
            $qty = $item["qty"] ?? 1;

            if ($menu !== "") {
                $stmt = $conn->prepare(
                    "INSERT INTO orders (customer_name, menu_name, price, qty) VALUES (?, ?, ?, ?)"
                );
                $stmt->bind_param("ssii", $customerName, $menu, $price, $qty);
                $stmt->execute();
                $stmt->close();
            }
        }
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
