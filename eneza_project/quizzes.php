<?php


include 'dbconnect.php';
ob_start();
session_start();



$_SESSION['page']='Quizzes';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Quizzes | Home</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link rel="shortcut icon" href="images/fav.png" />	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script src="js/jquery-2.2.4.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-top-nav-script---->
		
		<style type="text/css">

th{border-bottom: 2px solid #777;}




/*MODAL BOXES*/
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 23; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0,0.5); /* Fallback color */
    /*background-color: rgba(255,255,255,0.98); /* Black w/ opacity */*/
}

/* Modal Content/Box */
.modal-content {	
	display: inherit;
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid transparent;
    width: 50%;/* Could be more or less, depending on screen size */
    animation-name: animatetop;
    animation-duration: 0.4s;
    border-radius: 10px;
}

/* Add Animation */
@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
		</style>
</head>
	<body>


		<!-- Header -->
		<?php include 'header.html';?>
		
		<!----team-members---->
			<div class="team-members">
				<div class="container">
						
						<div class="col-md-12" style="margin-bottom: 10px;">
							<div class="col-md-10"><!-- <h4>Quizzes</h4> --></div>

							<div class="col-md-2">
								<button name="add_button" id="add_button" style="float: right;" class="btn btn-success">Add</button>
							</div>
						</div>


					<table width="100%">
						<th align="center">Quizzes</th>
						<tbody id="tbody">

						</tbody>	
					</table>





				</div>
			</div>
			
	</body>
</html>


<script type="text/javascript">
	

</script>




<!-- The apicrudModal -->
<div id="apicrudModal" class="modal">
  
  <div class="modal-content" style="background: white;height: 750px;" id="desktop-modal-bg" hidden>

		  <form method="post" id="api_crud_form" name="api_crud_form">
		  		<div class="modal-header">
		  			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  			<h4 class="modal-title" id="modal-title"></h4>
		  		</div>
				<br/> 
				

		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label>Question <small>*</small> </label>
		  				<textarea class="form-control" name="question" id="question" required rows="3" cols="30"></textarea>
		  			</div>
		  			
		  			<br/>
		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label style="width: 100%;">Option 1 <small>*</small> <div style="float: right;"><font style="float: right;color: #999;font-size: 12px; right: 1%;cursor: pointer;"   onclick="
		  				checkCorrectAnswer(document.getElementById('option1chk'))"><input type="checkbox"  onclick="
		  				checkCorrectAnswer(this)"  name="option1chk" id="option1chk"> Correct Answer</font></div></label>
		  				<input type="text" class="form-control" name="option1" required id="option1">
		  			</div>


		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label style="width: 100%;">Option 2 <small>*</small> <div style="float: right;"><font style="float: right;color: #999;font-size: 12px; right: 1%;cursor: pointer;"   onclick="
		  				checkCorrectAnswer(document.getElementById('option2chk'))"><input type="checkbox"  onclick="
		  				checkCorrectAnswer(this)" name="option2chk" id="option2chk"> Correct Answer</font></div></label>
		  				<input type="text" class="form-control" name="option2" id="option2" required>
		  			</div>


		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label style="width: 100%;">Option 3 <small>(optional)</small> <div style="float: right;"><font style="float: right;color: #999;font-size: 12px; right: 1%;cursor: pointer;"   onclick="
		  				checkCorrectAnswer(document.getElementById('option3chk'))"><input type="checkbox"  onclick="
		  				checkCorrectAnswer(this)"  name="option3chk" id="option3chk"> Correct Answer</font></div></label>
		  				<input type="text" class="form-control" name="option3" id="option3">
		  			</div>


		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label style="width: 100%;">Option 4 <small>(optional)</small> <div style="float: right;"><font style="float: right;color: #999;font-size: 12px; right: 1%;cursor: pointer;"  onclick="
		  				checkCorrectAnswer(document.getElementById('option4chk'))"><input type="checkbox" onclick="
		  				checkCorrectAnswer(this)" name="option4chk" id="option4chk"> Correct Answer</font></div></label>
		  				<input type="text" class="form-control" name="option4" id="option4">
		  			</div>
		  			<br/>
		  			<br/>
		  			<br/>
		  			<div class="col-md-12">
		  				<label>Subject</label>
		  				<select id="subject" name="subject" class="form-control">

		  					<option value="" selected> -Choose subject- </option>
		  					<?php
		  						$query="SELECT * FROM subjects";
		  						$res=mysqli_query($conn,$query);

		  						if(mysqli_num_rows($res)>0){
		  							while($row=mysqli_fetch_array($res)){
				  					?>
				  					<option value="<?=$row['id']; ?>"><?=$row['subject'];?></option>
				  					<?php
		  							}
		  						}
		  					?>
		  				</select>
		  			</div>
		  			
		  			<div class="col-md-12 row" style="margin-top: 30px;">
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-success" style="width: 90%;" id="addQuizzes" onclick="insertQuiz(document.getElementById('modal-title').title)">Add</button>
		  				</div>
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-default" style="width: 90%;" id="closeModal" type="button" onclick="document.getElementById('apicrudModal').style.display='none';" >Close</button>
		  				</div>
		  			</div>
		  </form>	
  </div>

</div>







<!-- The apiupdateModal -->
<div id="apiupdateModal" class="modal">
  
  <div class="modal-content" style="background: white;height: 750px;" id="desktop-modal-bg" hidden>

		  <form method="post" id="api_update_form" name="api_update_form">
		  		<div class="modal-header">
		  			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  			<h4 class="modal-title" id="emodal-title">Edit Quiz</h4>
		  		</div>
				<br/> 
				

		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label>Question <small>*</small> </label>
		  				<textarea class="form-control" name="equestion" id="equestion" required rows="3" cols="30"></textarea>
		  			</div>
		  			
		  			<br/>
		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label style="width: 100%;">Option 1 <small>*</small> <div style="float: right;"><font style="float: right;color: #999;font-size: 12px; right: 1%;cursor: pointer;"   onclick="
		  				echeckCorrectAnswer(document.getElementById('eoption1chk'))"><input type="checkbox"  onclick="
		  				echeckCorrectAnswer(this)"  name="eoption1chk" id="eoption1chk"> Correct Answer</font></div></label>
		  				<input type="text" class="form-control" name="eoption1" required id="eoption1">
		  			</div>


		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label style="width: 100%;">Option 2 <small>*</small> <div style="float: right;"><font style="float: right;color: #999;font-size: 12px; right: 1%;cursor: pointer;"   onclick="
		  				echeckCorrectAnswer(document.getElementById('eoption2chk'))"><input type="checkbox"  onclick="
		  				echeckCorrectAnswer(this)" name="eoption2chk" id="eoption2chk"> Correct Answer</font></div></label>
		  				<input type="text" class="form-control" name="eoption2" id="eoption2" required>
		  			</div>


		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label style="width: 100%;">Option 3 <small>(optional)</small> <div style="float: right;"><font style="float: right;color: #999;font-size: 12px; right: 1%;cursor: pointer;"   onclick="
		  				echeckCorrectAnswer(document.getElementById('eoption3chk'))"><input type="checkbox"  onclick="
		  				echeckCorrectAnswer(this)"  name="eoption3chk" id="eoption3chk"> Correct Answer</font></div></label>
		  				<input type="text" class="form-control" name="eoption3" id="eoption3">
		  			</div>


		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label style="width: 100%;">Option 4 <small>(optional)</small> <div style="float: right;"><font style="float: right;color: #999;font-size: 12px; right: 1%;cursor: pointer;"  onclick="
		  				echeckCorrectAnswer(document.getElementById('eoption4chk'))"><input type="checkbox" onclick="
		  				echeckCorrectAnswer(this)" name="eoption4chk" id="eoption4chk"> Correct Answer</font></div></label>
		  				<input type="text" class="form-control" name="eoption4" id="eoption4">
		  			</div>
		  			<br/>
		  			<br/>
		  			<br/>
		  			<div class="col-md-12">
		  				<label>Subject</label>
		  				<select id="esubject" name="esubject" class="form-control">

		  					<option value="" selected> -Choose subject- </option>
		  					<?php
		  						$query="SELECT * FROM subjects";
		  						$res=mysqli_query($conn,$query);

		  						if(mysqli_num_rows($res)>0){
		  							while($row=mysqli_fetch_array($res)){
				  					?>
				  					<option value="<?=$row['id']; ?>"><?=$row['subject'];?></option>
				  					<?php
		  							}
		  						}
		  					?>
		  				</select>
		  			</div>
		  			
		  			<div class="col-md-12 row" style="margin-top: 30px;">
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-success" style="width: 90%;" id="updateQuizbtn" onclick="processupdateQuiz()">Update</button>
		  				</div>
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-default" style="width: 90%;" type="button" id="closeModal" onclick="document.getElementById('apiupdateModal').style.display='none';">Close</button>
		  				</div>
		  			</div>
		  </form>	
  </div>

</div>







<script type="text/javascript">
function checkCorrectAnswer(x){
	var correctoption=x.id;
	var option1=document.getElementById('option1chk');
	var option2=document.getElementById('option2chk');
	var option3=document.getElementById('option3chk');
	var option4=document.getElementById('option4chk');

	switch(correctoption){
		case option1.id:
			option2.checked=false;
			option3.checked=false;
			option4.checked=false;
		;break;
		case option2.id:
			option1.checked=false;
			option3.checked=false;
			option4.checked=false;
		;break;
		case option3.id:
			option2.checked=false;
			option1.checked=false;
			option4.checked=false;
		;break;
		case option4.id:
			option2.checked=false;
			option3.checked=false;
			option1.checked=false;
		;break;
	}
}
function echeckCorrectAnswer(x){
	var correctoption=x.id;
	var option1=document.getElementById('eoption1chk');
	var option2=document.getElementById('eoption2chk');
	var option3=document.getElementById('eoption3chk');
	var option4=document.getElementById('eoption4chk');

	switch(correctoption){
		case option1.id:
			option2.checked=false;
			option3.checked=false;
			option4.checked=false;
		;break;
		case option2.id:
			option1.checked=false;
			option3.checked=false;
			option4.checked=false;
		;break;
		case option3.id:
			option2.checked=false;
			option1.checked=false;
			option4.checked=false;
		;break;
		case option4.id:
			option2.checked=false;
			option3.checked=false;
			option1.checked=false;
		;break;
	}
}
function fetch_data(){

			$.ajax({
				url:"fetch_quiz.php",
				success:function(data)
				{
					$('#tbody').html(data);
				}
			})
		}

function update(id,question,option1,option2,option3,option4,correctoption,subject){
	document.getElementById("apiupdateModal").style.display='inherit';
	document.getElementById("emodal-title").title=id;
	document.getElementById("equestion").value=question;
	document.getElementById("eoption1").value=option1;
	document.getElementById("eoption2").value=option2;
	document.getElementById("eoption3").value=option3;
	document.getElementById("eoption4").value=option4;
	document.getElementById("esubject").selectedIndex=subject;


	switch(correctoption)
	{
		case option1:
			document.getElementById("eoption1chk").checked=true;
			document.getElementById("eoption2chk").checked=false;
			document.getElementById("eoption3chk").checked=false;
			document.getElementById("eoption4chk").checked=false;
			;break;


		case option2:
			document.getElementById("eoption1chk").checked=false;
			document.getElementById("eoption2chk").checked=true;
			document.getElementById("eoption3chk").checked=false;
			document.getElementById("eoption4chk").checked=false;
			;break;



		case option3:
			document.getElementById("eoption1chk").checked=false;
			document.getElementById("eoption2chk").checked=false;
			document.getElementById("eoption3chk").checked=true;
			document.getElementById("eoption4chk").checked=false;
			;break;


		case option4:
			document.getElementById("eoption1chk").checked=false;
			document.getElementById("eoption2chk").checked=false;
			document.getElementById("eoption3chk").checked=false;
			document.getElementById("eoption4chk").checked=true;
			;break;
	}

}






function deleteQuiz(id,question,subject){
	var answer=confirm("Are you sure you want to delete '"+question+"'?");
	if(answer){


			$.ajax({
				url: "myaction.php",
				method: "POST",
				data: {action: 'delete quiz',id:id}
			}).done(function (data) {
					// alert(data);
					// console.log("Data = "+data);
					fetch_data();
					
				});	

	}else{
		return;
	}
}


$(document).ready(function (){

		fetch_data();

		
	});


var add_button=document.getElementById('add_button');
	add_button.onclick=function (){
		var addModal=document.getElementById('apicrudModal');
		var modalTitle=document.getElementById('modal-title');
		var addbtn=document.getElementById('addQuizzes');

		modalTitle.innerHTML="Add Quizzes";
		addbtn.innerHTML="Add";
		addModal.style.display="inherit";
	}

var closebtn=document.getElementById('closeModal');
	closebtn.onclick=function (){
		var addModal=document.getElementById('apicrudModal');
		addModal.style.display="none";
	}
var editclosebtn=document.getElementById('editcloseModal');
	editclosebtn.onclick=function (){
		var updateModal=document.getElementById('apiupdateModal');
		updateModal.style.display="none";
	}






// Insert action
	function insertQuiz(id){
		event.preventDefault();
		// alert("Start insert quiz");
		if(document.getElementById('subject').selectedIndex <=0)
		{
			alert("Please choose a subject");
		}
		else{
			var q_id=document.getElementById('modal-title').title;
			var question=document.getElementById('question').value;
			var option1=document.getElementById('option1').value;
			var option2=document.getElementById('option2').value;
			var option3=document.getElementById('option3').value;
			var option4=document.getElementById('option4').value;
			var subject=document.getElementById('subject').value;

			var option1chk=document.getElementById('option1chk').checked;
			var option2chk=document.getElementById('option2chk').checked;
			var option3chk=document.getElementById('option3chk').checked;
			var option4chk=document.getElementById('option4chk').checked;

			if(option1chk==true)
			{
				var correctoption=option1;	
			}
			if(option2chk==true)
			{
				var correctoption=option2;	
			}
			if(option3chk==true)
			{
				var correctoption=option3;	
			}
			if(option4chk==true)
			{
				var correctoption=option4;	
			}
			
			if(option4chk==false && option3chk==false && option2chk==false && option1chk==false)
			{
				alert("Please choose the correct answer");
				
			}else{
				// alert("About to process");
				$.ajax({
					url: "myaction.php",
					method: "POST",
					data: {
						action: 'insert quiz',
						id:q_id,
						question:question,
						option1:option1,
						option2:option2,
						option3:option3,
						option4:option4,
						correctoption:correctoption,
						subject:subject
					}
				}).done(function (data) {
						// alert(data);
						// console.log("Data = "+data);
						fetch_data();
						$('#api_crud_form')[0].reset();
						document.getElementById("apicrudModal").style.display='none';
					});	


			}
		}
	}







// Update action
	function processupdateQuiz(){
		event.preventDefault();
		// alert("Update start");

		if(document.getElementById('esubject').selectedIndex <=0)
		{
			alert("Please choose a subject");
		}
		else{
			var q_id=document.getElementById('emodal-title').title;
			var question=document.getElementById('equestion').value;
			var option1=document.getElementById('eoption1').value;
			var option2=document.getElementById('eoption2').value;
			var option3=document.getElementById('eoption3').value;
			var option4=document.getElementById('eoption4').value;
			var subject=document.getElementById('esubject').value;

			var option1chk=document.getElementById('eoption1chk').checked;
			var option2chk=document.getElementById('eoption2chk').checked;
			var option3chk=document.getElementById('eoption3chk').checked;
			var option4chk=document.getElementById('eoption4chk').checked;

			if(option1chk==true)
			{
				var correctoption=option1;	
			}
			if(option2chk==true)
			{
				var correctoption=option2;	
			}
			if(option3chk==true)
			{
				var correctoption=option3;	
			}
			if(option4chk==true)
			{
				var correctoption=option4;	
			}
			
			if(option4chk==false && option3chk==false && option2chk==false && option1chk==false)
			{
				alert("Please choose the correct answer");
				
			}else{
				// alert("About to process");
				$.ajax({
					url: "myaction.php",
					method: "POST",
					data: {
						action: 'update quiz',
						id:q_id,
						question:question,
						option1:option1,
						option2:option2,
						option3:option3,
						option4:option4,
						correctoption:correctoption,
						subject:subject
					}
				}).done(function (data) {
						// alert(data);
						// console.log("Data = "+data);
						fetch_data();
						$('#api_crud_form')[0].reset();
						document.getElementById("apiupdateModal").style.display='none';
					});	


			}
		}
	}





// // Update action
// 	document.getElementById('api_update_form').onsubmit=function(event){
// 		event.preventDefault();
// 			alert("Starting update");
// 			var subject=document.getElementById('editsubject').value;
// 			var Quizzes=document.getElementById('editQuizzes').value;
// 			var editId=document.getElementById('editid').title;
			
// 			$.ajax({
// 				url: "myaction.php",
// 				method: "POST",
// 				data: {action: 'update',subject:subject,Quizzes:Quizzes,id: editId}
// 			}).done(function (data) {
// 					// alert(data);
// 					// console.log("Data = "+data);
// 					fetch_data();
// 					$('#api_update_form')[0].reset();
// 					editclosebtn.onclick();
					
// 				});	



// 	}



// // Update action
// 	document.getElementById('updateQuizbtn').onclick=function(){
// 		alert("Update button clicked");
// 	}

</script>

