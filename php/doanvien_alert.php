<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
$status = $_GET['th'] ?? '';

switch ($status) {
    case 'success':
        echo "<script>
            Swal.fire({
                title: 'Thành Công',
                icon: 'success'
            }).then(function() {
                window.location.href = window.location.href.split('?')[0]; 
            });
        </script>";
        break;
    case 'error':
        echo "<script>
            Swal.fire({
                title: 'Không có đoàn viên này',
                icon: 'error'
            }).then(function() {
                window.location.href = window.location.href.split('?')[0];
            });
        </script>";
        break;
    case 'tontai':
        echo "<script>
            Swal.fire({
                title: 'ID đoàn viên đã tồn tại',
                icon: 'error'
            }).then(function() {
                window.location.href = window.location.href.split('?')[0];
            });
        </script>";
        break;
    default:
        break;
}

?>