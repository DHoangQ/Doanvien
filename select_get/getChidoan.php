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
    
    $query = "SELECT idchidoan FROM dsdoanvien WHERE iddv = '$iddv'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $options = "";
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='" . $row['idchidoan'] . "'>" . $row['idchidoan'] . "</option>";
        }
        echo $options;
    } else {
        echo "ID chi đoàn không tồn tại";
    }
}
$conn->close();
?>
