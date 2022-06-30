<?php
class Database{
    private function connect()
	{
		// code..
		$string = DBDRIVER . ":host=".DBHOST.";dbname=".DBNAME;
		if(!$con = new PDO($string,DBUSER,DBPASS)){
			die("no pudo conectarse a la base de datos");
		}
		return $con;
	}

	public function query($query,$data = array(),$data_type = "object")
	{
		
		$con = $this->connect();
		$stm = $con->prepare($query);
		$dml = explode(" ", $query)[0];

		switch ($dml)
		{
			case "select" :
				$check = $stm->execute($data);
				if($check){
					if($data_type == "object"){
				
						$data = $stm->fetchAll(PDO::FETCH_OBJ);
					}else{
						$data = $stm->fetchAll(PDO::FETCH_ASSOC);
					}
	
					if(is_array($data) && count($data) >0){
						return $data;
					}
				}

				break;

			case "insert":
				$check = $stm->execute($data);
				if($check){
					return $con->lastInsertId("id");
				}

				break;

			case'update':
				$check = $stm->execute($data);
				return true;

				break;

			case'delete':
				$check = $stm->execute($data);
				return true;
				break;

			case'call':
			
				$check = $stm->execute($data);
				if($check){
					if($data_type == "object"){
				
						$data = $stm->fetchAll(PDO::FETCH_OBJ);
					}else{
						$data = $stm->fetchAll(PDO::FETCH_ASSOC);
					}
	
					if(is_array($data) && count($data) >0){
						return $data;
					}else{
						return true;
					}
				}
				break;
		}
		return false;
		
	}

}
	