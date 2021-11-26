<?php
require_once ('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý nghành tuyển sinh</title>
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
				<h3 style="color:chocolate;  text-align:center; ">Quản lý điểm tuyển sinh</h3>
				<div class="col-md-12 head">
					<div class="float-right">
						<a href="export.php" class="btn btn-success">
							<i class="dwm"></i>
							Export
						</a>
					</div>

				</div>
				<br>
				<form method="POST" action="timkiemdiem.php">
				<input type="text" name="id" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm điểm tuyển sinh theo mã ">
				<button class="btn btn-success" >Search
				</button>
				</form>
				
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                            <th>STT</th>
							<th>Mã số bảng điểm</th>
							<th>Ngữ văn</th>
							<th>Toán </th>
							<th>Ngoại ngữ</th>
                            <th>Vật lý</th>
                            <th>Hóa học</th>
                            <th>Sinh học</th>
                            <th>Lịch sử</th>
                            <th>Địa lý</th>
                            <th>GDCD</th>
                            <th>Điểm cộng </th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$index = 1;
                            $sql = "SELECT * from ExamResult";
                            $sq = mysqli_query($conn,$sql);
                            while($std = mysqli_fetch_array($sq))
                            {
								echo '<tr>
										<td>'.($index++).'</td>
										<td>'.$std['idExamResult'].'</td>
										<td>'.$std['nguVan'].'</td>
										<td>'.$std['toan'].'</td>
										<td>'.$std['ngoaiNgu'].'</td>
										<td>'.$std['vatLy'].'</td>
										<td>'.$std['hoaHoc'].'</td>
										<td>'.$std['sinhHoc'].'</td>
										<td>'.$std['lichSu'].'</td>
										<td>'.$std['diaLy'].'</td>
										<td>'.$std['gdcd'].'</td>
										<td>'.$std['diemCong'].'</td>
										<td><button class="btn btn-warning" onclick=\'window.open("SuaDiem.php?id='.$std['idExamResult'].'","_self")\'>Sửa</button></td>
										
									</tr>';
							}
						?>
					</tbody>
				</table>
				
			</div>

		</div>

	</div>

</body>
</html>