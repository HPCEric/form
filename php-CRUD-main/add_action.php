<?php 
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="blog-php";
$con=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
mysqli_set_charset($con,"utf8");

$ab_name=		$_POST["ab_name"];
$ab_gender=		$_POST["ab_gender"];
$ab_phone=		$_POST["ab_phone"];
$ab_address=	$_POST["ab_address"];
$ab_mail=		$_POST["ab_mail"];

$sel="INSERT INTO address_book(ab_name,ab_gender,ab_phone,ab_address,ab_mail)
VALUES('$ab_name','$ab_gender','$ab_phone','$ab_address','$ab_mail')";

mysqli_query($con,$sel);
echo 'success';

?> 