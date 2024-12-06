<?php
function isValidEmail($Email)
{
	// Sử dụng biểu thức chính quy để kiểm tra định dạng email
	$pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/';

	// Sử dụng hàm preg_match() để so khớp biểu thức chính quy với địa chỉ email đầu vào
	if (preg_match($pattern, $Email)) {
		return true; // Email hợp lệ
	} else {
		return false; // Email không hợp lệ
	}
}
function createSignup()
{
	try {
		if (isset($_POST['Submit'])) {
			$data_missing = array();
			if (empty($_POST['Uname'])) {
				$data_missing[] = 'Uname';
				return false;
			} else {
				$Uname = trim($_POST['Uname']);
			}
			if (empty($_POST['Pass'])) {
				$data_missing[] = 'Pass';
				return false;
			} else {
				$Pass = $_POST['Pass'];
			}

			if (!isValidEmail($_POST['Email'])) {
				return false;
			}

			if (empty($_POST['email'])) {
				$data_missing[] = 'Email';
				return false;
			} else {
				$Email = trim($_POST['Email']);
			}

			if (empty($_POST['sdt'])) {
				$data_missing[] = 'sdt';
				return false;
			} else {
				$sdt = $_POST['sdt'];
			}

			if (empty($data_missing)) {
				require_once ('Database Connection file/mysqli_connect.php');
				$query = "INSERT INTO Customer (Uname, Pass, Email, sdt) VALUES (?,?,?,?)";
				$stmt = mysqli_prepare($dbc, $query);
				mysqli_stmt_bind_param($stmt, "sssi", $Uname, $Pass, $Email, $sdt);
				mysqli_stmt_execute($stmt);
				$affected_rows = mysqli_stmt_affected_rows($stmt);
				//echo $affected_rows."<br>";
				// mysqli_stmt_bind_result($stmt,$cnt);
				// mysqli_stmt_fetch($stmt);
				// echo $cnt;
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				/*
																																																																															   $response=@mysqli_query($dbc,$query);
																																																																																																								  */
				if ($affected_rows == 1) {
					return true;
					// header('location:user_reg_success.php');
				} else {
					echo "Submit Error";
					// echo mysqli_error();
				}
			} else {
				echo "The following data fields were empty! <br>";
				foreach ($data_missing as $missing) {
					echo $missing . "<br>";
				}
			}
		} else {
			echo "Submit request not received";
		}
	} catch (Exception $e) {
		return false;
	}
}

?>