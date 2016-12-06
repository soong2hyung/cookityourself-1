<script>
	$(function () {
	  var trigger = $('.hamburger'),
		  overlay = $('.overlay'),
		 isClosed = false;

		trigger.click(function () {
		  hamburger_cross();      
		});

		function hamburger_cross() {

		  if (isClosed == true) {          
			overlay.hide();
			trigger.removeClass('is-open');
			trigger.addClass('is-closed');
			isClosed = false;
		  } else {   
			overlay.show();
			trigger.removeClass('is-closed');
			trigger.addClass('is-open');
			isClosed = true;
		  }
	  }
	  
	  $('[data-toggle="offcanvas"]').click(function () {
			$('#wrapper').toggleClass('toggled');
	  });  
	});
</script>
<nav id="mainNav" class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
				<span class="hamb-top"></span>
				<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
			</button>
		</div>
		<a class="glyphicon glyphicon-user" href="./login.php" style="color: #fff; font-size: 27px; float: right; margin-top: 25px">
		</a>
		<br/>
		<br/> 
		<br/>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div align="center">
			<ul class="nav navbar-nav navbar" width="100%">
				<li width="20%">
					<a class="page-scroll" href="./index.php">홈</a>
				</li>
				<li width="20%">
					<a class="page-scroll" href="./recipe.php">레시피</a>
				</li >
				<li width="20%">
					<a class="page-scroll" href="./recommend.php">추천</a>
				</li>
				<li width="20%">
					<a class="page-scroll" href="./popular.php">인기</a>
				</li>
				<li width="20%">
					<a class="page-scroll" href="./subject.php">주제</a>
				</li>
			</ul>
		</div>
	 </div> 
		<!-- /.navbar-collapse -->
	<!-- /.container-fluid -->
</nav>

<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
	<ul class="nav sidebar-nav">
		<li class="sidebar-brand">
			<!-- User info -->
			<a href="./index.php">
			   COOK IT YOURSELF
			</a>
			<?php
			session_start();
			if ( !isset($_SESSION['user_id']) ) {
				//echo '로그인 하셈';
			}
			else {

				printf("<a><h5 class=\"no-padding\" >%s님 안녕하세요!<br>", $_SESSION['user_name']);
				printf("%s</h5></a>", $_SESSION['user_email'] );
				printf("<a href=\"./userinfo.php\" class=\"no-padding\">");
					printf("<button type=\"button\" class=\"btn btn-warning btn-sm\">My info</button>");
				printf("</a>");

				printf("<a href=\"./logout.php\">");
					printf("<button type=\"button\" class=\"btn btn-warning btn-sm\">로그아웃</button>");
					//printf("<h5>로그아웃</h5>");
				printf("</a>");
			}
			?>

			<br/>
			<!-- User info -->
		</li>
		<br/>
		<li>
			<a class="page-scroll" href="./index.php">홈</a>
		</li>
		<li>
			<a class="page-scroll" href="./recipe.php">레시피</a>
		</li>
		<li>
			<a class="page-scroll" href="./recommend.php">추천</a>
		</li>
		<li>
			<a class="page-scroll" href="./popular.php">인기</a>
		</li>
		<li>
			<a class="page-scroll" href="./subject.php">주제별</a>
		</li>
	</ul>
</nav>
<!-- /#sidebar-wrapper -->