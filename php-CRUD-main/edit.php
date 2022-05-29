<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="blog-php";
$con=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
mysqli_set_charset($con,"utf8");
$ab_id=$_GET["ab_id"];
$sel="SELECT*FROM address_book WHERE ab_id=$ab_id";
$result=mysqli_query($con,$sel);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		input{
			font-size: 20px;
		}
		.article_content{
			width: 60%;
			height: 500px;
			overflow: auto;
			font-size: 21px;
		}

	</style>
		<script type="text/javascript">
		 jQuery.validator.addMethod("ab_phone", function(value,element) {
            var tel = /^09\d{2}-?\d{3}-?\d{3}$/;
    		return this.optional(element) || (tel.test(value));

        }, "請正確填寫您的聯絡電話");
		jQuery.validator.addMethod("ab_mail", function(value,element) {
            var tel = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})*$/;
    		return this.optional(element) || (tel.test(value));

        }, "請正確填寫您的信箱");
		$(document).ready(function(){		
			$("#form").validate({
				rules: 
				{ 
					ab_name: { required: true },
					ab_gender: { required: true },
					ab_phone:{ 
						required: true ,
						ab_phone: true,
					},
					ab_address: { required: true },
					ab_mail:{ 
						required: true,
						ab_mail:true,
					},
				},
				messages: 
				{
				 	ab_name: { required:'必填' },
					ab_gender: { required:'必填' },
					ab_phone: { 
						required:'必填',
			            minlength:'不得少於8位',
			            number:'電話需為數字且09開頭', 
			        },
					ab_address: { required: true },
					ab_mail:{ 
						required:'必填',
			            email:'Email格式不正確',
			        },
				},
				submitHandler: function(form) 
				{
		             form.submit();
			    },
			});
		});
	</script>
</head>
<body>
	<div class="right_content">
		<div class="theme">
			修改通訊錄
		</div>
		<div class="content">
			<?php while($row = $result->fetch_assoc()){?>
				<form id="form" action="edit_action.php" method="post">
					<input id="ab_id" type="hidden" name="ab_id" value="<?php echo $row["ab_id"]?>">
					<input id="ab_name" name="ab_name" type="text" value="<?php echo $row["ab_name"]?>"></br>
					<select id="ab_gender" name="ab_gender" id="ab_gender">
							<option value="0" <?php echo $row["ab_gender"]==0 ? "selected":""?>>男</option>
							<option value="1" <?php echo $row["ab_gender"]==1 ? "selected":""?>>女</option>
					</select></br>
					<input id="ab_phone" name="ab_phone" type="text" value="<?php echo $row["ab_phone"]?>"></br>
					<input id="ab_address" name="ab_address" type="text" value="<?php echo $row["ab_address"]?>"></br>
					<input id="ab_mail" name="ab_mail" type="text" value="<?php echo $row["ab_mail"]?>"></br>
					<input  type="submit" value="修改">
					<input type="button" onclick="location.href='select.php'" value="取消">
				</form>
			<?php }?>
		</div>
	</div>
</body>
</html>