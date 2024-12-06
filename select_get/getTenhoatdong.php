<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

if (isset($_GET['idhd'])) {
    $idhd = $_GET['idhd'];
    
    $query = "SELECT tenhd FROM hoatdong WHERE idhd = '$idhd'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['tenhd'];
    } else {
        echo "Tên hoạt động không tồn tại";
    }
}
$conn->close();
?>