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
	<div class="row main">
		<div class="panel-heading">
		   <div class="panel-title text-center">
				<h1 class="title">로그인</h1>
				<hr />
			</div>
		</div> 
		<div class="main-login main-center">
			<form class="form-horizontal" method="post" action="#">
				
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">ID</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="Id" id="Id"  placeholder="ID를 입력해 주세요."/>
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
				<div class="form-group ">
					<button type="button" class="btn btn-primary btn-lg btn-block login-button" onclick="logUser()" >로그인 하기</button>
				</div>
				<div class="login-register">
					<a href="./join.php">가입하기</a>
				 </div>
			</form>
		</div>
	</div>
	<div id="footer"></div>
	<script>
		function logUser() {

			var request = new XMLHttpRequest();
			var params = "?Id=" + document.getElementById("Id").value + "&Password=" + document.getElementById("Password").value;
	 
			request.open("GET", "login_user.php" + params, true);
			request.onreadystatechange = function () {
				if (request.readyState == 4) { //서버로부터 응답상태
					if (request.status == 200 || request.status == 0) {//200 : 웹 서버의 응답처리상태

						var str = request.responseText;

						if (str == "1") {
							alert("로그인에 성공했습니다.");
							//sleep(5);
							location.replace("http://cookityourself.ivyro.net");
						}
						else {
							alert("로그인에 실패했습니다.");
						}
					}
				}
			}
			request.send(null);
		}
	</script>
</body>

</html>
