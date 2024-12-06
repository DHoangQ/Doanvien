<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

$sql = "SELECT * FROM dangki";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <title>THỐNG KÊ XẾP LOẠI</title>
    </head>
<body>
    <header>
        <nav class="navbar" style="background-color: #33CCFF;">
            <div class="container" style="height: 50px; position: relative;">
              <a class="navbar-brand" href="#" style=" display: flex; position: absolute; top: 3px;">
                <i class="fa-solid fa-poo-storm" style="color: aliceblue; margin-right: 7px; margin-top: 7px; font-size: 25px;"></i>
                    <p style="font-size: 24px; font-weight: 900; color: aliceblue;">THỐNG KÊ XẾP LOẠI</p>         
              </a>
              
              <a class="navbar-brand" href="../index/frmtrangchu.html" style="  display: flex; position: absolute; right: 5px; top: 2px;  margin-top: 10px; color: aliceblue;">
                    <p style="font-size: 14px; font-weight: bold;">Trang chủ</p>  
                    <i class="fa-solid fa-right-from-bracket" style="margin-left: 7px; font-size: 25px;"></i>       
              </a>
            </div>  
          </nav>
    </header>
    <table class="table text-center">
        <thead class="table-primary">
            <tr>
                <th scope="col">Tài khoản</th>
                <th scope="col">Mật khẩu</th>
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <td><?php echo $row['TAIKHOAN']; ?></td>
                    <td><?php echo $row['MATKHAU']; ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</body>
</html>