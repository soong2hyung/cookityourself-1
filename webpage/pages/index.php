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
				<div class="item"><a href="search.php?search=레몬"><img src="../img/s2.png" width="100%"></a></div>
				<div class="item"><a href="search.php?search=떡볶이"><img src="../img/s3.png" width="100%"></a></div>
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
		<div class="container-fluid orange">
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

			

			<?php 
			// <!-- 검색 기반 추천 -->

			session_start();
			if ( !isset($_SESSION['user_id']) ) {
				//echo '로그인 하셈';
			}
			else {

				$mysql_hostname = 'localhost';
				$mysql_username = 'cookityourself';
				$mysql_password = 'cook1357';
				$mysql_database = 'cookityourself';
				$mysql_port = '3306';
				$mysql_charset = 'utf8';

				//1. DB 연결
				$connect = @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password); 

				// 2. DB 선택
				@mysql_select_db($mysql_database, $connect) or die('DB 선택 실패');

				//3. 문자셋 지정
				mysql_query(' SET NAMES '.$mysql_charset);

				//4. 쿼리 생성
				$keyword_query = "SELECT SearchRecode FROM User WHERE Id LIKE '%".$_SESSION['user_id']."%'";
				$keyword_result = mysql_query($keyword_query) or die(mysql_error());
				$keyword_row = mysql_fetch_row($keyword_result);
				$keyword_list = $keyword_row[0];

				$lk = explode(";",  $keyword_list);

				printf('<div class="col-xs-12 col-sm-12 red">');
						printf('</br><h3>검색 기반 추천</h3></br>');
				printf('</div>');

				printf('<div class="row no-gutter popup-gallery red">');

				$tt = 0;
				while ( $tt < 3 ) {

					if ( intval(count($lk)-$tt-1) < 0 ) break;

					$keyword = $lk[ intval( count($lk)-$tt-1) ];

					if ( $keyword == '' ) { 
						$tt++; continue;
					}

					$query = "SELECT * FROM Recipe WHERE Name LIKE '%".$keyword."%'  order by rand() limit 15";
		
					//5. 쿼리 실행
					$result = mysql_query($query);

					$row = mysql_fetch_array($result, MYSQL_NUM);

					$id       = $row[0];
					$name     = $row[1];
					$url      = $row[2];
					$img_url  = $row[3];
					$elements =	str_replace(";", ", ", $row[4]);
					$category =	str_replace(";", ", ", $row[5]);

					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="recipeview.php?Id=%s" class="portfolio-box">', $id);
							printf('<img src="%s" class="img-responsive" alt="">', $img_url);
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded redt">');
										printf('%s', $name);
									printf('</div>');
									printf('<div class="project-name">');
										printf('\'%s\' 관련 레시피', $keyword);
									printf('</div>');
								printf('</div>');
							printf('</div>');
						printf('</a>');
					printf('</div>');

					$tt = $tt + 1;
				}

				while ( $tt < 2 ) {

					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="" class="portfolio-box">');
							printf('<img src="" class="img-responsive" alt="">');
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded redt">');
										printf('');
									printf('</div>');
									printf('<div class="project-name">');
										printf('');
									printf('</div>');
								printf('</div>');
							printf('</div>');
						printf('</a>');
					printf('</div>');
					$tt++;
				}

				printf('</div>');

				// <!-- 구매 기반 추천-->
				printf('<div class="col-xs-12 col-sm-12 green">');
					printf('</br><h3>구매 기반 추천</h3></br>');
				printf('</div>');
				printf('<div class="row no-gutter popup-gallery green">');
					printf('<div class="col-xs-4 col-sm-4">');
						printf('<a href="recipeview.php?Id=285" class="portfolio-box">');
							printf('<img src="http://krcdn.ar-cdn.com/recipes/xlarge/f19a3ba6-2f9d-403b-8fae-dd3933ea00bc.jpg" class="img-responsive" alt="">');
							printf('<div class="portfolio-box-caption">');
								printf('<div class="portfolio-box-caption-content">');
									printf('<div class="project-category text-faded greent">');
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
									printf('<div class="project-category text-faded greent">');
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
									printf('<div class="project-category text-faded greent">');
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


			<div class="col-xs-12 col-sm-12 brown">
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
