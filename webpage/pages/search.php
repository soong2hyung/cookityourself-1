<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INDEX</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/earlyaccess/notosanskr.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
					<span class="hamb-top"></span>
					<span class="hamb-middle"></span>
					<span class="hamb-bottom"></span>
				</button>
			</div>
			<br/>
			<br/>
			<br/>
			<!-- Collect the nav links, forms, and other content for toggling -->
			 <ul class="nav navbar-nav navbar">
				<li>
					<a class="page-scroll" href="./index.html">홈</a>
				</li>
				<li>
					<a class="page-scroll" href="./recipe.html">레시피</a>
				</li>
				<li>
					<a class="page-scroll" href=",/recommend.html">추천</a>
				</li>
				<li>
					<a class="page-scroll" href="./popular.html">인기</a>
				</li>
				<li>
					<a class="page-scroll" href="./subject.html">주제</a>
				</li>
				</ul>
		 </div>
			<!-- /.navbar-collapse -->
		<!-- /.container-fluid -->
	</nav>
	<section class="no-padding" id="slider" style="padding-top: 80px;">>
		<br/>
	</section>
	<section class="no-padding" id="searchbar">
		<div class="container">
			<h2 class="section-heading" align="center"></h2>
			<div class="col-sm-6 col-sm-offset-3">
					<div class="input-group stylish-input-group">
						<!-- search -->
						<form action="search.php" method="get">
						<input type="text" class="form-control"  placeholder="레시피 검색" name="search" > 
						<span class="input-group-addon">
							<button type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>  
						</span>
						</form>
					</div>
			</div>
		</div>
	</section>

	<section class="no-padding" id="recommend">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading"></h2>
				</div>
			</div>
		</div>
	
		<div class="container-fluid">
			<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading"></h2>
				</div>
			</div>
		</div>
	
		<div class="container-fluid">
			<div class="row no-gutter popup-gallery">

				<?php 

				$keyword = $_GET["search"]; 

				if ( $keyword == '' ) die();

				$mysql_hostname = 'localhost';
				$mysql_username = 'cookityourself';
				$mysql_password = 'cook1357';
				$mysql_database = 'cookityourself';
				$mysql_port = '3306';
				$mysql_charset = 'utf8';

				//1. DB 연결
				$connect = @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password); 

				if(!$connect){
					echo '[연결실패] : '.mysql_error().'<br>'; 
					die('MySQL 서버에 연결할 수 없습니다.');
				} else {
					echo '[연결성공]<br>';
				}

				// 2. DB 선택
				@mysql_select_db($mysql_database, $connect) or die('DB 선택 실패');

				//3. 문자셋 지정
				mysql_query(' SET NAMES '.$mysql_charset);

				//4. 쿼리 생성
				$query = "SELECT * FROM Recipe WHERE Name LIKE '%".$keyword."%'";
				$count = "SELECT count(*) FROM Recipe WHERE Name LIKE '%".$keyword."%'";

				// echo $query;
				//echo $count;

				//5. 쿼리 실행
				//5.1 검색 결과의 수 구하기
				$result = mysql_query($count) or die(mysql_error());
				$row = mysql_fetch_row($result);
				$total_no = $row[0];

				if ( $total_no > 100 ) die();

				//5.2 실제 검색
				$result = mysql_query($query);

				while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

					$id       = $row[0];
					$name     = $row[1];
					$url      = $row[2];
					$img_url  = $row[3];
					$elements =	$row[4];
					$category =	$row[5];

					printf("<div class=\"col-xs-4 col-sm-4\">\n");
						printf("<a href=\"%s\">\n", $url);
							printf("<img src=\"%s\" class=\"img-responsive\" alt=\"\">\n", $img_url);
						printf("</a>\n");
					printf("</div>\n");
					printf("<div class=\"col-xs-8 col-sm-8\">\n");
						printf("<h3>%s</h3>\n", $name);
						printf("<h5>%s</h5>",$category);
					printf("</div>\n");

				}

				?>

			</div>
		</div>

	</section>

	<!-- jQuery -->
	<script src="vendor/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
	<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Theme JavaScript -->
	<script src="js/creative.min.js"></script>
</body>

</html>
