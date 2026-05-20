<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>แอดมิน | ร้านชาบู</title>
  <style>
    body {
      font-family: "Prompt", sans-serif;
      background-color: #fff5f5;
      margin: 0;
    }
    header {
      background-color: #b22222;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 26px;
      position: relative;
    }
    .logout-btn {
      position: absolute;
      right: 20px;
      top: 20px;
      background: white;
      color: #b22222;
      border: none;
      padding: 8px 14px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }
    .logout-btn:hover { background: #f5f5f5; }

    main {
      max-width: 1000px;
      margin: 40px auto;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
    th {
      background-color: #ffe5e5;
    }
  </style>
</head>
<body onload="checkAdmin()">

<header>
  🛠️ ระบบจัดการแอดมิน
  <button class="logout-btn" onclick="logout()">🚪 ออกจากระบบ</button>
</header>

<main>
  <h2>ยินดีต้อนรับแอดมิน</h2>
  <p>จัดการข้อมูลการสั่งอาหารและการจองโต๊ะ</p>

  <h3>📦 รายการออเดอร์</h3>
  <table>
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อผู้สั่ง</th>
        <th>รายการ</th>
        <th>ราคา</th>
        <th>จำนวน</th>
        <th>วันที่</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $orderResult = $conn->query("SELECT * FROM orders ORDER BY id DESC");
      if ($orderResult && $orderResult->num_rows > 0) {
        $i = 1;
        while ($row = $orderResult->fetch_assoc()) {
          echo "<tr>
                  <td>{$i}</td>
                  <td>{$row['customer_name']}</td>
                  <td>{$row['menu_name']}</td>
                  <td>{$row['price']} บาท</td>
                  <td>{$row['qty']}</td>
                  <td>{$row['created_at']}</td>
                </tr>";
          $i++;
        }
      } else {
        echo "<tr><td colspan='6'>ยังไม่มีข้อมูลออเดอร์</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <h3 style="margin-top:30px;">📅 รายการจองโต๊ะ</h3>
  <table>
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อ</th>
        <th>เบอร์</th>
        <th>วันที่</th>
        <th>เวลา</th>
        <th>จำนวนที่นั่ง</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $resResult = $conn->query("SELECT * FROM reservations ORDER BY id DESC");
      if ($resResult && $resResult->num_rows > 0) {
        $i = 1;
        while ($row = $resResult->fetch_assoc()) {
          echo "<tr>
                  <td>{$i}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['date']}</td>
                  <td>{$row['time']}</td>
                  <td>{$row['seats']}</td>
                </tr>";
          $i++;
        }
      } else {
        echo "<tr><td colspan='6'>ยังไม่มีข้อมูลการจอง</td></tr>";
      }
      ?>
    </tbody>
  </table>
</main>

<script>
  function checkAdmin() {
    const role = sessionStorage.getItem("role");
    if (role !== "admin") {
      alert("คุณไม่มีสิทธิ์เข้าหน้านี้");
      window.location.href = "index.php";
    }
  }

  function logout() {
    sessionStorage.removeItem("role");
    window.location.href = "index.php";
  }
</script>

</body>
</html>
