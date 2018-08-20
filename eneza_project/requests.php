<?php

include 'api.php';

$api_object = new API();

if($_GET["action"] == 'fetch_all')
{
	$data=$api_object->fetch_all();
}

if($_GET["action"] == 'insert')
{
	$data=$api_object->insert();
}


if($_GET["action"] == 'fetch_quizzes')
{
	$data=$api_object->fetch_quizzes();
}


if($_GET["action"] == 'fetch_subjects')
{
	$data=$api_object->fetch_subjects();
}


if($_GET["action"] == 'fetch_courses')
{
	$data=$api_object->fetch_courses();
}


echo json_encode($data); 
?>