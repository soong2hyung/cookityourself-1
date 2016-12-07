<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>COOKITYOURSELF</title> 

	<!-- Bootstrap Core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/earlyaccess/notosanskr.css' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Plugin CSS -->
	<link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Theme CSS -->
	<link href="../css/creative.min.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Plugin JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
	<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- Theme JavaScript -->
	<script src="../js/creative.min.js"></script>
	<script> 
		$(function(){
			$("#header").load("header.php"); 
			$("#footer").load("footer.php"); 
		});
	</script>
</head>
<body>
<div id="wrapper">
	<div class="overlay"></div>
	<div id="header"></div>

	<!-- nav menu -->
	<section class="no-padding" id="slider">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1" class></li>
				<li data-target="#myCarousel" data-slide-to="2" class></li>
			</ol>
			<!-- 회전광고판 항목 -->
			<div class="carousel-inner">
				<div class="item active"><a href="search.php?search=홍합"><img src="../img/s1.png" width="100%"></a></div>
				<div class="item"><a href="search.php?search=레몬"><img src="../img/s2.png" width="100%"></a></div>
				<div class="item"><a href="search.php?search=떡볶이"><img src="../img/s3.png" width="100%"></a></div>
			</div>
		</div>
	</section>

<!-- 	<section class="no-padding" id="slider" style="padding-top: 80px;">>
		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1" class></li>
			</ol>
			
			<div class="carousel-inner">
				<div class="item active"><a href="search.php?search=홍합"><img src="../img/s1.png" width="100%"></a></div>
				<div class="item"><a href="search.php?search=레몬"><img src="../img/s2.png" width="100%"></div>
				<div class="item"><a href="search.php?search=떡볶이"><img src="../img/s3.png" width="100%"></div>
			</div>
		</div>
	</section>
 -->


	<section class="no-padding" id="recommend">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading"></h2>
				</div>
			</div>
		</div>
	
		<div class="container-fluid">

			
			<?php 
			// <!-- 검색 기반 추천 -->

			session_start();
			if ( !isset($_SESSION['user_id']) ) {
				printf("<h3>로그인하면 추천해주지롱(임시메시지)</h3>");
			}
			else {
				printf('<div class="col-xs-12 col-sm-12 red">');
						printf('</br><h3>검색 기반 추천</h3></br>');
				printf('</div>');
				printf('<div class="row no-gutter popup-gallery">');
					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="recipeview.php?Id=285" class="portfolio-box">');
							printf('<img src="http://krcdn.ar-cdn.com/recipes/xlarge/f19a3ba6-2f9d-403b-8fae-dd3933ea00bc.jpg" class="img-responsive" alt="">');
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded redt">');
										printf('또띠아 피자');
									printf('</div>');
									printf('<div class="project-name">');
										printf('집에서 만들어 먹는 간단 또띠아 피자');
									printf('</div>');
								printf('</div>');
							printf('</div>');
						printf('</a>');
					printf('</div>');
					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="recipeview.php?Id=433" class="portfolio-box">');
							printf('<img src="http://krcdn.ar-cdn.com/recipes/xlarge/b5a48f41-efbe-4201-a39f-d8dc7049e22c.jpg" class="img-responsive" alt="">');
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded redt">');
										printf('아보카도 샌드위치');
									printf('</div>');
									printf('<div class="project-name">');
										printf('아보카도의 부드러움에 마요네즈의 고소함');
									printf('</div>');
								printf('</div>');
							printf('</div>');
						printf('</a>');
					printf('</div>');
					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="recipeview.php?Id=1272" class="portfolio-box">');
							printf('<img src="https://www.menupan.com/cook/cookimg/028000.jpg" class="img-responsive" alt="">');
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded redt">');
										printf('밥 샌드위치');
									printf('</div>');
									printf('<div class="project-name">');
										printf('밥으로 만드는 초간단 샌드위치');
									printf('</div>');
								printf('</div>');
							printf('</div>');
						printf('</a>');
					printf('</div>');
				printf('</div>');

				// <!-- 구매 기반 추천-->
				printf('<div class="col-xs-12 col-sm-12 green">');
					printf('</br><h3>구매 기반 추천</h3></br>');
				printf('</div>');
				printf('<div class="row no-gutter popup-gallery">');
					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="recipeview.php?Id=285" class="portfolio-box">');
							printf('<img src="http://krcdn.ar-cdn.com/recipes/xlarge/f19a3ba6-2f9d-403b-8fae-dd3933ea00bc.jpg" class="img-responsive" alt="">');
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded redt">');
										printf('또띠아 피자');
									printf('</div>');
									printf('<div class="project-name">');
										printf('집에서 만들어 먹는 간단 또띠아 피자');
									printf('</div>');
								printf('</div>');
							printf('</div>');
						printf('</a>');
					printf('</div>');
					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="recipeview.php?Id=433" class="portfolio-box">');
							printf('<img src="http://krcdn.ar-cdn.com/recipes/xlarge/b5a48f41-efbe-4201-a39f-d8dc7049e22c.jpg" class="img-responsive" alt="">');
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded redt">');
										printf('아보카도 샌드위치');
									printf('</div>');
									printf('<div class="project-name">');
										printf('아보카도의 부드러움에 마요네즈의 고소함');
									printf('</div>');
								printf('</div>');
							printf('</div>');
						printf('</a>');
					printf('</div>');
					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="recipeview.php?Id=1272" class="portfolio-box">');
							printf('<img src="https://www.menupan.com/cook/cookimg/028000.jpg" class="img-responsive" alt="">');
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded redt">');
										printf('밥 샌드위치');
									printf('</div>');
									printf('<div class="project-name">');
										printf('밥으로 만드는 초간단 샌드위치');
									printf('</div>');
								printf('</div>');
							printf('</div>');
						printf('</a>');
					printf('</div>');
				printf('</div>');
			}

			 ?>
			
			
		</div>

	</section>
	<div id="footer"></div>
<div>
</body>

</html>
