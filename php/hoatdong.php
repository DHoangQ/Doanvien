<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

$sql = "SELECT *FROM hoatdong";
$resuilt = $conn->query($sql);

if (isset($_POST['btn']) && !empty($_POST['search_idhd'])) {
    $idhd = $_POST['search_idhd'];
    $sql .= " WHERE idhd LIKE '%$idhd%'";
    $resuilt = $conn->query($sql);

    if ($resuilt->num_rows == 0) {
        header("location:hoatdong.php?th=error");
    }
}

if ($resuilt->num_rows > 0) { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('body').addEventListener('click', function (event) {
                if (event.target.tagName.toLowerCase() === 'body') {
                    window.location.href = window.location.href.split('?')[0];
                }
            });
        });
    </script>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>QUẢN LÍ HOẠT ĐỘNG</title>
</head>

<body>
    <header>
        <nav class="navbar" style="background-color: #33CCFF;">
            <div class="container" style="height: 50px; position: relative;">
                <a class="navbar-brand" href="#" style=" display: flex; position: absolute; top: 3px;">
                    <i class="fa-solid fa-poo-storm"
                        style="color: aliceblue; margin-right: 7px; margin-top: 7px; font-size: 25px;"></i>
                    <p style="font-size: 24px; font-weight: 900; color: aliceblue;">QUẢN LÍ HOẠT ĐỘNG</p>
                </a>
                <form method="post">
                    <input type="text" placeholder="Nhập tên hoạt động" name="search_idhd"
                        style="position:absolute; right: 400px; top:10px; width:300px; border-radius: 15px; padding: 5px; border:none; outline:none;">
                    <button class="btn btn-warning" name="btn" type="submit" name="btn"
                        style="position:absolute; right: 280px; top:9px; border-radius: 15px">Tìm kiếm</button>
                </form>
                <a class="navbar-brand" href="../index/frmtrangchu.html"
                    style="  display: flex; position: absolute; right: 5px; top: 2px;  margin-top: 10px; color: aliceblue;">
                    <p style="font-size: 14px; font-weight: bold;">Trang chủ</p>
                    <i class="fa-solid fa-right-from-bracket" style="margin-left: 7px; font-size: 25px;"></i>
                </a>
            </div>
        </nav>
    </header>

    <form action="../php/themhoatdong.php" method="post">
        <div class="input-group mb-3" style="margin-top:10px;">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1">IDHD</button>
            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                aria-describedby="button-addon1" name="idhd">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1">Tên hoạt động</button>
            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                aria-describedby="button-addon1" name="tenhd">

        </div>
        <button type="Submit" class="btn btn-primary">Thêm hoạt động</button>
        </div>
    </form>

    <table class="table text-center">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên hoạt động</th>

                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <?php while ($row = $resuilt->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <td><?php echo $row['idhd'] ?></td>
                    <td><?php echo $row['tenhd'] ?></td>

                    <td>
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-gear" style="margin-right: 3px;"></i>
                            <a style="text-decoration: none; color: white;"
                                href="../php/chucnang/suahoatdong.php?idhd=<?php echo $row["idhd"] ?>">Sửa</a></button>

                        <button class="btn btn-primary">
                            <a onclick="return confirm('Xác nhận xóa hoạt động này?');"
                                style="text-decoration: none; color: white;"
                                href="../php/chucnang/xoahoatdong.php?idhd=<?php echo $row["idhd"] ?>">Xóa</a>
                            <i class="fa-solid fa-trash" style="margin-left: 3px;"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-gear" style="margin-right: 3px;"></i>
                            <a style="text-decoration: none; color: white;"
                                href="../php/dangkihd.php?idhd=<?php echo $row["idhd"] ?>">Đăng kí</a></button>

                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</body>

</html>