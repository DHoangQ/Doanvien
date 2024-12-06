<?php
$servername ="localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

$cd = isset($_GET["idchidoan"]) ? $_GET["idchidoan"] : '';
$sql ="SELECT * FROM chidoan where idchidoan = '$cd'";
$resuilt = $conn->query($sql);
$row=$resuilt->fetch_assoc();
if(isset($_POST["btn"])){
    $idchidoan = $_POST['idchidoan'];
    $tenchidoan = $_POST['tenchidoan'];
    $sql = "UPDATE chidoan set tenchidoan = '$tenchidoan' where idchidoan = '$idchidoan'";
    $update_resuilt = $conn->query($sql);

    if($update_resuilt === TRUE){
        header("location: ../chidoan.php?status=success");
        $sql = "SELECT * FROM chidoan WHERE idchidoan = '$idchidoan'";
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
        <link rel="stylesheet" href="../css/style.css">
        <title>QUẢN LÍ CHI ĐOÀN</title>
</head>
<body>
<header>
        <nav class="navbar" style="background-color: #33CCFF;">
            <div class="container" style="height: 50px; position: relative;">
              <a class="navbar-brand" href="#" style=" display: flex; position: absolute; top: 3px;">
                <i class="fa-solid fa-poo-storm" style="color: aliceblue; margin-right: 7px; margin-top: 7px; font-size: 25px;"></i>
                    <p style="font-size: 24px; font-weight: 900; color: aliceblue;">Sửa thông tin chi đoàn</p>         
              </a>
              <a class="navbar-brand" href="../main_right1.php" style="  display: flex; position: absolute; right: 5px; top: 2px;  margin-top: 10px; color: aliceblue;">
                    <p style="font-size: 14px; font-weight: bold;">Quay lại</p>  
                    <i class="fa-solid fa-right-from-bracket" style="margin-left: 7px; font-size: 25px;"></i>       
              </a>
            </div>  
          </nav>
    </header>
    
        <div class="container">
            <form method="post">
            <h3>ID chi đoàn (Không thể thay đổi)</h3>
            <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" >ID</span>
                    <input type="text" class="form-control" name="idchidoan" placeholder="ID Chi đoàn" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo isset($row["idchidoan"]) ? $row["idchidoan"] : '';?>">
            </div>
            <h3>Tên chi đoàn: </h3>
            <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping" >Name</span>
                    <input type="text" class="form-control" name="tenchidoan" placeholder="Tên Chi đoàn" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo isset($row["tenchidoan"]) ? $row["tenchidoan"] : '';?>">
            </div>
            <button id="sumnit" name="btn" class="btn btn-info" style="margin-top: 10px;">Hoàn Thành</button>
            </form>       
        </div>
   
</body>
</html>