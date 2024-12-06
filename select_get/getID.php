<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT iddv FROM dgtheohk WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['iddv'];
    } else {
        echo "ID không tồn tại";
    }
}
$conn->close();
?>
