<?php
    ini_set('display_errors', 1);
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "btlphp";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối không thành công" . $conn->connect_error);
    }

    $dv = $_GET['iddv'];

    $check_sql = "SELECT iddv FROM dgtheohk WHERE iddv = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param('s', $dv);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        header("Location: ../dsdoanvien.php?hk=error");
        exit();
    }

    $sql
 = "DELETE FROM dsdoanvien WHERE iddv = ?";    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $dv);

    if ($stmt->execute() === TRUE) {
        header("Location: ../dsdoanvien.php?hk=success");
    } else {
        header("Location: ../dsdoanvien.php?hk=error");
    }

    $stmt->close();
    $conn->close();
?>
