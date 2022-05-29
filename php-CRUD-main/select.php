<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="blog-php";
$con=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
mysqli_set_charset($con,"utf8");
$sel="SELECT*FROM address_book WHERE ab_state = '1'";
$result=mysqli_query($con,$sel);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script type="Text/JavaScript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){
	    $('#myTable').DataTable();});
	    function del_confirm(ID)
	    {
	    	var r = confirm("確定要刪除資料");
	    	if(r==true){
	    		location.href="delete.php?ab_id="+ID;
	    	}
	    	else{
	    		alert("取消刪除");
	    	}
	    }
    </script>
    <style>
    body {margin:0px;padding: 0px;}
			
    	.theme{
			font-size: 32px;
			margin-bottom: 20px;
		}
		.content{
			font-size: 18px;
			margin: 50px;
		}
		.button{
			width: 150px;
			font-size: 20px;
			text-align: center;
			margin-bottom: 50px;
		}
    	.table{
    		font-size: 20px;
    		text-align: center;
    		border: 1px solid black;
    	}    	
    </style>
</head>
<body>
	<div class="right_content">
		<div class="theme">
				通訊錄
		</div>
			<div class="button_all">
				<a  style="text-decoration:none;" href="add.php">
					<div class="button">
						新增
					</div>
				</a>
				<table class="table" id="myTable">
					<thead>
						<tr>
						<th>編號</th>
						<th>姓名</th>						
						<th>性別</th>
						<th>電話</th>
						<th>地址</th>
						<th>E-mail</th>
						<th>修改</th>
						<th>刪除</th>					
					</tr>
					</thead>
					<tbody>
						<tr>
						<?php while ($row=$result->fetch_assoc()){?>
							<td><?php echo $row["ab_id"]?></td>
							<td><?php echo $row["ab_name"]?></td>
							<td><?php echo $row["ab_gender"]==0? "男":"女"?></td>
							<td><?php echo$row["ab_phone"]?></td>
							<td><?php echo$row["ab_address"]?></td>
							<td><?php echo$row["ab_mail"]?></td>
							<td><a href="edit.php?ab_id=<?php echo $row["ab_id"]?>"><div>修改</div></a></td>
							<td><a href="#" onclick="del_confirm(<?php echo $row["ab_id"]?>)"><div>刪除</div></button></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
	</div>
</body>
</html>