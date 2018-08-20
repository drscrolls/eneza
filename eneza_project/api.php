<?php

/**
* API CLASS
*/
class Api
{
	private $connect='';
	function __construct(){
		$this->database_connection();
	}
	function database_connection(){
		$this->connect=new PDO("mysql:host=localhost;dbname=eneza_db","root","");
	}

	function fetch_all(){
		$query="SELECT * FROM tutorials ORDER BY id";
		$statement=$this->connect->prepare($query);
		if($statement->execute()){
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
				{
					$data[]=$row;
				}
				
				return $data;
		}
	}

	function fetch_quizzes(){
		$query="SELECT * FROM quizzes ORDER BY id";
		$statement=$this->connect->prepare($query);
		if($statement->execute()){
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
				{
					$data[]=$row;
				}
				
				return $data;
		}
	}

	function fetch_subjects(){
		$query="SELECT * FROM subjects ORDER BY id";
		$statement=$this->connect->prepare($query);
		if($statement->execute()){
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
				{
					$data[]=$row;
				}
				
				return $data;
		}
	}

	function fetch_courses(){
		$query="SELECT * FROM courses ORDER BY id";
		$statement=$this->connect->prepare($query);
		if($statement->execute()){
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
				{
					$data[]=$row;
				}
				
				return $data;
		}
	}
	function insert(){
		if(isset($_POST['tutorial'])){
			$form_data= array(
				':tutorial' =>$_POST['tutorial'],
				':subject' =>$_POST['subject'] );

			$query="INSERT INTO tutorials (tutorial,subject) VALUES
					(:tutorial, :subject)";

			$statement=$this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[]=array(
					'success' => '1'
				);
			}
			else{
				 $data[]=array(
					'success' => '0'
				);
			}
	}
		else{
			 $data[]=array(
				'success' => '0'
			);
		}
		return $data;
	}


}
?>