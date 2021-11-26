<?php
require_once ('connect.php');
         
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form tìm kiếm điểm </title>
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
    <h3 style="color:aqua; text-align:center">Bảng điểm sau khi tìm kiếm </h3>
    <br>
<table class="table table-bordered" style="color: burlywood">
					<thead>
						<tr>
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
							<th >Tổng điểm </th>
						</tr>
					</thead>
					<tbody>
                        <?php 
                        	if (!empty($_POST))
                            {
                            if (isset($_POST['id'])) {
                                $id = $_POST['id'];
                                
                            }
                        $sql = "select * from ExamResult where idExamResult = '$id' ";
                        $sq = mysqli_query($conn,$sql);
                        while($std = mysqli_fetch_array($sq))
                        {
                            $tong = $std['nguVan']+$std['toan']+$std['ngoaiNgu']+$std['vatLy']+$std['hoaHoc']+$std['sinhHoc']+$std['lichSu']+$std['diaLy']+ $std['gdcd']+ $std['diemCong'];
                            echo '<tr>
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
                                    <td>' .$tong.'</td>
                                </tr>';
                        }}

                        ?>
                    </tbody>
                    

                    </table> 
                    
                    
                    <button class="btn btn-success" onclick="window.open('HienThiDiem.php')">Trở về </button>
    </body>
</html>