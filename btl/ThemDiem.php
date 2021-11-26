<?php
	require_once ('connect.php');
	$sql = "SELECT *from ExamResult ";
	$sq = mysqli_query($conn,$sql);
	$rs = mysqli_fetch_array($sq);
	if (!empty($_POST)) 
	{	
		$id = $_POST['idExamResult'];

		if (isset($_POST['nguVan'])) {
			$diem1 = $_POST['nguVan'];
		}

		if (isset($_POST['toan'])) {
			$diem2 = $_POST['toan'];
		}

		if (isset($_POST['ngoaiNgu'])) {
			$diem3 = $_POST['ngoaiNgu'];
		}

		if (isset($_POST['vatLy'])) {
			$diem4 = $_POST['vatLy'];
		}

		if (isset($_POST['hoaHoc'])) {
			$diem5 = $_POST['hoaHoc'];
		}

		if (isset($_POST['sinhHoc'])) {
			$diem6 = $_POST['sinhHoc'];
		}

		if (isset($_POST['lichSu'])) {
			$diem7 = $_POST['lichSu'];
		}

		if (isset($_POST['diaLy'])) {
			$diem8 = $_POST['diaLy'];
		}

		if (isset($_POST['gdcd'])) {
			$diem9 = $_POST['gdcd'];
		}

		if (isset($_POST['diemCong'])) {
			$diemcong = $_POST['diemCong'];
		}

		if($diem1 >= 0 &&  $diem2 >= 0  && $diem3 >= 0 && $diem4 >= 0 && $diem5 >= 0  && $diem6 >= 0 &&  $diem7 >= 0  && $diem8 >= 0  && $diem9 >= 0  && $diemcong >= 0 && $diem1 <= 10 &&  $diem2 <= 10  && $diem3 <= 10 && $diem4 <= 10 && $diem5 <= 10  && $diem6 <= 10 &&  $diem7 <= 10  && $diem8 <= 10  && $diem9 <= 10  && $diemcong <= 10 )
		{
				$sql2 = "INSERT into  ExamResult   (nguVan, toan, ngoaiNgu, vatLy, hoaHoc, sinhHoc , lichSu, diaLy, gdcd, diemCong) values( $diem1, $diem2 , $diem3 , $diem4 , $diem5 , $diem6 , $diem7, $diem8 , $diem9 , $diemcong)" ;        
				mysqli_query($conn, $sql2);
				if(mysqli_error($conn))
				{
					$link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/BTL/HienThiDiem.php";
                    $alert = "Lỗi nhập liệu ";
                    echo '<script>alert("' . $alert . '");'
                    .'location = "'.$link.'"'.'</script>'; 
				}
				else {
					header('Location: HienThiDiem.php');
				}
				
		}
		else{
			$link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/BTL/HienThiDiem.php";
			$alert = "Điểm thêm vào không được là số âm và phải nhỏ hơn 10 ";
			echo '<script>alert("' . $alert . '");'
			.'location = "'.$link.'"'.'</script>'; 
		}
		
	}


?>

   


<!DOCTYPE html>
<html>
<head>
	<title>Form thêm điểm </title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm  tuyển sinh</h2>
			</div>
			<div class="panel-body">
				<form method="post" >


					<div class="form-group">
					  <label for="number">Mã điểm  :</label>
					  <input required="true" type="text" class="form-control"  name="idExamResult" placeholder="Mã nhập phải là số VD: 234326 ">
					</div>

					<div class="form-group">
					  <label for="number">Ngữ văn :</label>
					  <input required="true" type="text" class="form-control"  name="nguVan" placeholder="Điểm nhập trong [0-10]">
					</div>

					<div class="form-group">
					  <label for="number">Toán:</label>
					  <input type="text" class="form-control"  name="toan" placeholder="Điểm nhập trong [0-10]">
					</div>

                    <div class="form-group">
					  <label for="number">Ngoại ngữ:</label>
					  <input type="text" class="form-control"  name="ngoaiNgu" placeholder="Điểm nhập trong [0-10]">
					</div>

                    <div class="form-group">
					  <label for="number">Vật lý:</label>
					  <input type="text" class="form-control"  name="vatLy" placeholder="Điểm nhập trong [0-10]">
					</div>

                    <div class="form-group">
					  <label for="number">Hóa học :</label>
					  <input type="text" class="form-control"  name="hoaHoc" placeholder="Điểm nhập trong [0-10]">
					</div>

                    <div class="form-group">
					  <label for="number">Sinh học :</label>
					  <input type="text" class="form-control" name="sinhHoc" placeholder="Điểm nhập trong [0-10]">
					</div>

                    <div class="form-group">
					  <label for="number">Lịch sử:</label>
					  <input type="text" class="form-control"  name="lichSu" placeholder="Điểm nhập trong [0-10]">
					</div>

                    <div class="form-group">
					  <label for="number">Địa lý:</label>
					  <input type="text" class="form-control"  name="diaLy" placeholder="Điểm nhập trong [0-10]">
					</div>

                    <div class="form-group">
					  <label for="number">GDCD:</label>
					  <input type="text" class="form-control"  name="gdcd" placeholder="Điểm nhập trong [0-10]">
					</div>

					<div class="form-group">
					  <label for="number">Điểm cộng:</label>
					  <input type="text" class="form-control"  name="diemCong" placeholder="Điểm nhập trong [0-10]">
					</div>

					<button class="btn btn-success"  >Lưu</button>
					<button class="btn btn-success" onclick="window.open('HienThiDiem.php')">Trở về </button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>