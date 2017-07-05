<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $id = $value["id"];
    
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
    
	} else if($id==''){
    	$response["CODE"] = "102";
		$response["DESC"] = "Parameter tidak lengkap";
    	$data = array(
			"ID" => "-");
		
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
    
	} else {
        $result = mysqli_query($con, "DELETE from tb_berita where id='$id'");
        
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