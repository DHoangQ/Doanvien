<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['iddv'], $_POST['tendoanvien'], $_POST['idchidoan'], $_POST['hocki1'], $_POST['hocki2'])) {
        $id = $_POST['id'];
        $iddv = $_POST['iddv'];
        $tendoanvien = $_POST['tendoanvien'];
        $idchidoan = $_POST['idchidoan'];
        $hocki1 = $_POST['hocki1'];
        $hocki2 = $_POST['hocki2'];

        $check_query = "SELECT * FROM dgtheohk WHERE id = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $id);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            
            header("location: ../dgtheohk.php?status=tontai");
            exit();
        } else {
            if (empty($id) || empty($iddv) || empty($tendoanvien) || empty($idchidoan) || empty($hocki1) || empty($hocki2)) {
                
                header("location:../dgtheohk.php?status=error");
                exit();
            } else {
                $sql = "INSERT INTO dgtheohk(id, iddv, tendoanvien, idchidoan, hocki1, hocki2) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $id, $iddv, $tendoanvien, $idchidoan, $hocki1, $hocki2);
                
                if ($stmt->execute() === true) {
                    
                    header("location:../dgtheohk.php?status=success");
                    exit();
                } else {
                    echo "Thêm thất bại: " . $conn->error;
                }
            }
        }

        $check_stmt->close();
    }
}

$conn->close();
?>
