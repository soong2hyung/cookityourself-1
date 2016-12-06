<!DOCTYPE html>
<html lang="kr">
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
			</ol>
			<!-- 회전광고판 항목 -->
			<div class="carousel-inner">
				<div class="item active"><a href="http://www.naver.com"><img src="../img/portfolio/thumbnails/slide2.jpg" width="100%"></a></div>
				<div class="item"><img src="../img/portfolio/thumbnails/slide1.jpg" width="100%"></div>
			</div>
		</div>
	</section>

	<!-- search 
	<form action="search.php" method="get">
	
	<section class="no-padding" id="searchbar">
		<div class="container">
			<h2 class="section-heading" align="center"></h2>
			<div class="col-sm-6 col-sm-offset-3">
				<div class="input-group stylish-input-group">
					<input type="text" class="form-control"  placeholder="레시피 검색" name="search" >
					<span class="input-group-addon">
						<button type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>  
					</span>
				</div>
			</div>
		</div>
	</section>

	</form>
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
			<div class="row no-gutter popup-gallery">
				<div class="col-xs-4 col-sm-4">
					<a href="http://cookityourself.ivyro.net/pages/recipeview.php?Id=380" class="portfolio-box">
						<img src="http://krcdn.ar-cdn.com/recipes/xlarge/14c8f2f0-858d-4d03-8d92-adbfbbfb9cf0.jpg" class="img-responsive" width="100%" alt="">
						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category text-faded">
									스콘
								</div>
								<div class="project-name">
									커피와 함께하는 스콘 만들기
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-4 col-sm-4">
					<a href="recipeview.php?Id=110" class="portfolio-box">
						<img src="http://krcdn.ar-cdn.com/recipes/xlarge/6d391d17-651f-49a6-a76c-4d80fe3d5f08.jpg" class="img-responsive" alt="">
						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category text-faded">
									셀커크 배넉
								</div>
								<div class="project-name">
									스코틀랜드 향이 물씬~ 스코틀랜드 과자빵
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="row no-gutter popup-gallery">
				
				
				<div class="col-xs-12 col-sm-12">
					<a href="http://www.naver.com" class="portfolio-box">
						<img src="../img/portfolio/thumbnails/4.jpg" class="img-responsive" alt="">
						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category text-faded">
									볶음밥
								</div>
								<div class="project-name">
									자주 해먹지마라 질린다.
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<div id="footer"></div>
</div>	
</body>

</html>
