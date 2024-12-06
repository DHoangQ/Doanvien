<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

if (isset($_POST['idhd']) && isset($_POST['tenhd'])) {
    $idhoatdong = $_POST['idhd'];
    $tenhoatdong = $_POST['tenhd'];

    $check_query = "SELECT * FROM hoatdong WHERE idhd = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $idhoatdong);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        header("location: hoatdong.php?status=tontai");
    } else {
        if (empty($idhoatdong) || empty($tenhoatdong)) {
            header("location: hoatdong.php?status=error");
        } else {
            // Thêm dữ liệu mới vào cơ sở dữ liệu
            $sql = "INSERT INTO hoatdong(idhd, tenhd) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $idhoatdong, $tenhoatdong);

            if ($stmt->execute() === true) {
                header("location: hoatdong.php?status=success");
            } else {
                echo "Thêm thất bại";
            }
        }
    }

    $check_stmt->close();
    $conn->close();
}
?>