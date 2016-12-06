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
			$("#header").load("header.html"); 
			$("#footer").load("footer.html"); 
		});
	</script>
</head>
<body>
<div id="wrapper">
	<div class="overlay"></div>
	<div id="header"></div>
	

	<section>

		<?php 
		$keyword = $_GET["Id"]; 

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
		$query = "SELECT * FROM Recipe WHERE Id LIKE '".$keyword."'";

		//5. 쿼리 실행
		$result = mysql_query($query);

		$home_info;
		$home_info2;
		
		$lottemart_info;
		$lottemart_info2;

		$total_home1=0;
		$total_home2=0;

		$total_lottemart1=0;
		$total_lottemart2=0;

		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

			$id       = $row[0];
			$name     = $row[1];
			$url      = $row[2];
			$img_url  = $row[3];
			$element_list = explode(";",  $row[4]);
			$elements =	str_replace(";", ", ", $row[4]);
			$category =	str_replace(";", ", ", $row[5]);
		}

		function python_run() {

			global $id, $name, $url, $img_url, $element_list, $elements, $category;

			for ($i=0; $i < count($element_list); $i++) { 

				$temp = sprintf("python ../python/homeplus.py \"%s\"", $element_list[$i]);
				$command = escapeshellcmd($temp);
				shell_exec($command);

				$temp = sprintf("python ../python/lottemart.py \"%s\"", $element_list[$i]);
				$command = escapeshellcmd($temp);
				shell_exec($command);
			}
		}

		function load_homeplus1() {

			global $element_list, $home_info, $total_home1;

			for ($i=0; $i < count($element_list); $i++) { 
				$textfile = sprintf("homeplus_인기_%s.txt", $element_list[$i]);
				$fp = fopen($textfile,"r");
				$doc_data = fgets($fp,1024);

				if ( $doc_data == '' ) { 
					unlink($textfile);
					continue;
				}

				$aaaa = explode(",", $doc_data);

				$home_info[] = array($aaaa[0], $aaaa[1], $aaaa[2], $aaaa[3], $aaaa[4]);

				$total_home1 = $total_home1 + intval($aaaa[4]);

				fclose($fp);

				unlink($textfile);
			}
		}

		function load_homeplus2() { 

			global $element_list, $home_info2, $total_home2;

			for ($i=0; $i < count($element_list); $i++) { 
				$textfile = sprintf("homeplus_가격_%s.txt", $element_list[$i]);
				$fp = fopen($textfile,"r");
				$doc_data = fgets($fp,1024);

				if ( $doc_data == '' ) { 
					unlink($textfile);
					continue;
				}

				$aaaa = explode(",", $doc_data);

				$home_info2[] = array($aaaa[0], $aaaa[1], $aaaa[2], $aaaa[3], $aaaa[4]);

				$total_home2 = $total_home2 + intval($aaaa[4]);

				fclose($fp);

				unlink($textfile);
			}
		}

		function load_lottemart1() { 

			global $element_list, $lottemart_info, $total_lottemart1;

			for ($i=0; $i < count($element_list); $i++) { 
				$textfile = sprintf("lottemart_인기_%s.txt", $element_list[$i]);
				$fp = fopen($textfile,"r");
				$doc_data = fgets($fp,1024);

				if ( $doc_data == '' ) { 
					unlink($textfile);
					continue;
				}

				$aaaa = explode(",", $doc_data);

				if ( count($aaaa) != 5 ){ 
					unlink($textfile);
					continue;
				}

				$lottemart_info[] = array($aaaa[0], $aaaa[1], $aaaa[2], $aaaa[3], $aaaa[4]);

				$total_lottemart1 = $total_lottemart1 + intval($aaaa[4]);

				fclose($fp);

				unlink($textfile);
			}
		}

		function load_lottemart2() { 

			global $element_list, $lottemart_info2, $total_lottemart2;

			for ($i=0; $i < count($element_list); $i++) { 
				$textfile = sprintf("lottemart_가격_%s.txt", $element_list[$i]);
				$fp = fopen($textfile,"r");
				$doc_data = fgets($fp,1024);

				if ( $doc_data == '' ) { 
					unlink($textfile);
					continue;
				}

				$aaaa = explode(",", $doc_data);

				if ( count($aaaa) != 5 ) { 
					unlink($textfile);
					continue;
				}

				$lottemart_info2[] = array($aaaa[0], $aaaa[1], $aaaa[2], $aaaa[3], $aaaa[4]);

				$total_lottemart2 = $total_lottemart2 + intval($aaaa[4]);

				fclose($fp);

				unlink($textfile);
			}
		}
		python_run();


		?>


		<h1 align="left"> <?php echo $name;  ?> <h1>
		<br>

		<div class="col-xs-12 col-sm-12">
			<div class="col-xs-4 col-sm-4">
			</div>
			<div class="col-xs-4 col-sm-4">
				<?php printf("<img src=\"%s\" class=\"img-responsive\" alt=\"\">", $img_url); ?>
			</div>
		</div>

		</br></br>
		<h3 align="left">레시피 링크<h3>
		<?php printf("<h5><a href=\"%s\" align=\"left\">%s</a></h5>", $url,$url); ?>
		</br></br>
		<h3 align="left">식재료 목록<h3>
		<h5 align="left">  <?php echo $elements;  ?> <h5>

		<?php 
			load_lottemart1();
			load_lottemart2();
			load_homeplus1();
			load_homeplus2();
		?>

		</br></br>
		<h3 align="left">쇼핑몰-롯데마트몰 인기품목 구매 정보<h3><br>
		<h3>총합 <?php echo $total_lottemart1 ?> 원</h3><br>
		<div class="container-fluid">
				<?php 

				for ($i=0; $i < count($lottemart_info); $i++) { 

					printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
						printf("<div class=\"col-xs-2 col-sm-2 no-padding\">\n");
							printf("<a href=\"%s\">\n", $lottemart_info[$i][2]);
								printf("<img src=\"%s\" class=\"img-responsive\" alt=\"\">\n", $lottemart_info[$i][1]);
							printf("</a>\n");
						printf("</div>\n");

						printf("<div class=\"col-xs-10 col-sm-10\">\n");

							printf("<h4>%s</h4>", $lottemart_info[$i][3]);
							printf("<h3>%s 원</h3>", $lottemart_info[$i][4]);
						printf("</div>\n");
					printf("</div>\n");
				}

				?>
		</div>

		</br></br>
		<h3 align="left">쇼핑몰-롯데마트몰 최저가 구매 정보<h3><br>
		<h3>총합 <?php echo $total_lottemart2 ?> 원</h3><br>
		<div class="container-fluid">
				<?php 

				for ($i=0; $i < count($lottemart_info2); $i++) { 

					printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
						printf("<div class=\"col-xs-2 col-sm-2 no-padding\">\n");
							printf("<a href=\"%s\">\n", $lottemart_info2[$i][2]);
								printf("<img src=\"%s\" class=\"img-responsive\" alt=\"\">\n", $lottemart_info2[$i][1]);
							printf("</a>\n");
						printf("</div>\n");

						printf("<div class=\"col-xs-10 col-sm-10\">\n");

							printf("<h4>%s</h4>", $lottemart_info2[$i][3]);
							printf("<h3>%s 원</h3>", $lottemart_info2[$i][4]);
						printf("</div>\n");
					printf("</div>\n");
				}

				?>
		</div> 


		</br></br>
		<h3 align="left">쇼핑몰-홈플러스 인기품목 구매 정보<h3><br>
		<h3>총합 <?php echo $total_home1 ?> 원</h3><br>
		<div class="container-fluid">
				<?php 

				for ($i=0; $i < count($home_info); $i++) { 

					printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
						printf("<div class=\"col-xs-2 col-sm-2 no-padding\">\n");
							printf("<a href=\"%s\">\n", $home_info[$i][2]);
								printf("<img src=\"http://%s\" class=\"img-responsive\" alt=\"\">\n", $home_info[$i][1]);
							printf("</a>\n");
						printf("</div>\n");

						printf("<div class=\"col-xs-10 col-sm-10\">\n");

							printf("<h4>%s</h4>", $home_info[$i][3]);
							printf("<h3>%s 원</h3>", $home_info[$i][4]);
						printf("</div>\n");
					printf("</div>\n");
				}

				?>
		</div>

		</br></br>
		<h3 align="left">쇼핑몰-홈플러스 최저가 구매 정보<h3><br>
		<h3><?php echo $total_home2 ?> 원</h3><br>
		<div class="container-fluid">
				<?php 

				for ($i=0; $i < count($home_info2); $i++) { 

					printf("<div class=\"col-xs-12 col-sm-12 no-padding\">\n");
						printf("<div class=\"col-xs-2 col-sm-2 no-padding\">\n");
							printf("<a href=\"%s\">\n", $home_info2[$i][2]);
								printf("<img src=\"http://%s\" class=\"img-responsive\" alt=\"\">\n", $home_info2[$i][1]);
							printf("</a>\n");
						printf("</div>\n");

						printf("<div class=\"col-xs-10 col-sm-10\">\n");

							printf("<h4>%s</h4>", $home_info2[$i][3]);
							printf("<h3>%s 원</h3>", $home_info2[$i][4]);
						printf("</div>\n");
					printf("</div>\n");
				}

				?>
		</div>

		
		

	</section>

	<!-- jQuery -->
	<script src="../vendor/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
	<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Theme JavaScript -->
	<script src="../js/creative.min.js"></script>
</body>

</html>
