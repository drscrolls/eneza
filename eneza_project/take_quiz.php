<?php


include 'dbconnect.php';
ob_start();
session_start();

$_SESSION['s']=$_REQUEST[s];
$s=$_SESSION['s'];
$q=$_REQUEST[q];

	 $query="SELECT * FROM quizzes WHERE subject_id=".$s." AND id=".$_REQUEST[q];
	$res=mysqli_query($conn,$query);
	if(mysqli_num_rows($res)>0){

		while($row=mysqli_fetch_array($res)){
			$question=$row['question'];
			$option1=$row['option1'];
			$option2=$row['option2'];
			$option3=$row['option3'];
			$option4=$row['option4'];
			$correctoption=$row['correctoption'];
		}
	}

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
								<li class="active"><a href="./">Home </a></li>
								<li class="page-scroll"><a href="Quizzes.php">Tutorials</a></li>
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
			          	
					
			          		<div class="col-md-12" style="font-family: Arial;color:rgba(1,1,1,0.8);font-size: 20px;" align="center">
								<h4><?=$question;?></h4>
								<div class="col-md-12" align="center">
									
										<table>
											<?php if($option1){?>
											<tr>
												<td width="5%"><input type="checkbox" id="option1chk" name=""/></td>
												<td style="padding-left:10px;"><b><?= $option1;?></b></td>
											</tr>
											<?php } ?>

											<?php if($option2){?>
											<tr>
												<td width="5%"><input type="checkbox" id="option2chk" name=""/></td>
												<td style="padding-left:10px;"><b><?= $option2;?></b></td>
											</tr>
											<?php } ?>

											<?php if($option3){?>
											<tr>
												<td width="5%"><input type="checkbox" id="option3chk" name=""/></td>
												<td style="padding-left:10px;"><b><?= $option3;?></b></td>
											</tr>
											<?php } ?>

											<?php if($option4){?>
											<tr>
												<td width="5%"><input type="checkbox" id="option4chk" name=""/></td>
												<td style="padding-left:10px;"><b><?= $option4;?></b></td>
											</tr>
											<?php } ?>

										</table>
										

								</div>
			          		</div>


			          		<?php
			          			 $next_index=$_REQUEST[index]+1;
			          			$next_id=$_SESSION['Quizzes'][$next_index];

			          			if($_SESSION['Quizzes'][$next_index]){
			          		?>
			          		<div class="col-md-12" align="center" style="padding-top: 40px;">
								<a href="take_quiz.php?s=<?=$s;?>&q=<?= $next_id;?>&index=<?=$next_index;?>" style="color: #111;font-family: Arial;font-size: 17px;cursor: pointer;">Next question</a>	
			          		</div>
			          		<?php
			          			}
			          		?>
							
							<?php
			          			
			          			$next_id=$_SESSION['Quizzes'][$next_index];

			          			if(!$_SESSION['Quizzes'][$next_index]){
			          		?>
			          		<div class="col-md-12" align="center" style="padding-top: 40px;">
								<a href="start.php?s=<?=$s;?>" style="color: #111;font-family: Arial;font-size: 17px;cursor: pointer;">End Quiz</a>	
			          		</div>
			          		<?php
			          			}
			          		?>



			          		<div class="col-md-12" align="center" style="padding-top: 20px;">
								<a onclick="window.history.back()" style="color: #777;font-family: Arial;font-size: 16px;cursor: pointer;">Go back</a>	
			          		</div>

			          		
			          </div>
			        </li>




			      </ul>
			    </div>
			    <div class="clearfix"> </div>
			    
			</div>
			


	</body>
</html>
