<?php


include 'dbconnect.php';
ob_start();
session_start();

$_SESSION['s']=$_REQUEST[s];
$s=$_SESSION['s'];



$_SESSION['Tutorials']= array();

	$query="SELECT * FROM tutorials WHERE subject_id=".$s;
	$res=mysqli_query($conn,$query);
	$count=0;
	if(mysqli_num_rows($res)>0){

		while($row=mysqli_fetch_array($res)){
			$tutorial=$row['tutorial'];
			$_SESSION['Tutorials'][$count]=$row['id'];
			$count++;
		}
	}
$first_t_id=$_SESSION['Tutorials'][0];
$index=0;







$qcount=0;
$_SESSION['Quizzes']= array();

	$query="SELECT * FROM quizzes WHERE subject_id=".$s;
	$res=mysqli_query($conn,$query);
	$count=0;
	if(mysqli_num_rows($res)>0){

		while($row=mysqli_fetch_array($res)){
			$question=$row['question'];
			$_SESSION['Quizzes'][$qcount]=$row['id'];
			$qcount++;
		}
	}
$first_q_id=$_SESSION['Quizzes'][0];
$qindex=0;






?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Eneza Education | Home</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link rel="shortcut icon" href="images/fav.png" />	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
</head>
	<body>
		<!-----start-container----->
		<!-----header-section------>
		<div class="header-section">
			<!----- start-header---->
			<div id="home" class="header">
				<div class="container">
					<div class="top-header">
						<div class="logo">
							<a href="./"><h2 style="font-size: 21px;font-family: Tahoma,Lato;color: #333;">Eneza Education</h2></a>
						</div>
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li class="active"><a href="#home" class="scroll">Home </a></li>
								<li class="page-scroll"><a href="tutorials.php">Tutorials</a></li>
								<li class="page-scroll"><a href="quizzes.php">Quizzes</a></li>
								<li class="page-scroll"><a href="subjects.php">Subjects </a></li>
								<li class="page-scroll"><a href="courses.php">Courses</a></li>
							</ul>
							<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!----- //End-header---->
			<!----- start-slider---->
			<!----start-slider-script---->
			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!----//End-slider-script---->
			<!-- Slideshow 4 -->
			    <div  id="top" class="callbacks_container">
			      <ul class="rslides" id="slider4">


			        <li>
			          <!-- <img src="images/slide.jpg" alt=""> -->
			          <div style="height: 450px;width: 100%"></div>
			          <div class="caption text-center" style="color: #555;">
			          	

			          		<h1><span style="font-weight: bold;"></span></h1>
			          		<h2 style="font-size: 24px;">What will you like to do?</b></h2>
			          		
			          		<div align="center" class="col-md-12" style="margin:0.2em">

	          			<?php


          					$checkTquery="SELECT * FROM tutorials WHERE subject_id=".$s;
	  						$chkTres=mysqli_query($conn,$checkTquery);
	  						if(!$chkTres){
	  							echo "Error:".mysqli_error($conn);
	  						}
	  						$checkQquery="SELECT * FROM quizzes WHERE subject_id=".$s;
	  						$chkQres=mysqli_query($conn,$checkQquery);
	  						if(!$chkQres){
	  							echo "Error:".mysqli_error($conn);
	  						}
	  						if(mysqli_num_rows($chkTres)>0)
	  						{
	  							$Thascontent=true;
  							}
	  						if(mysqli_num_rows($chkQres)>0)
	  						{
	  							$Qhascontent=true;
  							}

	          			?>
		
      					<button class="action-btn" <?php if(!$Qhascontent){echo 'disabled title="There are no quizzes available now. Please come back later.";';}?>  onclick="window.location='take_quiz.php?s=<?=$s;?>&q=<?=$first_q_id;?>&index=<?=$qindex;?>';">Take a Quiz</button>

      					<button class="action-btn" <?php if(!$Thascontent){echo 'disabled title="There are no tutorials available. Please come back later.";';}?>  onclick="window.location='learn_tutorial.php?s=<?=$s;?>&t=<?=$first_t_id;?>&index=<?=$index;?>';">Learn a Tutorial</button>
			          				
			          		</div>

			          		<div class="col-md-12" align="center">
								<a onclick="window.history.back()" style="color: #777;font-family: Arial;font-size: 16px;cursor: pointer;">Go back</a>	
			          		</div>
			          </div>
			        </li>




			      </ul>
			    </div>
			    <div class="clearfix"> </div>
			    
			<!----- //End-slider---->
			</div>
			


	</body>
</html>
