<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="blog-php";
$con=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
mysqli_set_charset($con,"utf8");
$ab_id=	$_GET["ab_id"];


$sel="UPDATE address_book SET ab_state='0' WHERE ab_id=$ab_id";
mysqli_query($con,$sel);
echo '<meta http-equiv=REFRESH CONTENT=0;url=select.php>';
?>