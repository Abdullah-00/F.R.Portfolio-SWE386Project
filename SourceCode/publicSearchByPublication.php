<?php
	require("dbConnect.php");
	
	//get the q parameter from URL
	$q=$_GET["q"];
	$sql = 'SELECT Title FROM Publication WHERE Title LIKE "%'.$q.'%"';
	$response = "";
	if($result = mysqli_query($link, $sql)){
		$response = '<ul class="results" >';
		while($row = mysqli_fetch_array($result)){
			$response = $response .'<li style="width: 300px;" onclick=copy(this)>'. $row["Title"] . "</li>";
		}
		$response = $response . '</ul>';
	}
	//output the response
	if($response == '<ul class="results" ></ul>'){
		echo "<ul><li style='width: 300px''>No suggesstion available</li></ul>";
	}else{
		echo $response;
	}
	//mysqli_free_result($result);
	mysqli_close($link);
?>