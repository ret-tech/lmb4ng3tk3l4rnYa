<?php
include 'db_config.php';

	$value = json_decode(file_get_contents('php://input'),true);
	$id_gallery = $value["id_gallery"];
	$getGambar = $value["gambar"];
	$file = $value["gambar"]; 
	$img = str_replace('data:image/jpg;base64,', '', $file);
	//file_put_contents('img/imag.jpg', base64_decode($img));
	
	$judul = $value["judul"];
	$keterangan = $value["keterangan"];
	$tag = $value["tag"];
	
	//$gambar = base64_encode(file_get_contents($getGambar));
	
	if ($judul===null or $keterangan===null or $tag===null ){
		$response["CODE"] = (string) 100;
    	$response["DESC"] = "Beberapa parameter tidak diberikan!!";
    	die(json_encode($response));
	}
	
	if (mysqli_connect_errno()){
    	$response["CODE"] = (string)102;
		$response["DESC"] = "Tidak dapat terhubung ke database!!";
		die(json_encode($response));
    }
	if ($id_gallery === null){
	
	$sql = "INSERT INTO tb_gallery (judul, gambar, keterangan, tag) VALUES ('$judul', '$img', '$keterangan', '$tag')";	
	if ($con->query($sql) === TRUE) {
		$response["CODE"] = (string) 0;
		$response["DESC"] = "Sukses!!";
		mysqli_close($con);
		die(json_encode($response));
	} else {
		$response["CODE"] = (string) 104;
		$response["DESC"] = $con->error;
		mysqli_close($con);
		die(json_encode($response));
	}
	} else {
	$sql1 = "UPDATE tb_gallery  SET judul='$judul', gambar='$gambar', deskripsi='$deskripsi', tag='$tag' WHERE id_gallery='$id_gallery'";	
	if ($con->query($sql1) === TRUE) {
		$response["CODE"] = (string) 0;
		$response["DESC"] = "Sukses!!";
		mysqli_close($con);
		die(json_encode($response));
	} else {
		$response["CODE"] = (string) 105;
		$response["DESC"] = $con->error;
		mysqli_close($con);
		die(json_encode($response));
	}
	}
?>