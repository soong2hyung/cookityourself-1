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
				<li data-target="#myCarousel" data-slide-to="2" class></li>
			</ol>
			<!-- 회전광고판 항목 -->
			<div class="carousel-inner">
				<div class="item active"><a href="search.php?search=홍합"><img src="../img/s1.png" width="100%"></a></div>
				<div class="item"><a href="search.php?search=레몬"><img src="../img/s2.png" width="100%"></div>
				<div class="item"><a href="search.php?search=떡볶이"><img src="../img/s3.png" width="100%"></div>
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
		<div class="container-fluid green">
			<div class="row no-gutter popup-gallery">
				<div class="col-xs-4 col-sm-4">
					<h4>Today</h4>
					<h4>Recipe</h4>
					<h4>오늘의</h4>
					<h4>레시피</h4>
				</div>
				<div class="col-xs-4 col-sm-4">
					<a href="recipeview.php?Id=380" class="portfolio-box">
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
			<div class="container-fluid">
			<div class="row no-gutter popup-gallery">
				<div class="col-xs-4 col-sm-4">
					<a href="recipeview.php?Id=285" class="portfolio-box">
						<img src="http://krcdn.ar-cdn.com/recipes/xlarge/f19a3ba6-2f9d-403b-8fae-dd3933ea00bc.jpg" class="img-responsive" alt="">
						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category text-faded">
									또띠아 피자
								</div>
								<div class="project-name">
									집에서 만들어 먹는 간단 또띠아 피자
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-4 col-sm-4">
					<a href="recipeview.php?Id=433" class="portfolio-box">
						<img src="http://krcdn.ar-cdn.com/recipes/xlarge/b5a48f41-efbe-4201-a39f-d8dc7049e22c.jpg" class="img-responsive" alt="">
						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category text-faded">
									아보카도 샌드위치
								</div>
								<div class="project-name">
									아보카도의 부드러움에 마요네즈의 고소함
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-4 col-sm-4">
					<a href="recipeview.php?Id=1272" class="portfolio-box">
						<img src="https://www.menupan.com/cook/cookimg/028000.jpg" class="img-responsive" alt="">
						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category text-faded">
									밥 샌드위치
								</div>
								<div class="project-name">
									밥으로 만드는 초간단 샌드위치
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 green">
				</br>
				<h3>주제 추천</h3>
				</br>
			</div>
			<div class="col-xs-4 col-sm-4 red">
				<a href="search.php?search=김치">
				<h4>김치</h4>
			</div>
			<div class="col-xs-4 col-sm-4 brown">
				<a href="search.php?search=김치">
				<h4>고등어</h4>
			</div>
			<div class="col-xs-4 col-sm-4 red">
				<a href="search.php?search=김치">
				<h4>돈까스</h4>
			</div>
			<div class="col-xs-4 col-sm-4 brown">
				<a href="search.php?search=김치">
				<h4>참치</h4>
			</div>
			<div class="col-xs-4 col-sm-4 red">
				<a href="search.php?search=김치">
				<h4>스팸</h4>
			</div>
			<div class="col-xs-4 col-sm-4 brown">
				<a href="search.php?search=김치">
				<h4>닭</h4>
			</div>
			<div class="col-xs-4 col-sm-4 red">
				<a href="search.php?search=김치">
				<h4>소고기</h4>
			</div>
			<div class="col-xs-4 col-sm-4 brown">
				<a href="search.php?search=김치">
				<h4>돼지고기</h4>
			</div>
			<div class="col-xs-4 col-sm-4 red">
				<a href="search.php?search=김치">
				<h4>떡볶이</h4>
			</div>
			<div class="col-xs-4 col-sm-4 brown">
				<a href="search.php?search=김치">
				<h4>식빵</h4>
			</div>
			<div class="col-xs-4 col-sm-4 red">
				<a href="search.php?search=김치">
				<h4>밥</h4>
			</div>
			<div class="col-xs-4 col-sm-4 brown">
				<a href="search.php?search=김치">
				<h4>된장</h4>
			</div>
		</div>
	</section>
	<div id="footer"></div>
</div>	
</body>

</html>
