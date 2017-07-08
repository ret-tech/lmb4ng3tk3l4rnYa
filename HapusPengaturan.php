<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $id_pengaturan = $value["id_pengaturan"];
    
    if (mysqli_connect_error()){
    	$response["CODE"] = "103";
		$response["DESC"] = "Database Error!";
    	$data = array(
			"ID" => "-",
			"COLLECTORCODE"=> "-",
			"COLLECTORNAME"=> "-",
			"LIMIT"=> "-",
			"SETTLEMENT" => "-",
			"AREACODE" => "-",
			"CABANGCODE" => "-");
		
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
    
	} else if($id_pengaturan==''){
    	$response["CODE"] = "102";
		$response["DESC"] = "Parameter tidak lengkap";
    	$data = array(
			"ID_PENGATURAN" => "-");
		
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
    
	} else {
        $result = mysqli_query($con, "DELETE from tb_pengaturan where id_pengaturan='$id_pengaturan'");
        
        if(mysqli_affected_rows($con) > 0) {
    		$response["CODE"] = "100";
			$response["DESC"] = "Data Berhasil Dihapus";
 			
    		echo json_encode($response);
		}else{
			$response["CODE"] = "101";
			$response["DESC"] = "Data gagal Dihapus";
			die(json_encode($response));
		}
		
		mysqli_close();
    }