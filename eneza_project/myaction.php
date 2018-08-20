<?php
include "dbconnect.php";

if(isset($_POST["action"]))
{
	if($_POST["action"]=='insert')
	{	
		$tutorial=$_POST['tutorial'];
		$subject=$_POST['subject'];
		// echo "Yes!";
		$query="INSERT INTO tutorials (tutorial,subject_id) VALUES
					('$tutorial', '$subject')";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Inserted!";
		}

	}


	if($_POST["action"]=='update')
	{	
		$tutorial=$_POST['tutorial'];
		$subject=$_POST['subject'];
		$e_id=$_POST['id'];
		// echo "Yes!";
		$query="UPDATE `tutorials` SET `tutorial` = '$tutorial', `subject_id` = '$subject' WHERE `id` = $e_id;";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Updated!";
		}



	}

	if($_POST["action"]=='delete')
	{	
			
		$d_id=$_POST['id'];
		// echo "Yes!";
		$query="DELETE FROM `tutorials` WHERE `id` = $d_id;";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Deleted!";
		}



	}









//  ---      Q U I Z  


	if($_POST["action"]=='insert quiz')
	{	
		$question=$_POST['question'];
		$option1=$_POST['option1'];
		$option2=$_POST['option2'];
		$option3=$_POST['option3'];
		$option4=$_POST['option4'];
		$correctoption=$_POST['correctoption'];
		$subject=$_POST['subject'];
		// echo "Yes!";
		$query="INSERT INTO quizzes (question,option1,option2,option3,option4,correctoption,subject_id) VALUES
					('$question', '$option1', '$option2', '$option3', '$option4', '$correctoption', '$subject')";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Inserted!";
		}

	}


	if($_POST["action"]=='update quiz')
	{	
		$q_id=$_POST['id'];
		$question=$_POST['question'];
		$option1=$_POST['option1'];
		$option2=$_POST['option2'];
		$option3=$_POST['option3'];
		$option4=$_POST['option4'];
		$correctoption=$_POST['correctoption'];
		$subject=$_POST['subject'];
		// echo "Yes!";
		
		$query="UPDATE `quizzes` SET `question` = '$question',
		 `option1` = '$option1',
		  `option2` = '$option2',
		   `option3` = '$option3',
		    `option4` = '$option4',
		     `correctOption` = '$correctoption',
		       `subject_id` = '$subject' WHERE `id` = $q_id;";

		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Updated!";
		}

	}

	
}



	if($_POST["action"]=='delete quiz')
	{	
			
		$d_id=$_POST['id'];
		// echo "Yes!";
		$query="DELETE FROM `quizzes` WHERE `id` = $d_id;";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Deleted!";
		}



	}














//  ---     S U B J E C T S 


	if($_POST["action"]=='insert subject')
	{	
		$subject=$_POST['subject'];
		$course_id=$_POST['course'];
		// echo "Yes!";
		$query="INSERT INTO subjects (subject,course_id) VALUES
					('$subject', '$course_id')";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Inserted!";
		}

	}


	if($_POST["action"]=='update subject')
	{	
		$s_id=$_POST['id'];
		$subject=$_POST['subject'];
		$course=$_POST['course'];
		// echo "Yes!";
		
		$query="UPDATE `subjects` SET `subject` = '$subject',`course_id` = '$course' WHERE `id` = $s_id;";

		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Updated!";
		}

	}

	


	if($_POST["action"]=='delete subject')
	{	
			
		$d_id=$_POST['id'];
		$query="DELETE FROM `subjects` WHERE `id` = $d_id;";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Deleted!";
		}



	}











//  ---     C O U R S E S 


	if($_POST["action"]=='insert course')
	{	
		$course=$_POST['course'];
		// echo "Yes!";
		$query="INSERT INTO courses (course) VALUES
					('$course')";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Inserted!";
		}

	}


	if($_POST["action"]=='update course')
	{	
		$c_id=$_POST['id'];
		$course=$_POST['course'];
		// echo "Yes!";
		
		$query="UPDATE `courses` SET `course` = '$course' WHERE `id` = $c_id;";

		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Updated!";
		}

	}

	


	if($_POST["action"]=='delete course')
	{	
			
		$c_id=$_POST['id'];
		$query="DELETE FROM `courses` WHERE `id` = $c_id;";
		$res=mysqli_query($conn,$query);
		if(!$res)
		{
			echo "Error:".mysqli_error($conn);
		}
		else{
			echo "Deleted!";
		}



	}

?>