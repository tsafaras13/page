<?php
	$status = "ERROR";
	if ((isset($_POST['nameteacher'])) && (isset($_POST['anakoinwsh'])))
	{
		if (($_POST['nameteacher']!='')   && ($_POST['anakoinwsh']!=''))
		{
			include('connection.php');
			mysqli_set_charset($conn,"utf8");
			$result = $conn->query("INSERT INTO anakoinwseis (nameteacher,anakoinwsh) VALUES ('".$_POST['nameteacher']."', '".$_POST['anakoinwsh']."')");
			if ($result)
				$status = "OK";
			else
				$status = "ERROR";
			$conn->close();
		}
	}
	header('Content-type: application/json');
	echo json_encode(array('status' => $status)); 
?>
