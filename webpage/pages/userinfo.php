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
<body id="page-top">
<div id="wrapper">
	<div class="overlay"></div>
	<div id="header"></div>
	<div class="row main">
		<div class="panel-heading">
		   <div class="panel-title text-center">
				<h1 class="title">내 정보 확인 및 수정</h1>
				<hr />
			</div>
		</div> 

		<?php
		session_start();
		if ( !isset($_SESSION['user_id']) ) {
			printf("<script type=\"text/javascript\"> location.replace(\"http://cookityourself.ivyro.net\"); </script>");
		}
		?>

		<div class="main-login main-center">
			<form class="form-horizontal" method="get">					
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">ID</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<?php  
							printf("<input type=\"text\" readonly class=\"form-control\" name=\"Id\" id=\"Id\" value=\"%s\">", $_SESSION['user_id']);
							?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<?php  
							printf("<input type=\"text\" readonly class=\"form-control\" name=\"Email\" id=\"Email\"  value=\"%s\"/>", $_SESSION['user_email']);
							?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="username" class="cols-sm-2 control-label">닉네임</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
							<?php 
							printf("<input type=\"text\" class=\"form-control\" name=\"Name\" id=\"Name\"  value=\"%s\"/>", $_SESSION['user_name']);
							 ?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">비밀번호</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="Password" id="Password"  placeholder="비밀번호를 입력해 주세요."/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">비밀번호 확인</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="Password2" id="Password2"  placeholder="비밀번호를 한번 더 입력해 주세요."/>
						</div>
					</div>
				</div>

				<style type="text/css">
					ul { color: #333; }
					li { color: #333; }
				</style>

				<?php 

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

				printf("<br><h4 class=\"blackt\">검색 기록</h4><ul>");

				for ($i=0; $i < count($lk); $i++) { 
					
					printf('<li>%s</li>', $lk[$i]);
				}
				printf("</ul>");
				
				?>

				<div class="form-group ">
					<button type="button" class="btn btn-primary btn-lg btn-block login-button" onclick="EditUser()">수정하기</button>
				</div>
				<div class="login-register">
					<a href="./index.php">메인 화면으로</a>
				 </div>
			</form>
		</div>
	</div>
	<div id="footer"></div>
	<script>
	    function EditUser() {
	        if (document.getElementById("Password").value == document.getElementById("Password2").value) {
	            var request = new XMLHttpRequest();
	            var params = "?Id=" + <? echo '"'.$_SESSION['user_id'].'"' ?> + "&Password=" + document.getElementById("Password").value
	                + "&Name=" + document.getElementById("Name").value + "&Email=" + document.getElementById("Email").value;
	 
	            request.open("GET", "edit_user.php" + params, true);
	            request.onreadystatechange = function () {
	                if (request.readyState == 4) { //서버로부터 응답상태
	                    if (request.status == 200 || request.status == 0) {//200 : 웹 서버의 응답처리상태
	                        var str = request.responseText;

							alert(str);

	                        if (str == "1") {
	                        	alert("정보수정에 성공했습니다.");
							location.replace("http://cookityourself.ivyro.net");
	                        }
	                        else {
	                            alert("정보수정에 실패했습니다.");
	                        }
	                    }
	                }
	            }
	            request.send(null);
	        }
	        else {
	            alert("비밀번호가 틀렸습니다.");
	        }
	    }
	</script>
</div>
</body>
</html>
