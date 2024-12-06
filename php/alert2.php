<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
$status = $_GET['status'] ?? '';

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
                title: 'Thất bại',
                icon: 'error'
            }).then(function() {
                window.location.href = window.location.href.split('?')[0];
            });
        </script>";
        break;
    case 'tontai':
        echo "<script>
            Swal.fire({
                title: 'ID đã tồn tại',
                icon: 'error'
            }).then(function() {
                window.location.href = window.location.href.split('?')[0];
            });
        </script>";
        break;
        case 'codoanvien':
            echo "<script>
                Swal.fire({
                    title: 'Chi đoàn hiện tại đang có đoàn viên, không thể xóa',
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