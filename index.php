<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>เข้าสู่ระบบ | ร้านชาบู</title>
  <style>
    body {
      font-family: "Prompt", sans-serif;
      background: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc4tL0yn4s_d3RKxJSZZzH79iPpEuohLSKqQ&s") no-repeat center/cover;
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      background: white;
      padding: 30px;
      border-radius: 15px;
      width: 320px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }
    h2 { color: #b22222; }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #b22222;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover { background: #a11e1e; }
  </style>
</head>
<body onload="clearFields()">
  <div class="login-box">
    <h2>เข้าสู่ระบบ</h2>
    <input type="text" id="username" placeholder="ชื่อผู้ใช้" autocomplete="off">
    <input type="password" id="password" placeholder="รหัสผ่าน" autocomplete="off">
    <button onclick="login()">เข้าสู่ระบบ</button>
  </div>

  <script>
    function clearFields() {
      document.getElementById("username").value = "";
      document.getElementById("password").value = "";
    }

    function login() {
      const user = document.getElementById("username").value.trim();
      const pass = document.getElementById("password").value.trim();

      if (user === "" || pass === "") {
        alert("กรุณากรอกชื่อผู้ใช้และรหัสผ่าน");
        return;
      }

      // 🔴 แอดมิน
      if (user === "KING" && pass === "14042551") {
        sessionStorage.setItem("role", "admin");
        alert("เข้าสู่ระบบแอดมินสำเร็จ");
        window.location.href = "admin.php";
      } 
      // 🟢 ลูกค้า
      else {
        sessionStorage.setItem("role", "customer");
        alert("เข้าสู่ระบบลูกค้าสำเร็จ");
        window.location.href = "home.html";
      }
    }
  </script>
</body>
</html>
