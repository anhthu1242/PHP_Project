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
				Quản lý nghành tuyển sinh
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo năm tuyển sinh">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                            <th>STT</th>
							<th>Mã năm tuyển sinh</th>
							<th >Mã nghành tuyển sinh</th>
							<th>Chỉ tiêu </th>
							<th>Nhóm nghành tuyển sinh</th>
                            <th>Điều kiện </th>
							<th width="60px"></th>
							<th width="60px"></th> 
						</tr>
					</thead>
                    <tbody>
                        <?php
                            $index = 1;
                            $sql = "SELECT * from AdmissionsMajor ";//where  `enabled` = 1 
                            $sq = mysqli_query($conn,$sql);
                            while($rs = mysqli_fetch_array($sq))
                            {
                                echo '<tr>
                                        <td>'.($index++).'</td>
                                        <td >'.$rs['idAdmissionsYear'].'</td>
                                        <td >'.$rs['idMajors'].'</td>
                                        <td>'.$rs['numberOf'].'</td>
                                        <td>'.$rs['groups'].'</td>
                                        <td>'.$rs['condition'].'</td>
                                        <td><button class="btn btn-warning" onclick=\'window.open("SuaNghanh.php?id='.$rs['idAdmissionsYear'].'","_self")\'>Sửa</button></td>
                                        <td><button class="btn btn-danger" onclick="deleteM('.$rs['idMajors'].')">Xóa
										</button></td>
                                    </tr>';
                            }
                            
                        ?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('ThemNghanh.php')">Thêm nghành tuyển sinh</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function deleteM(id)
		{
			console.log(id);
			$.post('XoaNghanh.php',{
				'idMajors':id
			},function(data)
			{
				alert(data);
				local.reload();
			})
		}
	</script>
</body>
</html>