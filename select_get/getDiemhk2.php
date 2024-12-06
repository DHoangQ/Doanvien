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
    
    $query = "SELECT  hocki2 FROM dgtheohk WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $options = "";
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='" . $row['hocki2'] . "'>" . $row['hocki2'] . "</option>";
           
        }
        echo $options;
    } else {
        echo "Không có đoàn viên này";
    }
}
$conn->close();
?>
