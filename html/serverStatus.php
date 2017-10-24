<?php
	
	function serverStatus($statusNumber){
		switch ($statusNumber){
			case (400):
				header("HTTP/1.1 400 OK");
				//echo "Bad request";
				break;
			case (404):
				header("HTTP/1.1 404 OK");
				//echo "Not found";
				break;
			case (408):
				header("HTTP/1.1 408 OK");
				//echo "Request timeout";
				break;
			case (500):
				header("HTTP/1.1 500 OK");
				//echo "Internal server error";
				break;
			case (503):
				header("HTTP/1.1 503 OK");
				//echo "Service unavailable";
				break;
		}
	}
	
?>