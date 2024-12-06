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
    if (isset($_POST['idhd'], $_POST['tenhd'],$_POST['iddv'], $_POST['tendoanvien'], $_POST['idchidoan'])) {
        $idhd = $_POST['idhd'];
        $tenhd = $_POST['tenhd'];
        $iddv = $_POST['iddv'];
        $tendoanvien = $_POST['tendoanvien'];
        $idchidoan = $_POST['idchidoan'];
     

        $check_query = "SELECT * FROM dkhoatdong WHERE idhd = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $idhd);
        $check_stmt->execute();
        $check_stmt->store_result();

            if (empty($idhd) || empty($tenhd) ||empty($iddv) || empty($tendoanvien) || empty($idchidoan) ) {
                
                header("location:../dangkihd.php?status=error");
                exit();
            } else {
                $sql = "INSERT INTO dkhoatdong (idhd, tenhd,iddv, tendoanvien, idchidoan) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $idhd,$tenhd, $iddv, $tendoanvien, $idchidoan);
                
                if ($stmt->execute() === true) {
                    
                    header("location:../dangkihd.php?status=success");
                    exit();
                } else {
                    echo "Thêm thất bại: " . $conn->error;
                }
            }
        }

        $check_stmt->close();
    }


$conn->close();
?>