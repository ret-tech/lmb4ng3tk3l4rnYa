<?php

    include 'db_config.php';

    $value = json_decode(file_get_contents('php://input'),true);
    $user = $value["user"];
    $pass = sha1($value["pass"]);
	$last = date("Y-m-d h:i:s");
    
    if (mysqli_connect_error()){
    	$response["CODE"] = "104";
		$response["DESC"] = "Database Error!";
		$data = array(
			"USERNAME" => "-",
			"PASSWORD" => "-",
			"LAST_LOGIN" => "-"
		);
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
    } else if($user==''||$pass==''){
    	$response["CODE"] = "102";
		$response["DESC"] = "Parameter tidak lengkap";
    	$data = array(
			"USERNAME" => "-",
			"PASSWORD" => "-",
			"LAST_LOGIN" => "-");
		$json = array();
		array_push($json, $data);
		$response["DATA"] = $json;
		die(json_encode($response));
    } else {
        $result = mysqli_query($con,"SELECT * FROM tb_users where username='$user' AND password='$pass'");
		
        $row = mysqli_fetch_array($result);
        
       
        	if($row <= 0){
        		$response["CODE"] = "106";
				$response["DESC"] = "User tidak ditemukan";
    			$data = array(
				"ID_USER" => "-",
			"USERNAME" => "-",
			"PASSWORD" => "-");
				$json = array();
				array_push($json, $data);
				$response["DATA"] = $json;
				die(json_encode($response));
        	} else {
        		if($row > 0){
					$update = mysqli_query($con,"UPDATE tb_users SET last_login ='$last' where username='$user' ");
    				$response["CODE"] = "100";
    				$response["DESC"] = "Login successful!";
    				$data = array(
					"ID_USER" => $row["id_user"],
					"USERNAME" => $row["username"],
					"PASSWORD" => $row["password"],
					"LAST_LOGIN" => $row["last_login"]
					);
					$json = array();
					array_push($json, $data);
					$response["DATA"] = $json;
    				die(json_encode($response));
    			} else if (mysqli_connect_error()){
    				$response["CODE"] = "103";
					$response["DESC"] = "Database Error!";
    				$data = array(
						"USERNAME" => "-",
						"PASSWORD" => "-");
					$json = array();
					array_push($json, $data);
					$response["DATA"] = $json;
					die(json_encode($response));
        		} else{
    				$response["CODE"] = "101";
    				$response["DESC"] = "Username atau password tidak sesuai";
    				$data = array(
					"USERNAME" => "-",
					"PASSWORD" => "-");
					$json = array();
					array_push($json, $data);
					$response["DATA"] = $json;
    				die(json_encode($response));
    			}
        	}
        
    	mysqli_close($con);        
    }
?>