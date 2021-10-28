<?php

include 'db.php';

$baslik = $_POST['baslik'];
$aciklama = $_POST['aciklama'];
$link = $_POST['link'];
$email = $_POST['email'];
$resim = $_POST['resim'];
$code = $_POST['code'];

$sql = "INSERT INTO ticket (baslik, aciklama, link, email, resim, code) VALUES ('$baslik', '$aciklama', '$link', '$email', '$resim', '$code')";

if (mysqli_query($link, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);


/*

if(isset($_POST["code-copy"]))
{

	$baslik = $_POST["baslik"];
	$aciklama = $_POST["aciklama"];
	$link = $_POST["link"];
	$email = $_POST["email"];
	$resim = $_POST["resim"];

	$code = $_POST['code'];


	
	if(!empty($baslik) && !empty($aciklama) && !empty($link) && !empty($email) && !empty($resim))
	{
		$formgonderim = mysqli_query($link, "INSERT INTO ticket (baslik, aciklama, link, email, resim) VALUES('$baslik','$aciklama','$link','$email','resim')");
	}
}


?>