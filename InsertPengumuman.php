<?php
include 'db_config.php';

	$value = json_decode(file_get_contents('php://input'),true);
	$id_pengumuman = $value["id_pengumuman"];
	$judul = $value["judul"];
    $isi = $value["isi"];
	$dari = date("Y-m-d h:i:s");
	$sampai = date("Y-m-d h:i:s");
	if ($judul===null or $isi===null ){
		$response["CODE"] = (string) 100;
    	$response["DESC"] = "Beberapa parameter tidak diberikan!!";
    	die(json_encode($response));
	}
	
	if (mysqli_connect_errno()){
    	$response["CODE"] = (string)102;
		$response["DESC"] = "Tidak dapat terhubung ke database!!";
		die(json_encode($response));
    }
	if ($id_pengumuman === null){
	
	$sql = "INSERT INTO tb_pengumuman (judul, isi, dari, sampai) VALUES ('$judul', '$isi', '$dari', '$sampai' )";	
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
	$sql1 = "UPDATE tb_pengumuman  SET judul='$judul', isi='$isi', dari='$dari', sampai='$sampai' WHERE id_pengumuman='$id_pengumuman'";	
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