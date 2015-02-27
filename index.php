<?php 
include('core/config.php');
include('core/core.php');
include('core/panel.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ascendance - Home</title>
        <link href="style/main.css" rel="stylesheet" type="text/css" />
	<link href="style/slider.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/slider.js"></script>
        <link href="style/theme/<?php echo vTheme();?>.css" rel="stylesheet" type="text/css" />
        <!--<script type="text/javascript" src="js/jquery.js"></script>-->
		<script type="text/javascript" src="js/<?php echo jStyle();?>.js"></script>
		<script type="text/javascript">
			function getOnline(id) {
			$("#serverstats2").slideUp("medium");
			$.ajax({
			    url: 'js/online.php',
			    dataType: 'json',
			    async: true,
			    cache: false,
			    success: function (data) {
			  $("#serverstats2").html(data.online);
			  setTimeout(function() { $("#serverstats2").slideDown("slow"); }, 500);
			    }
			})
			}
		</script>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
   	 	<script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
 		<script src="js/pace.js"></script>
 		<link href="style/pace.css" rel="stylesheet" />
    	<script type='text/javascript' src='js/dynamicpage.js'></script>

	<!-- stylesheets -->
  	<!--<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />-->
  	<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
	
  	<!-- PNG FIX for IE6 -->
  	<!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
	<!--[if lte IE 6]>
		<script type="text/javascript" src="js/pngfix/supersleight-min.js"></script>
	<![endif]-->
	 
   	<!-- jQuery - the core -->
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="js/slide.js" type="text/javascript"></script>

    </head>

    <body>


	<?php 
	include('includes/panel.php');
	include('includes/menu.php');
	?>

        <div id="logo"></div>
		<div id="content" class="s3-loader">
				<div id="navi"></div>
                <div id="first" class="con-bg">


  <!-- SlidesJS Required: Start Slides -->
  <!-- The container is used to define the width of the slideshow -->
  <div align="center" style="z-index:1;">
  <div class="container">
    <div id="slides">
      <img src="slideshow/img/1.jpg" alt="">
      <img src="slideshow/img/2.jpg" alt="">
      <img src="slideshow/img/3.jpg" alt="">
      <img src="slideshow/img/4.jpg" alt="">
      <img src="slideshow/img/5.jpg" alt="">
      <img src="slideshow/img/6.jpg" alt="">
      <img src="slideshow/img/7.jpg" alt="">
      <img src="slideshow/img/8.jpg" alt="">
      <img src="slideshow/img/9.jpg" alt="">
    </div>
  </div>
  </div>
  <!-- End SlidesJS Required: Start Slides -->

  <!-- SlidesJS Required: Link to jQuery -->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Link to jquery.slides.js -->
  <script src="js/jquery.slides.min.js"></script>
  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 647,
        height: 221,
        play: {
          active: true,
          auto: true,
          interval: 5000,
          swap: true
        }
      });
    });
  </script>
  <!-- End SlidesJS Required --><br /> <br />


                <div id="con-bg" class="title">
                	<div align="center">And this is where the main-content would live. If I had some!</div>
                </div>
                </div>		
            </div>
       	<div id="con-bot" class="s3-loader"></div>
    </body>
</html>