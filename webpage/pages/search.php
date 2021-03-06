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
			$tt = 0;

			if ( $keyword == '' ) die();

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
			printf("<div class=\"col-lg-12 text-center\">\n");
				printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
					printf("<h2 padding-top=\"20px\" class=\"section-heading\"><br><br> 레시피 이름 검색 결과 </h2> <br><br>\n");
				printf("</div>\n");
			printf("</div>\n");

			$query = "SELECT * FROM Recipe WHERE Name LIKE '%".$keyword."%' order by rand() limit 15";
			$count = "SELECT count(*) FROM Recipe WHERE Name LIKE '%".$keyword."%'";

			//5. 쿼리 실행
			//5.1 검색 결과의 수 구하기
			$result = mysql_query($count) or die(mysql_error());
			$row = mysql_fetch_row($result);
			$total_no = $row[0];

			// alpha - 로그인 한 사용자의 경우, 검색 기록 update 하기 
			session_start();
			if ( !isset($_SESSION['user_id']) ) {
				//echo '로그인 해라';
			}
			else {
				if ( intval($total_no) > 1 ) {
					//echo '로그인 했구나';
					$keyword_query = "SELECT SearchRecode FROM User WHERE Id LIKE '%".$_SESSION['user_id']."%'";
					$keyword_result = mysql_query($keyword_query) or die(mysql_error());
					$keyword_row = mysql_fetch_row($keyword_result);
					$old_keyword = $keyword_row[0];

					if ( $old_keyword == '' ) {

						$new_keyword = sprintf("%s", $_GET['search']);
					}
					else {

						$lk = explode(";",  $old_keyword);

						if ( count($lk) >= 6 ) {

							$old_keyword = sprintf("%s;%s;%s;%s;%s", $lk[0], $lk[1], $lk[2], $lk[3], $lk[4]);
						}
						$new_keyword = sprintf("%s;%s", $_GET['search'], $old_keyword);
					}

					

					$query2  = "update User set SearchRecode= '".$new_keyword."' where Id LIKE '".$_SESSION['user_id']."'";
					$result2 = mysql_query($query2);
					//printf("<script type=\"text/javascript\"> alert(\"%s 를 검색기록에 등록\"); </script>", $_GET['search']);
				}
			}


			//5.2 실제 검색
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

				$tt = $tt + 1;

				$id       = $row[0];
				$name     = $row[1];
				$url      = $row[2];
				$img_url  = $row[3];
				$elements =	str_replace(";", ", ", $row[4]);
				$category =	str_replace(";", ", ", $row[5]);

				printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
					printf("<div class=\"col-xs-4 col-sm-4 no-padding\">\n");
						printf("<a href=\"%s\">\n", $url);
							printf("<img src=\"%s\" class=\"img-responsive\" alt=\"\">\n", $img_url);
						printf("</a>\n");
					printf("</div>\n");
					printf("<div class=\"col-xs-8 col-sm-8\">\n");
						
						printf("<h3><a href=\"%s\">%s</a></h3>\n","recipeview.php?Id=".$id, $name);

						printf("<h5>%s</h5>", $category);
						printf("<h5>%s</h5>", $elements);
					printf("</div>\n");
				printf("</div><br>\n");

				if ( $tt > 15 ) { 
					$tt = 0;
					break;
				}
			}

			// 이번엔 테마검색
			//4. 쿼리 생성
			printf("<div class=\"col-lg-12 text-center\">\n");
				printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
					printf("<h2 padding-top=\"20px\" class=\"section-heading\"> <br><br> 카테고리 검색 결과 </h2> <br><br>\n");
				printf("</div>\n");
			printf("</div>\n");


			$tt = 0;

			$query = "SELECT * FROM Recipe WHERE Category LIKE '%".$keyword."%' order by rand() limit 15 ";
			$count = "SELECT count(*) FROM Recipe WHERE Category LIKE '%".$keyword."%'";

			//5. 쿼리 실행
			//5.1 검색 결과의 수 구하기
			$result = mysql_query($count) or die(mysql_error());
			$row = mysql_fetch_row($result);
			$total_no = $row[0];



			//5.2 실제 검색
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {


				$tt = $tt + 1;

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
						printf("<h3><a href=\"%s\">%s</a></h3>\n","recipeview.php?Id=".$id, $name);
						printf("<h5>%s</h5>", $category);
						printf("<h5>%s</h5>", $elements);
					printf("</div>\n");
				printf("</div><br>\n");

				if ( $tt > 15 ) { 
					$tt = 0;
					break;
				}
			}

			$tt = 0;

			// 이번엔 재료검색
			//4. 쿼리 생성
			printf("<div class=\"col-lg-12 text-center\">\n");
				printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
					printf("<h2 padding-top=\"20px\" class=\"section-heading\"> <br><br> 요리 재료 검색 결과 </h2><br><br>\n");
				printf("</div>\n");
			printf("</div>\n");

			$query = "SELECT * FROM Recipe WHERE Element LIKE '%".$keyword."%' order by rand() limit 15";
			$count = "SELECT count(*) FROM Recipe WHERE Element LIKE '%".$keyword."%'";

			//5. 쿼리 실행
			//5.1 검색 결과의 수 구하기
			$result = mysql_query($count) or die(mysql_error());
			$row = mysql_fetch_row($result);
			$total_no = $row[0];



			//5.2 실제 검색
			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

				$tt = $tt + 1;

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
						printf("<h3><a href=\"%s\">%s</a></h3>\n","recipeview.php?Id=".$id, $name);
						printf("<h5>%s</h5>", $category);
						printf("<h5>%s</h5>", $elements);
					printf("</div>\n");
				printf("</div><br>\n");

				if ( $tt > 15 ) { 
					$tt = 0;
					break;
				}
			}

			?> 

		</div>
	</section>
	<div id="footer"></div>
	<div>
</body>

</html>
