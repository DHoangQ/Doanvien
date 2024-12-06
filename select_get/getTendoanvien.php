<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

if (isset($_GET['iddv'])) {
    $iddv = $_GET['iddv'];
    
    $query = "SELECT tendoanvien FROM dsdoanvien WHERE iddv = '$iddv'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['tendoanvien'];
    } else {
        echo "Tên đoàn viên không tồn tại";
    }
}
$conn->close();
?>
