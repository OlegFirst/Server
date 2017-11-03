<?php
	
	
	$servername = "localhost";
	$username = "user";
	$password = "1234";
	$dbname = "batar";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM solarPanel_goods";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			print_r($row);
			echo "id: " . $row["id"]."<br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();

?>