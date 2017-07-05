<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $id = $value["id"];
	
	
if ($id==''){
    	$response["CODE"] = "102";
		$response["DESC"] = "Parameter tidak lengkap";
    	$data = array(
			"ID" => "-");
		
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
		
	} else {
		$result = mysqli_query($con,"SELECT * FROM tb_berita WHERE id='$id'");
			$response["CODE"] = "100";
			$response["DESC"] = "-";
    		$response["DATA"] = array();
 
    		while ($row = mysqli_fetch_array($result)) {
				$data= array();
        		$data["ID"] = $row["id"];
        		$data["JUDUL"] = $row["judul"];
        		$data["BODY"] = $row["body"];
        		$data["TIPE"] = $row["tipe"];
        		$data["GAMBAR"] = $row["gambar"];
        		$data["STATUS"] = $row["status"];
        		$data["DIBUAT"] = $row["dibuat"];
        		$data["UBAH"] = $row["ubah"];
				$data["id_user"] = $row["id_user"];
        		
        		array_push($response["DATA"], $data);
			} echo json_encode($response);
		
		
    	mysqli_close($con);  
	}