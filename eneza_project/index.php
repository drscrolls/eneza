<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
								<li class="page-scroll"><a href="dev_access.php">DEVELOPER ACCESS</a></li>
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
			          <div class="caption text-center">
			          	<div class="slide-text-info">
			          		<h1><span>Eneza Education</span></h1>
			          		<h2 style="font-size: 23px;">Begin today by learning something new</h2>
			          		
			          		<div class="clearfix"> </div>
			          		<div class="big-btns col-md-6" style="margin: 2px;">
			          		</div>

			          		<div align="center" class="col-md-11" style="margin:0.2em">
			          			<button class="action-btn" onclick="window.location='select_course.php';">Start</button>
			          		</div>
			          	</div>
			          </div>
			        </li>




			      </ul>
			    </div>
			    <div class="clearfix"> </div>
			    

			    	<div class="divice-demo">
			    		<img src="images/girl.jpg" style="height: 400px;width:auto;" title="demo" />
			    	</div>

			<!----- //End-slider---->
			</div>
			


			<!-- footer-->
			<div class="footer">
				<div class="container">
					<div class="footer-grids">
						<div class="col-md-3 footer-grid about-info">
							<a href="#"><img src="images/logo.png" title="Eneza Education" /></a>
							<p>eusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
						<div class="col-md-3 footer-grid subscribe">
							<h3>Subscribe </h3>
							<form>
								<input type="text" placeholder="" required />
								<input type="submit" value="" />
							</form>
							<p>eusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						</div>
						<div class="col-md-3 footer-grid explore">
							<h3>Explore</h3>
							<ul class="col-md-6">
								<li><a href="#">Envato</a></li>
								<li><a href="#">Themecurve</a></li>
								<li><a href="#">Kreativeshowcase</a></li>
								<li><a href="#">Freebiescurve</a></li>
							</ul>
							<ul class="col-md-6">
								<li><a href="#">Themeforest</a></li>
								<li><a href="#">Microsoft</a></li>
								<li><a href="#">Google</a></li>
								<li><a href="#">Yahoo</a></li>
							</ul>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-3 footer-grid copy-right">
							<p>Eusmod tempor incididunt ut labore et dolore magna aliqua. ut labore et dolore magna aliqua. </p>
							<p class="copy">Template by <a href="http://w3layouts.com/">w3layouts</a></p>
						</div>
						<div class="clearfix"> </div>
						<script type="text/javascript">
							$(document).ready(function() {
								/*
								var defaults = {
						  			containerID: 'toTop', // fading element id
									containerHoverID: 'toTopHover', // fading element hover id
									scrollSpeed: 1200,
									easingType: 'linear' 
						 		};
								*/
								
								$().UItoTop({ easingType: 'easeOutQuart' });
								
							});
						</script>
							<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
					</div>
				</div>
			</div>
			<!---//footer----->
			
	</body>
</html>

