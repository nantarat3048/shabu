<?php
include "connect.php";

$result = mysqli_query($conn, "SELECT * FROM reservations ORDER BY id DESC");

echo "<h2>รายการจองโต๊ะ</h2>";
echo "<table border='1' cellpadding='10'>
<tr>
  <th>ID</th>
  <th>ชื่อ</th>
  <th>เบอร์โทร</th>
  <th>วันที่</th>
  <th>เวลา</th>
  <th>จำนวนที่นั่ง</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['name']}</td>
      <td>{$row['phone']}</td>
      <td>{$row['date']}</td>
      <td>{$row['time']}</td>
      <td>{$row['seats']}</td>
    </tr>";
}

echo "</table>";
?>
