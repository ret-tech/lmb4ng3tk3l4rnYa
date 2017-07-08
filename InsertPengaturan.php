<?php
include 'db_config.php';

	$value = json_decode(file_get_contents('php://input'),true);
	$id_pengaturan = $value["id_pengaturan"];
	$alamat = $value["alamat"];
    $telp = $value["telp"];
	$twitter = $value["twitter"];
	$youtube = $value["youtube"];
	$email = $value["email"];
	
	if ($alamat===null or $telp===null or $twitter===null or $youtube===null or $email===null ){
		$response["CODE"] = (string) 100;
    	$response["DESC"] = "Beberapa parameter tidak diberikan!!";
    	die(json_encode($response));
	}
	
	if (mysqli_connect_errno()){
    	$response["CODE"] = (string)102;
		$response["DESC"] = "Tidak dapat terhubung ke database!!";
		die(json_encode($response));
    }
	if ($id_pengaturan === null){
	
	$sql = "INSERT INTO tb_pengaturan (alamat, telp, twitter, youtube, email) VALUES ('$alamat', '$telp', '$twitter', '$youtube' , '$email')";	
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
	$sql1 = "UPDATE tb_pengaturan  SET alamat='$alamat', telp='$telp', twitter='$twitter', youtube='$youtube', email='$email' WHERE id_pengaturan='$id_pengaturan'";	
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