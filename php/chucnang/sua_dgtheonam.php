<?php
$servername ="localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

$nam = isset($_GET["id"]) ? $_GET["id"] : '';
$sql ="SELECT * FROM dgtheonam where id = '$nam'";
$resuilt = $conn->query($sql);
$row=$resuilt->fetch_assoc();
if(isset($_POST["btn"])){
    $id = $_POST['id'];
    $iddv = $_POST['iddv'];
    $tendoanvien = $_POST['tendoanvien'];
    $idchidoan = $_POST['idchidoan'];
    $xeploai = $_POST['xeploai'];
    $sql = "UPDATE dgtheonam set xeploai = '$xeploai' where id= '$id'";
    $update_resuilt = $conn->query($sql);

    if($update_resuilt === TRUE){
        header("location: ../dgtheonam.php?status=success");
        $sql = "SELECT * FROM dgtheonam WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../index/style.css">
        <title>Sửa đánh giá theo học năm</title>
</head>
<body>
<header>
        <nav class="navbar" style="background-color: #33CCFF;">
            <div class="container" style="height: 50px; position: relative;">
              <a class="navbar-brand" href="#" style=" display: flex; position: absolute; top: 3px;">
                <i class="fa-solid fa-poo-storm" style="color: aliceblue; margin-right: 7px; margin-top: 7px; font-size: 25px;"></i>
                    <p style="font-size: 24px; font-weight: 900; color: aliceblue;">Xét lại học lực</p>         
              </a>
              <a class="navbar-brand" href="../dgtheohk.php" style="  display: flex; position: absolute; right: 5px; top: 2px;  margin-top: 10px; color: aliceblue;">
                    <p style="font-size: 14px; font-weight: bold;">Quay lại</p>  
                    <i class="fa-solid fa-right-from-bracket" style="margin-left: 7px; font-size: 25px;"></i>       
              </a>
            </div>  
          </nav>
    </header>
    
        <div class="container">
            <form method="post">
            <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" >ID (không thể thay đổi)</span>
                    <input type="text" class="form-control" name="id" placeholder="ID" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo isset($row["id"]) ? $row["id"] : '';?>">
            </div>
            <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" >ID ĐOÀN VIÊN (không thể thay đổi)</span>
                    <input type="text" class="form-control" name="iddv" placeholder="ID đoàn viên" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo isset($row["iddv"]) ? $row["iddv"] : '';?>">
            </div>
            <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" >TÊN ĐOÀN VIÊN (không thể thay đổi)</span>
                    <input type="text" class="form-control" name="tendoanvien" placeholder="Tên đoàn viên" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo isset($row["tendoanvien"]) ? $row["tendoanvien"] : '';?>">
            </div>
            <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" >ID CHI ĐOÀN (không thể thay đổi)</span>
                    <input type="text" class="form-control" name="idchidoan" placeholder="ID chi đoàn" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo isset($row["idchidoan"]) ? $row["idchidoan"] : '';?>">
            </div>
            <select name="xeploai" id="iddv" class="form-select form-select-sm" aria-label="Small select example">
                <option selected>XẾP LOẠI</option>
                <option value="Giỏi">Giỏi</option>
                <option value="Khá">Khá</option>
                <option value="Trung bình">Trung Bình</option>
          </select>
            
            <button id="sumnit" name="btn" class="btn btn-info" style="margin-top: 10px;">Hoàn Thành</button>
            </form>       
        </div>
   
</body>
</html>