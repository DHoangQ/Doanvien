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
    if (isset($_POST['id'], $_POST['iddv'], $_POST['tendoanvien'], $_POST['idchidoan'], $_POST['xeploai'])) {
        $id = $_POST['id'];
        $iddv = $_POST['iddv'];
        $tendoanvien = $_POST['tendoanvien'];
        $idchidoan = $_POST['idchidoan'];
        $xeploai = $_POST['xeploai'];

        $check_query = "SELECT * FROM dgtheonam WHERE id = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $id);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            
            header("location: ../dgtheonam.php?status=tontai");
            exit();
        } else {
            if (empty($id) || empty($iddv) || empty($tendoanvien) || empty($idchidoan) || empty($xeploai)) {
                
                header("location:../dgtheonam.php?status=error");
                exit();
            } else {
                $sql = "INSERT INTO dgtheonam(id, iddv, tendoanvien, idchidoan, xeploai) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $id, $iddv, $tendoanvien, $idchidoan, $xeploai);
                
                if ($stmt->execute() === true) {
                    
                    header("location:../dgtheonam.php?status=success");
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
