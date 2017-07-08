<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $id_gallery = $value["id_gallery"];
	
	
if ($id_gallery==''){
    	$response["CODE"] = "102";
		$response["DESC"] = "Parameter tidak lengkap";
    	$data = array(
			"ID_GALLERY" => "-");
		
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
		
	} else {
		$result = mysqli_query($con,"SELECT * FROM tb_gallery WHERE id_gallery='$id_gallery'");
			$response["CODE"] = "100";
			$response["DESC"] = "-";
    		$response["DATA"] = array();
 
    		while ($row = mysqli_fetch_array($result)) {
				$data= array();
        		$data["ID_GALLERY"] = $row["id_gallery"];
        		$data["JUDUL"] = $row["judul"];
        		$data["GAMBAR"] = $row["gambar"];
        		$data["KETERANGAN"] = $row["keterangan"];
        		$data["TAG"] = $row["tag"];
        		
        		array_push($response["DATA"], $data);
			} echo json_encode($response);
		
		
    	mysqli_close($con);  
	}