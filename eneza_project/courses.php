<?php


include 'dbconnect.php';
ob_start();
session_start();



$_SESSION['page']='Courses';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Courses | Home</title>
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
							<div class="col-md-10"><!-- <h4>Courses</h4> --></div>

							<div class="col-md-2">
								<button name="add_button" id="add_button" style="float: right;" class="btn btn-success">Add</button>
							</div>
						</div>


					<table width="100%">
						<th colspan="3" align="center">Courses</th>
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
  
  <div class="modal-content" style="background: white;height: 250px;" id="desktop-modal-bg" hidden>

		  <form method="post" id="api_crud_form" name="api_crud_form">
		  		<div class="modal-header">
		  			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  			<h4 class="modal-title" id="modal-title"></h4>
		  		</div>
				<br/> 
				

		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label>Course name <small>*</small> </label>
		  				<input type="text" class="form-control" required name="course" id="course"/>
		  			</div>
		  			
		  		
		  			
		  			<div class="col-md-12 row" style="margin-top: 30px;">
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-success" style="width: 90%;" id="addCourses" onclick="insertCourse()" type="submit">Add</button>
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
  
  <div class="modal-content" style="background: white;height: 250px;" id="desktop-modal-bg" hidden>

		  <form method="post" id="api_update_form" name="api_update_form">
		  		<div class="modal-header">
		  			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  			<h4 class="modal-title" id="emodal-title">Edit Course</h4>
		  		</div>
				<br/> 
				

		  			<div class="col-md-12" style="margin-top: 2px;">
		  				<label>Course name <small>*</small> </label>
		  				<input type="text" class="form-control" required name="ecourse" id="ecourse"/>
		  			</div>
		  			
		  		
		  			
		  			<div class="col-md-12 row" style="margin-top: 30px;">
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-success" style="width: 90%;" id="updateQuizbtn" onclick="processupdateCourse()">Update</button>
		  				</div>
		  				<div class="col-md-6" align="center">
		  					<button class="btn btn-default" style="width: 90%;" type="button" id="closeModal" onclick="document.getElementById('apiupdateModal').style.display='none';">Close</button>
		  				</div>
		  			</div>
		  </form>	
  </div>

</div>







<script type="text/javascript">
function fetch_data(){

			$.ajax({
				url:"fetch_courses.php",
				success:function(data)
				{
					$('#tbody').html(data);
				}
			})
		}

function update(id,course){
	document.getElementById("apiupdateModal").style.display='inherit';
	document.getElementById("emodal-title").title=id;
	document.getElementById("ecourse").value=course;


}






$(document).ready(function (){

		fetch_data();

		
	});


var add_button=document.getElementById('add_button');
	add_button.onclick=function (){
		var addModal=document.getElementById('apicrudModal');
		var modalTitle=document.getElementById('modal-title');
		var addbtn=document.getElementById('addCourses');

		modalTitle.innerHTML="Add Course";
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
	function insertCourse(){
		event.preventDefault();
		// alert("Start insert quiz");
			
			var course=document.getElementById('course').value;

				$.ajax({
					url: "myaction.php",
					method: "POST",
					data: {
						action: 'insert course',
						course:course
					}
				}).done(function (data) {
						// alert(data);
						// console.log("Data = "+data);
						fetch_data();
						$('#api_crud_form')[0].reset();
						document.getElementById("apicrudModal").style.display='none';
					});	


		}
	





// Update action
	function processupdateCourse(){
		event.preventDefault();
		// alert("Update start");

			var s_id=document.getElementById('emodal-title').title;
			var course=document.getElementById('ecourse').value;
				// alert("s_id="+s_id);
				

				$.ajax({
					url: "myaction.php",
					method: "POST",
					data: {
						action: 'update course',
						id:s_id,
						course:course
					}
				}).done(function (data) {
						// alert(data);
						// console.log("Data = "+data);
						fetch_data();
						$('#api_crud_form')[0].reset();
						document.getElementById("apiupdateModal").style.display='none';
					});	


		}





function deleteCourse(id,course){
	var answer=confirm("Are you sure you want to delete '"+course+"'?");
	if(answer){


			$.ajax({
				url: "myaction.php",
				method: "POST",
				data: {action: 'delete course',id:id}
			}).done(function (data) {
					// alert(data);
					// console.log("Data = "+data);
					fetch_data();
					
				});	

	}else{
		return;
	}
}



</script>

