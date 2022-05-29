<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="blog-php";
$con=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
mysqli_set_charset($con,"utf8");
$ab_id=			$_POST["ab_id"];
$ab_name=		$_POST["ab_name"];
$ab_gender=		$_POST["ab_gender"];
$ab_phone=		$_POST["ab_phone"];
$ab_address=	$_POST["ab_address"];
$ab_mail=		$_POST["ab_mail"];

$sel="UPDATE address_book SET ab_name='$ab_name',ab_gender='$ab_gender',ab_phone='$ab_phone',ab_address='$ab_address',ab_mail='$ab_mail' WHERE ab_id=$ab_id";
mysqli_query($con,$sel);
echo '<meta http-equiv=REFRESH CONTENT=0;url=select.php>';
?>