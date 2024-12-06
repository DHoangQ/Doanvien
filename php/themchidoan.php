<?php
$servername ="localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

if(isset($_POST['idchidoan']) && isset($_POST['tenchidoan'])){
    $idchidoan = $_POST['idchidoan'];
    $tenchidoan = $_POST['tenchidoan'];

    $check_query = "SELECT * FROM chidoan WHERE idchidoan = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $idchidoan);
    $check_stmt->execute();
    $check_stmt->store_result();

    if($check_stmt->num_rows > 0) {
        header("location: chidoan.php?status=tontai");
    } else {
        if(empty($idchidoan) || empty($tenchidoan)) {
            header("location: chidoan.php?status=error");
        } else {
            // Thêm dữ liệu mới vào cơ sở dữ liệu
            $sql = "INSERT INTO chidoan(idchidoan, tenchidoan) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $idchidoan, $tenchidoan);

            if($stmt->execute() === true){
                header("location: chidoan.php?status=success");
            } else {
                echo "Thêm thất bại";
            }
        }
    }
    
    $check_stmt->close();
    $conn->close();
}
?>
