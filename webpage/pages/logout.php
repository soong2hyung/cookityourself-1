

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php 

session_start();

session_destroy();

printf("<script type=\"text/javascript\"> alert(\"로그아웃 되었습니다\"); </script>");

printf("<script type=\"text/javascript\"> location.replace(\"http://cookityourself.ivyro.net\"); </script>");

 ?>

</body>
</html>


