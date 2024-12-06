<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

$cd = $_GET['idhd'];

$sql_check = "SELECT COUNT(*) as count FROM hoatdong WHERE idhd = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param('s', $cd);
$stmt_check->execute();
$stmt_check->bind_result($count);
$stmt_check->fetch();
$stmt_check->close();


$sql_delete = "DELETE FROM hoatdong WHERE idhd = ?";
$stmt_delete = $conn->prepare($sql_delete);
$stmt_delete->bind_param('s', $cd);

if ($stmt_delete->execute() === TRUE) {
    header("location:../hoatdong.php?status=success");
} else {
    header("location:../main_right1.php?status=error");
}

$stmt_delete->close();
$conn->close();
?>
