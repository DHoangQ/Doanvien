<?php
$servername ="localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}
$hk = $_GET['id'];
$check_sql = "SELECT id FROM dgtheonam WHERE id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param('s', $hk);
    $check_stmt->execute();
    $check_stmt->store_result();

    $sql = "DELETE FROM dgtheonam WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $hk);

    if ($stmt->execute() === TRUE) {
        header("Location: ../dgtheonam.php?hk=success");
    } else {
        header("Location: ../dgtheonam.php?hk=error");
    }
$stmt->close();
$conn->close();

?>