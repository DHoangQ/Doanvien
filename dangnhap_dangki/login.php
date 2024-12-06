<?php
    ini_set('display_errors', 1);
    $servername ="localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "btlphp";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Ket noi khong thanh cong". $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $pass = $_POST['Pass'];
        $role=$_POST['role'];
    
        $sql = "SELECT * FROM dangki WHERE TAIKHOAN = '$email'";
        $result = $conn->query($sql);

    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $matkhau = $row["MATKHAU"];
    
            if ($matkhau == $pass) {
                echo "Đăng nhập thành công";
                header("Location: ../index/frmtrangchu.html");
                exit(); 
            } else {
                echo "Mật khẩu không chính xác";
            }
        } else {
            echo "Tài khoản không tồn tại";
        }

    }

    $conn->close();
    
?>
<?php include('alert2.php'); ?>