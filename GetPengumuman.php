<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $id_pengumuman = $value["id_pengumuman"];
    
    if (mysqli_connect_error()){
    	$response["CODE"] = "104";
		$response["DESC"] = "Database Error!";
		$data = array(
			"ID_PENGUMUMAN" => "-"
			);
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
    } else  {
        $result = mysqli_query($con,"SELECT * FROM tb_pengumuman ");
			$response["CODE"] = "100";
			$response["DESC"] = "-";
    		$response["DATA"] = array();
 
    		while ($row = mysqli_fetch_array($result)) {
				$data= array();
        		$data["ID_PENGUMUMAN"] = $row["id_pengumuman"];
        		$data["JUDUL"] = $row["judul"];
        		$data["ISI"] = $row["isi"];
        		$data["DARI"] = date("d M Y", strtotime($row["dari"]));
        		$data["SAMPAI"] = date("d M Y", strtotime($row["sampai"]));
        		
        		array_push($response["DATA"], $data);
			} echo json_encode($response);
		
		
    	mysqli_close($con);        
    } 
?>
