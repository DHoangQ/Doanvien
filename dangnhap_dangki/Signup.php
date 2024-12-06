<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "btlphp";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ các trường input
    $Uname = $_POST['Uname'];
    $Pass = $_POST['Pass'];
    $Email = $_POST['Email'];
    $sdt = $_POST['sdt'];

    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
    $check_query = "SELECT TAIKHOAN FROM dangki WHERE TAIKHOAN = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $Email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "Email đã tồn tại trong cơ sở dữ liệu.";
    } else {
        // Chuẩn bị truy vấn SQL để chèn dữ liệu vào bảng
        $sql = $conn->prepare("INSERT INTO dangki (TAIKHOAN, MATKHAU, EMAIL, SDT) VALUES (?, ?, ?, ?)");
        $sql->bind_param("sssi", $Uname, $Pass, $Email, $sdt);

        // Thực thi truy vấn
        if ($sql->execute()) {
            echo "Đăng ký thành công.";
        } else {
            echo "Lỗi: " . $sql->error;
        }

        $sql->close();
    }

    $check_stmt->close();
    $conn->close();
?>
