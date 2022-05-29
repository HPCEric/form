<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "blog";
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($con, "utf8");
$sel = "SELECT*FROM article_cl";
$result = mysqli_query($con, $sel);
?>
<!DOCTYPE html>
<html>

<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>


	<title></title>
	<style>
		.theme {
			font-size: 32px;
			margin-bottom: 20px;
		}

		.content {
			font-size: 18px;
			margin: 50px;
		}

		input {
			font-size: 20px;
		}

		.article_content {
			width: 60%;
			height: 500px;
			overflow: auto;
			font-size: 21px;
		}
	</style>
	<script type="text/javascript">
		jQuery.validator.addMethod("ab_phone", function(value, element) {
			var tel = /^09\d{2}-?\d{3}-?\d{3}$/;
			return this.optional(element) || (tel.test(value));

		}, "請正確填寫您的聯絡電話");
		jQuery.validator.addMethod("ab_mail", function(value, element) {
			var tel = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})*$/;
			return this.optional(element) || (tel.test(value));

		}, "請正確填寫您的信箱");
		$(document).ready(function() {
			$("#form").validate({
				rules: {
					ab_name: {
						required: true
					},
					ab_gender: {
						required: true
					},
					ab_phone: {
						required: true,
						ab_phone: true,
					},
					ab_address: {
						required: true
					},
					ab_mail: {
						required: true,
						ab_mail: true,
					},
				},
				messages: {
					ab_name: {
						required: '必填'
					},
					ab_gender: {
						required: '必填'
					},
					ab_phone: {
						required: '必填',
						minlength: '不得少於8位',
						number: '電話需為數字且09開頭',
					},
					ab_address: {
						required: '必填'
					},
					ab_mail: {
						required: '必填'
					},
				},
				submitHandler: function(form) {
					var ab_name = $("#ab_name").val();
					var ab_gender = $("#ab_gender").val();
					var ab_phone = $("#ab_phone").val();
					var ab_address = $("#ab_address").val();
					var ab_mail = $("#ab_mail").val();
					$.ajax({
						url: 'add_action.php',
						type: 'POST',
						data: {
							ab_name: ab_name,
							ab_gender: ab_gender,
							ab_phone: ab_phone,
							ab_address: ab_address,
							ab_mail: ab_mail,
						},
						success: function(data) {
							window.location.href = "select.php";
						}
					});
				},
			});
		});
	</script>
</head>

<body>

	<div class="theme">
		新增通訊錄
	</div>
	<div class="content">
		<form id="form" action="add_action.php" method="post">

			姓名：<input name="ab_name" id="ab_name" type="text" placeholder="姓名"></br>
			性別：<select name="ab_gender" id="ab_gender">
				<option value="0">男</option>
				<option value="1">女</option>
			</select></br>
			電話：<input name="ab_phone" id="ab_phone" type="text" placeholder="電話"></br>
			地址：<input name="ab_address" id="ab_address" type="text" placeholder="地址"></br>
			E-mail：<input name="ab_mail" id="ab_mail" type="text" placeholder="E-mail"></br>
			<input class="c" type="submit" value="新增">
			<input type="button" onclick="location.href='select.php'" value="取消">
		</form>

</body>

</html>