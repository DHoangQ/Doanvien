<?php
// process.php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

// Xử lý form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['iddv'], $_POST['tendoanvien'], $_POST['namsinh'], $_POST['gioitinh'], $_POST['sdt'], $_POST['diachi'], $_POST['idchidoan'])
    ) {
        $iddv = $_POST['iddv'];
        $tendoanvien = $_POST['tendoanvien'];
        $namsinh = $_POST['namsinh'];
        $gioitinh = $_POST['gioitinh'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $idchidoan = $_POST['idchidoan'];

        $check_query = "SELECT * FROM dsdoanvien WHERE iddv = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $iddv);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            header("location: ../dsdoanvien.php?status=tontai");
            exit();
        } else {
            if (
                empty($iddv) || empty($tendoanvien) || empty($namsinh) || empty($gioitinh) || empty($sdt) || empty($diachi) || empty($idchidoan)
            ) {
                header("location: ../dsdoanvien.php?status=error");
                exit();
            } else {
                $sql = "INSERT INTO dsdoanvien(iddv, tendoanvien, namsinh, gioitinh, sdt, diachi, idchidoan) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssss", $iddv, $tendoanvien, $namsinh, $gioitinh, $sdt, $diachi, $idchidoan);

                if ($stmt->execute() === true) {
                    header("location: ../dsdoanvien.php?status=success");
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
