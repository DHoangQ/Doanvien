<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}
$sql = "SELECT *FROM dgtheohk";
$resuilt = $conn->query($sql);

if (isset($_POST['btn']) && !empty($_POST['search_iddv'])) {
    $iddv = $_POST['search_iddv'];
    $sql .= " WHERE iddv LIKE '%$iddv%'";
    $resuilt = $conn->query($sql);

    if($resuilt->num_rows == 0){
        header("location:dsdoanvien.php?th=error");
    }
}
?>
<?php if ($resuilt->num_rows > 0) { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('body').addEventListener('click', function(event) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../index/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <title>Danh sách đoàn viên</title>
</head>
<body>
    <header>
        <nav class="navbar" style="background-color: #33CCFF;">
            <div class="container" style="height: 50px; position: relative;">
                <a class="navbar-brand" href="#" style=" display: flex; position: absolute; top: 3px;">
                    <i class="fa-solid fa-poo-storm" style="color: aliceblue; margin-right: 7px; margin-top: 7px; font-size: 25px;"></i>
                    <p style="font-size: 24px; font-weight: 900; color: aliceblue;">Đánh giá theo học kì</p>
                </a>
                <form method="post">
                    <input type="text" placeholder="Nhập id đoàn viên" name="search_iddv" style="position:absolute; right: 400px; top:10px; width:300px; border-radius: 15px; padding: 5px; border:none; outline:none;">
                    <button class="btn btn-warning" name="btn" type="submit" name="btn" style="position:absolute; right: 280px; top:9px; border-radius: 15px">Tìm kiếm</button>
                </form>
                <a class="navbar-brand" href="../index/frmtrangchu.html" style="  display: flex; position: absolute; right: 5px; top: 2px;  margin-top: 10px; color: aliceblue;">
                    <p style="font-size: 14px; font-weight: bold;">Trang chủ</p>
                    <i class="fa-solid fa-right-from-bracket" style="position:absolute; right:-34px; top:2px; font-size: 18px;"></i>
                </a>
            </div>
        </nav>
    </header>

    <form action="../php/chucnang/them_dgtheohk.php" method="post">
        <div class="input-group mb-3" style="margin-top:10px;">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1">ID</button>
            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="id">
            
            <select name="iddv" id="iddv" class="form-select form-select-sm" aria-label="Small select example">
                <option selected>ID ĐOÀN VIÊN</option>
                <?php
                $chidoan_query = "SELECT iddv FROM dsdoanvien";
                $chidoan_result = $conn->query($chidoan_query);

                if ($chidoan_result->num_rows > 0) {
                    while ($row = $chidoan_result->fetch_assoc()) {
                        echo "<option value='" . $row['iddv'] . "'>" . $row['iddv'] . "</option>";
                    }
                }
                ?>

                
            </select>
            <select name="tendoanvien" id="tendoanvien" class="form-select form-select-sm" aria-label="Small select example">
                <option selected>TÊN ĐOÀN VIÊN</option>
            </select>
            <select name="idchidoan" id="idchidoan" class="form-select form-select-sm" aria-label="Small select example">
                <option selected>ID CHI ĐOÀN</option>
            </select>
        </div>
        <div class="input-group mb-3" style="margin-top:10px;">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1">Điểm rèn luyện học kì I</button>
            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="hocki1">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1">Điểm rèn luyện học kì II</button>
            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="hocki2">
        </div>
        <button type="Submit" class="btn btn-primary">Đánh giá</button>
    </form>

    <h2>Tổng số: <?php echo $resuilt->num_rows?> Đoàn viên </h2>
    <table class="table text-center">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ID ĐOÀN VIÊN</th>
                <th scope="col">TÊN ĐOÀN VIÊN</th>
                <th scope="col">ID CHI ĐOÀN</th>
                <th scope="col">HỌC KÌ I</th>
                <th scope="col">HỌC KÌ II</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <?php while ($row = $resuilt->fetch_assoc()){?>
        <tbody>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['iddv']?></td>
                <td><?php echo $row['tendoanvien']?></td>
                <td><?php echo $row['idchidoan']?></td>
                <td><?php echo $row['hocki1']?></td>
                <td><?php echo $row['hocki2']?></td>
                <td>
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-gear" style="margin-right: 3px;"></i>
                        <a style="text-decoration: none; color: white;" href="../php/chucnang/sua_dgtheohk.php?id=<?php echo $row["id"]?>">Sửa</a>
                    </button>
                    <span>|</span>
                    <button class="btn btn-primary">
                        <a onclick="return confirm('Xác nhận xóa đoàn viên này?');" style="text-decoration: none; color: white;" href="../php/chucnang/xoa_dgtheohk.php?id=<?php echo $row["id"]?>">Xóa</a>
                        <i class="fa-solid fa-trash" style="margin-left: 3px;"></i>
                    </button>
                </td>
            </tr>
        </tbody>
        <?php }?>
    </table>



    <script>
        $(document).ready(function () {
            $("#iddv").change(function () {
                var selectedId = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "../select_get/getTendoanvien.php", 
                    data: { iddv: selectedId },
                    success: function (response) {
                        $("#tendoanvien").empty().append("<option selected>" + response + "</option>");
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
    });
    </script>
    <script>
    $(document).ready(function () {
        $("#iddv").change(function () {
            var selectedId = $(this).val();
            $.ajax({
                type: "GET",
                url: "../select_get/getChidoan.php", 
                data: { iddv: selectedId },
                success: function (response) {
                    $("#idchidoan").empty().append(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>

</body>

<?php include('alert2.php'); ?>
<?php include('doanvien_alert.php'); ?>
<?php include('alert_dgtheohk.php'); ?>
</html>