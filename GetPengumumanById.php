<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $id_pengumuman = $value["id_pengumuman"];
	
	
if ($id_pengumuman==''){
    	$response["CODE"] = "102";
		$response["DESC"] = "Parameter tidak lengkap";
    	$data = array(
			"ID_PENGUMUMAN" => "-");
		
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
		
	} else {
		$result = mysqli_query($con,"SELECT * FROM tb_pengumuman WHERE id_pengumuman='$id_pengumuman'");
			$response["CODE"] = "100";
			$response["DESC"] = "-";
    		$response["DATA"] = array();
 
    		while ($row = mysqli_fetch_array($result)) {
				$data= array();
        		$data["ID_PENGUMUMAN"] = $row["id_pengumuman"];
        		$data["JUDUL"] = $row["judul"];
        		$data["ISI"] = $row["isi"];
        		$data["DARI"] = $row["dari"];
        		$data["SAMPAI"] = $row["sampai"];
        		
        		array_push($response["DATA"], $data);
			} echo json_encode($response);
		
		
    	mysqli_close($con);  
	}