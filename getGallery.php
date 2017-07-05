<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $id = $value["id"];
    
    if (mysqli_connect_error()){
    	$response["CODE"] = "104";
		$response["DESC"] = "Database Error!";
		$data = array(
			"ID" => "-"
			);
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
    } else {
        $result = mysqli_query($con,"SELECT * FROM tb_gallery");
			$response["CODE"] = "100";
			$response["DESC"] = "-";
    		$response["DATA"] = array();
 
    		while ($row = mysqli_fetch_array($result)) {
				$data= array();
        		$data["ID"] = $row["id"];
        		$data["JUDUL"] = $row["judul"];
        		$data["GAMBAR"] = $row["gambar"];
        		$data["DESKRIPSI"] = $row["deskripsi"];
        		$data["TAG"] = $row["tag"];
        		
        		array_push($response["DATA"], $data);
			} echo json_encode($response);
		
		
    	mysqli_close($con);        
    }
?>