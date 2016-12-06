

<?php
session_start();
if ( !isset($_SESSION['user_id']) ) {
	//echo '로그인 하셈';

	printf("<script type=\"text/javascript\"> location.replace(\"http://cookityourself.ivyro.net/pages/login_form.php\"); </script>");
}
else {

	printf("<script type=\"text/javascript\"> location.replace(\"http://cookityourself.ivyro.net/pages/userinfo.php\"); </script>");
}
?>