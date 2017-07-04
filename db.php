<?php
class DB {
	private $host = 'localhost';
	private $user = 'admin';
	private $password = 'admin';
	private $database = 'contacts';
	private $mysqli;

	public function __construct(){
		try{
			//object oriented style (recommended)
			$this->mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);

			//Output any connection error
			if ($this->mysqli->connect_error) {
			    die('Error : ('. $this->mysqli->connect_errno .') '. $this->mysqli->connect_error);
			}
		}
	   	catch(Exception $e) {
	   		echo $e->getMessage();
	   	}

	}


	public function getTableData($what, $table , $match , $with){
		$checkParameter = array($what);
		$whereParameter = array($with => $match);
		$order = array($with , 'DESC');
		$count = $this->findall($table , $checkParameter , $whereParameter ,$order);
		$datas = $count->fetch_object();
		return $datas->$what;
	}


	public function save($table,$parameter)	{
		$qry = "insert into $table set ";
		$qry .= $this->generateQuery($parameter);
		$this->mysqli->query($qry);
		return $this->mysqli->insert_id;
	}


	public function update($table,$parameter,$whereParameter)	{
		$qry = "update $table set ";
		$qry .= $this->generateQuery($parameter);
		$qry .=" where ";
		$qry .= $this->generateQuery($whereParameter);
		$result = $mysqli->query($qry);
		return $result;
	}




	public function findAll($table,$parameter,$whereParameter,$orderParameter)	{
      if($whereParameter != null){
		$qry = "select ";
		$qry .= $this->generateSimpleString($parameter);
		$qry .=" from $table where ";
		$qry .= $this->generateQuerywithWhere($whereParameter);
		$qry .= " order by ".$orderParameter[0]." ".$orderParameter[1];
		$result = $this->mysqli->query($qry);
	  }
	   else{
		$qry = "select ";
		$qry .= $this->generateSimpleString($parameter);
		$qry .=" from $table ";
		$qry .= " order by ".$orderParameter[0]." ".$orderParameter[1];
		$result = $this->mysqli->query($qry);

	  }
	  while($row = $result->fetch_object()) {
	  	$returnArray[]= $row; 
	  }

	  return $returnArray;
	}


	public function findOne($table,$parameter,$whereParameter,$orderParameter)	{
      if($whereParameter != null){
		$qry = "select ";
		$qry .= $this->generateSimpleString($parameter);
		$qry .=" from $table where ";
		$qry .= $this->generateQuerywithWhere($whereParameter);
		$qry .= " order by ".$orderParameter[0]." ".$orderParameter[1];
		$result = $this->mysqli->query($qry);
	  }
	   else{
		$qry = "select ";
		$qry .= $this->generateSimpleString($parameter);
		$qry .=" from $table ";
		$qry .= " order by ".$orderParameter[0]." ".$orderParameter[1];
		$result = $this->mysqli->query($qry);

	  }
	  $row = $result->fetch_object();

	  return $row;
	}




	public function delete($table,$whereParameter){
      if($whereParameter != null){
		$qry = "delete ";
		$qry .="from $table where ";
		$qry .= $this->generateQuerywithWhere($whereParameter);
		$result = $this->mysqli->query($qry);
	  }
	   else{
		$qry = "delete ";
		$qry .=" from $table ";
		$result = $this->mysqli->query($qry);
	  }
	  return $result;
	}

//Code for Generating Query String
	function generateQuery($parameter){
		$num = count($parameter);
		$i=1;
	    foreach($parameter as $key => $value):
				if($i==$num){
					$qry .= $key." = '".$value."'";
				}else{
				$qry .= $key." = '".$value."' , ";
				}
		$i++;
		endforeach;
		return $qry;
	}
//End of code genrating Query String

//Code for Generating Select Query String with where
	function generateQuerywithWhere($parameter){
		$num = count($parameter);
		$i=1;
	    foreach($parameter as $key => $value):
				if($i==$num){
					@$qry .= $key."='".$value."'";
				}else{
				@$qry .= $key."='".$value."' and ";
				}
		$i++;
		endforeach;
		return $qry;
	}
//End Code for Generating Select Query String with where


//Code for Generating Simple Query String for select
	function generateSimpleString($parameter){
		$num = count($parameter);
		$i=1;
	    foreach($parameter as $value):
				if($i==$num){
					@$qry .= $value;
				}else{
				$qry .= $value." , ";
				}
		$i++;
		endforeach;
		return $qry;
	}
//End of code genrating Query String	
}
