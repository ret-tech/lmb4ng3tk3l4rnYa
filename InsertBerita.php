<?php
include 'db_config.php';

	$value = json_decode(file_get_contents('php://input'),true);
	$id = $value["id"];
	$judul = $value["judul"];
    $body = $value["body"];
	$tipe = $value["tipe"];
	$gambar = $value["gambar"];
	$status = $value["status"];
	$ubah = date("Y-m-d h:i:s");
	$id_user = $value["id_user"];
	$dibuat = date("Y-m-d h:i:s");
	if ($judul===null or $body===null or $tipe===null or $gambar===null or $status===null ){
		$response["CODE"] = (string) 100;
    	$response["DESC"] = "Beberapa parameter tidak diberikan!!";
    	die(json_encode($response));
	}
	
	if (mysqli_connect_errno()){
    	$response["CODE"] = (string)102;
		$response["DESC"] = "Tidak dapat terhubung ke database!!";
		die(json_encode($response));
    }
	if ($id === null){
	
	$sql = "INSERT INTO tb_berita (judul, body, tipe, gambar, status, dibuat, id_user) VALUES ('$judul', '$body', '$tipe', '$gambar' , '$status', '$dibuat', '$id_user')";	
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
	$sql1 = "UPDATE tb_berita  SET judul='$judul', body='$body', tipe='$tipe', gambar='$gambar', status='$status', ubah='$ubah', id_user='$id_user' WHERE id='$id'";	
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