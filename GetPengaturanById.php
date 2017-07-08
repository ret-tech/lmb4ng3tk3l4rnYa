<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $id_pengaturan = $value["id_pengaturan"];
	
	
if ($id_pengaturan==''){
    	$response["CODE"] = "102";
		$response["DESC"] = "Parameter tidak lengkap";
    	$data = array(
			"ID_PENGATURAN" => "-");
		
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
		
	} else {
		$result = mysqli_query($con,"SELECT * FROM tb_pengaturan WHERE id_pengaturan='$id_pengaturan'");
			$response["CODE"] = "100";
			$response["DESC"] = "-";
    		$response["DATA"] = array();
 
    		while ($row = mysqli_fetch_array($result)) {
				$data= array();
        		$data["ID_PENGATURAN"] = $row["id_pengaturan"];
        		$data["ALAMAT"] = $row["alamat"];
        		$data["TELP"] = $row["telp"];
        		$data["TWITTER"] = $row["twitter"];
        		$data["YOUTUBE"] = $row["youtube"];
        		$data["EMAIL"] = $row["email"];
        		
        		array_push($response["DATA"], $data);
			} echo json_encode($response);
		
		
    	mysqli_close($con);  
	}