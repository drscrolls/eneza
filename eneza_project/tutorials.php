<?php


include 'dbconnect.php';
ob_start();
session_start();



$_SESSION['page']='Tutorials';

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Tutorials | Home</title>
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
							<div class="col-md-10"></div>

							<div class="col-md-2">
								<button name="add_button" id="add_button" style="float: right;" class="btn btn-success">Add</button>
							</div>
						</div>


					<table width="100%">
						<th width="70%">Tutorial</th>
						<th align="center"><center>Action</center></th>
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
  
  <div class="modal-content" style="background: white;height: 350px;" id="desktop-modal-bg" hidden>

		  <form method="post" id="api_crud_form" name="api_crud_form">
		  		<div class="modal-header">
		  			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  			<h4 class="modal-title" id="modal-title"></h4>
		  		</div>
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

		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label>Tutorial</label>
		  				<textarea class="form-control" name="tutorial" id="tutorial" required rows="3" cols="30"></textarea>
		  			</div>

		  			
		  			<div class="col-md-12 row" style="margin-top: 30px;">
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-success" style="width: 90%;" id="addTutorial" type="submit"></button>
		  				</div>
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-default" style="width: 90%;" id="closeModal">Close</button>
		  				</div>
		  			</div>
		  </form>	
  </div>

</div>






<!-- The apiupdateModal -->
<div id="apiupdateModal" class="modal">
  
  <div class="modal-content" style="background: white;height: 350px;" id="desktop-modal-bg" hidden>

		  <form method="post" id="api_update_form" name="api_update_form">
		  		<div class="modal-header">
		  			<button type="button" class="close" id="editid" hidden data-dismiss="modal">&times;</button>
		  			<h4 class="modal-title" id="editmodal-title">Edit tutorial</h4>
		  		</div>
				<br/>
				<div class="col-md-12">
		  				<label>Subject</label>
		  				<select id="editsubject" name="editsubject" class="form-control">

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

		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label>Tutorial</label>
		  				<textarea class="form-control" name="edittutorial" id="edittutorial" required rows="3" cols="30"></textarea>
		  			</div>

		  			
		  			<div class="col-md-12 row" style="margin-top: 30px;">
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-success" style="width: 90%;" id="editTutorial" type="submit">Update</button>
		  				</div>
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-default" style="width: 90%;" type="button" id="editcloseModal">Close</button>
		  				</div>
		  			</div>
		  </form>	
  </div>

</div>




<script type="text/javascript">
function fetch_data(){

			$.ajax({
				url:"fetch.php",
				success:function(data)
				{
					$('#tbody').html(data);
				}
			})
		}
function update(id,tutorial,subject){
	document.getElementById("apiupdateModal").style.display='inherit';
	document.getElementById("edittutorial").value=tutorial;
	document.getElementById("editid").title=id;
	document.getElementById("editsubject").selectedIndex=subject;
}

function deleteTutorial(id,tutorial,subject){
	var answer=confirm("Are you sure you want to delete '"+tutorial+"'?");
	if(answer){


			$.ajax({
				url: "myaction.php",
				method: "POST",
				data: {action: 'delete',id:id}
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
		var addbtn=document.getElementById('addTutorial');

		modalTitle.innerHTML="Add Tutorial";
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
	document.getElementById('api_crud_form').onsubmit=function(event){
		event.preventDefault();
		if(document.getElementById('subject').selectedIndex <=0)
		{
			alert("Please choose a subject");
		}
		else{
			var subject=document.getElementById('subject').value;
			var tutorial=document.getElementById('tutorial').value;
			
			$.ajax({
				url: "myaction.php",
				method: "POST",
				data: {action: 'insert',subject:subject,tutorial:tutorial}
			}).done(function (data) {
					// alert(data);
					// console.log("Data = "+data);
					fetch_data();
					$('#api_crud_form')[0].reset();
					closebtn.onclick();
					
				});	



		}
	}





// Update action
	document.getElementById('api_update_form').onsubmit=function(event){
		event.preventDefault();
		
			var subject=document.getElementById('editsubject').value;
			var tutorial=document.getElementById('edittutorial').value;
			var editId=document.getElementById('editid').title;
			
			$.ajax({
				url: "myaction.php",
				method: "POST",
				data: {action: 'update',subject:subject,tutorial:tutorial,id: editId}
			}).done(function (data) {
					// alert(data);
					// console.log("Data = "+data);
					fetch_data();
					$('#api_update_form')[0].reset();
					editclosebtn.onclick();
					
				});	



	}


</script>

