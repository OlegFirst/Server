<!DOCTYPE>
<html>
<head>
	<title>Object collection</title>
</head>
<body>
<?php
	
	$collection=array();
	
	$obj=new product(1,"dog");
	//$obj->id=$obj->id+3;
	array_push($collection,$obj);
	$obj=new product(2,"dog9");
	array_push($collection,$obj);
	//prn($collection[0]->id);
	
	foreach ($collection as $value){
		prn($value->id);
	}
	
	class product{
		public $id;
		public $name;
		function __construct($arg1,$arg2){
			$this->id=$arg1;
			$this->name=$arg2;
		}
	}
	
	function prn($arg){
		print_r($arg); echo"<br>";
	}

?>	
</body>
</html>