<?php
$servername ="localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}
   // Lấy danh sách hoạt động từ cơ sở dữ liệu
   $sql = "SELECT * FROM dkhoatdong";
$resuilt = $conn->query($sql);


?>
<?php if ($resuilt->num_rows > 0) { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('body').addEventListener('click', function(event) {
                if (event.target.tagName.toLowerCase() === 'body') {
                    window.location.href = window.location.href.split('?')[0];
                }
            });
        });
    </script>
<?php } ?>

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
    <h2 style="margin-left:30%; margin-top:15px;">BẢNG THỐNG KÊ CÁC ĐOÀN VIÊN THAM GIA HD</h2>
    <table class="table text-center">
        <thead class="table-primary">
        <h2>Tổng số: <?php echo $resuilt->num_rows?> Đoàn viên </h2>
            <tr>
                <th scope="col">ID</th>
                
                <th scope="col">TÊN HOẠT ĐỘNG</th>
                <th scope="col">IDDV</th>
                <th scope="col">TÊN ĐOÀN VIÊN</th>
                <th scope="col">ID CHI ĐOÀN</th>
             
               
            </tr>
        </thead>
        <?php while ($row = $resuilt->fetch_assoc()){?>
        <tbody>
            <tr>
                <td><?php echo $row['id']?></td>
              
                <td><?php echo $row['tenhd']?></td>
                <td><?php echo $row['iddv']?></td>
                <td><?php echo $row['tendoanvien']?></td>
                <td><?php echo $row['idchidoan']?></td>
               
               
            </tr>
        </tbody>
        <?php }?>
    </table>
</body>
<?php include('alert2.php'); ?>
<?php include('doanvien_alert.php'); ?>
<?php include('alert_dgtheohk.php'); ?>
</html>