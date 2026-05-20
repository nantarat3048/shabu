<?php
include "connect.php";

$result = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");

echo "<h2>รายการสั่งอาหาร</h2>";
echo "<table border='1' cellpadding='10'>
<tr>
  <th>ID</th>
  <th>ชื่อเมนู</th>
  <th>ราคา</th>
  <th>จำนวน</th>
  <th>วันที่</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['menu_name']}</td>
      <td>{$row['price']}</td>
      <td>{$row['qty']}</td>
      <td>{$row['created_at']}</td>
    </tr>";
}

echo "</table>";
?>
