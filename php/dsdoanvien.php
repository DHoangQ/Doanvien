<?php
$servername ="localhost:3306";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}
$sql = "SELECT *FROM dsdoanvien";
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
        // hiệu ứng ấn màn hình thì sẽ hiển thị ra danh sách
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
        <link rel="stylesheet" href="../css/style.css">
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
                    <p style="font-size: 24px; font-weight: 900; color: aliceblue;">Danh sách đoàn viên</p>         
              </a>
              <form method="post">
              <input type="text" placeholder="Nhập id đoàn viên" name="search_iddv" style="position:absolute; right: 400px; top:10px; width:300px; border-radius: 15px; padding: 5px; border:none; outline:none;">
              <button class="btn btn-warning" name="btn" type="submit" name="btn" style="position:absolute; right: 280px; top:9px; border-radius: 15px">Tìm kiếm</button>
              </form>
              <a class="navbar-brand" href="../index/frmtrangchu.html" style="  display: flex; position: absolute; right: 5px; top: 2px;  margin-top: 10px; color: aliceblue;">
                    <p style="font-size: 14px; font-weight: bold;">Trang chủ</p>  
                    <i class="fa-solid fa-right-from-bracket" style="margin-left: 7px; font-size: 25px;"></i>       
              </a>
            </div>  
          </nav>
    </header>

    <form action="../php/chucnang/themdv.php" method="post">
        <div class="input-group mb-3" style="margin-top:10px;">
          <button class="btn btn-outline-secondary" type="button" id="button-addon1">IDDV</button>
          <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="iddv">
          <button class="btn btn-outline-secondary" type="button" id="button-addon1">Họ tên đoàn viên</button>
          <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="tendoanvien">
          <button class="btn btn-outline-secondary" type="button" id="button-addon1">Năm sinh</button>
          <input type="date" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="namsinh">
          <button class="btn btn-outline-secondary" type="button" id="button-addon1">Giới tính</button>
          <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="gioitinh">  
        </div>
        <div class="input-group mb-3" style="margin-top:10px;">  
          <button class="btn btn-outline-secondary" type="button" id="button-addon1">Số điện thoại</button>
          <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="sdt">
          <button class="btn btn-outline-secondary" type="button" id="button-addon1">Địa chỉ</button>
          <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="diachi">
         
       </div>
            <select name="idchidoan" class="form-select form-select-sm" aria-label="Small select example">
              <option selected>ID Chi đoàn</option>
            <?php
              $chidoan_query = "SELECT idchidoan FROM chidoan";
              $chidoan_result = $conn->query($chidoan_query);

              if ($chidoan_result->num_rows > 0) {
                  while ($row = $chidoan_result->fetch_assoc()) {
                      echo "<option value='" . $row['idchidoan'] . "'>" . $row['idchidoan'] . "</option>";
                  }
              }
            ?>
            </select><br>

    </form>
         <button type="Submit" class="btn btn-primary">Thêm đoàn viên</button>
    <h2>Tổng số: <?php echo $resuilt->num_rows ?> đoàn viên</h2>
    <table class="table text-center">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID Đoàn Viên</th>
                <th scope="col">Tên đoàn viên</th>
                <th scope="col">Năm sinh</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">ID chi đoàn</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <?php while ($row = $resuilt->fetch_assoc()){?>
        <tbody>
            <tr>
                <td><?php echo $row['iddv']?></td>
                <td><?php echo $row['tendoanvien']?></td>
                <td><?php echo $row['namsinh']?></td>
                <td><?php echo $row['gioitinh']?></td>
                <td><?php echo $row['sdt']?></td>
                <td><?php echo $row['diachi']?></td>
                <td><?php echo $row['idchidoan']?></td>
                <td>
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-gear" style="margin-right: 3px;"></i>
                        <a style="text-decoration: none; color: white;" href="chucnang/sua_doanvien.php?iddv=<?php echo $row["iddv"] ?>">Sửa</a></button>
                    <span>|</span>
                    <button class="btn btn-primary">
                        <a onclick="return confirm('Xác nhận xóa đoàn viên này?');" style="text-decoration: none; color: white;" href="chucnang/xoadoanvien.php?iddv=<?php echo $row["iddv"] ?>">Xóa</a>
                        <i class="fa-solid fa-trash" style="margin-left: 3px;"></i>
                    </button>
                </td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</body>
<?php include('alert2.php'); ?>
<?php include('doanvien_alert.php'); ?>
<?php include('alert_dgtheohk.php'); ?>
</html>