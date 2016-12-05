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
			$("#header").load("header.html"); 
			$("#footer").load("footer.html"); 
		});
	</script>
</head>
<body>
<div id="wrapper">
	<div class="overlay"></div>
	<div id="header"></div>

	<!-- search -->
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
		<br/><br/>
	</section>

	</form>

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
	
		<div class="container-fluid" padding-top="40px">

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

				printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
					printf("<div class=\"col-xs-4 col-sm-4 no-padding\">\n");
						printf("<a href=\"%s\">\n", $url);
							printf("<img src=\"%s\" class=\"img-responsive\" alt=\"\">\n", $img_url);
						printf("</a>\n");
					printf("</div>\n");
					printf("<div class=\"col-xs-8 col-sm-8\">\n");
						printf("<h3>%s</h3>\n", $name);
						printf("<h5>%s</h5>", $category);
					printf("</div>\n");
				printf("</div>\n");

			}

			?> 


		</div>
	</section>
	<div id="footer"></div>
	<div>
</body>

</html>
