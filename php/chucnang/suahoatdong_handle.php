<?php
function connect()
{
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "btlphp";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        return false;
    }
    return $conn;
}
function edit()
{
    if (empty($_POST['idhd']) || empty($_GET["idhd"]) || empty($_POST['tenhd'])) {
        return false;
    }
    $conn = connect();
    if (!$conn) {
        return false;
    }

    $hd = isset($_GET["idhd"]) ? $_GET["idhd"] : '';

    $sql = "SELECT * FROM hoatdong where idhd = '$hd'";
    $resuilt = $conn->query($sql);
    $row = $resuilt->fetch_assoc();
    if ($resuilt->num_rows == 0) {
        return false;
    }

    if (isset($_POST["btn"])) {
        if ($_POST['idhd'] != $_GET["idhd"]) {
            return false;
        }
        $idhoatdong = $_POST['idhd'];
        $tenhoatdong = $_POST['tenhd'];
        $sql = "UPDATE hoatdong set tenhd = '$tenhoatdong' where idhd = '$idhoatdong'";
        $update_resuilt = $conn->query($sql);

        if ($update_resuilt === TRUE) {
            $sql = "SELECT * FROM hoatdong WHERE idhd = '$idhoatdong' and tenhd = '$tenhoatdong'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($result->num_rows > 0) {
                return true;
            }

        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
    return false;
}


?>