<?php
/**
 * Mysql Original 방식
 * 샘플예제 입니다. 대충 어떻게 동작되는지 공부하시기에 좋게 정리해놓았습니다.
 * 각각의 값을 변경하고 연결테스트 하기에도 좋습니다.
 * 
 * 최신 버전에서는 deprecated 될 것으로 경고문구가 뜰 수 있습니다. 
 * mysqli 나 pdo 방식으로 전환되려는 것 같습니다. 
*/
$mysql_hostname = 'localhost';
$mysql_username = 'cookityourself';
$mysql_password = 'cook1357';
$mysql_database = 'cookityourself';
$mysql_port = '3306';
$mysql_charset = 'utf8';

//1. DB 연결
$connect = @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password); 

// if(!$connect){
// 	echo '[연결실패] : '.mysql_error().'<br>'; 
// 	die('MySQL 서버에 연결할 수 없습니다.');
// } else {
// 	echo '[연결성공]<br>';
// }
// 2. DB 선택
@mysql_select_db($mysql_database, $connect) or die('DB 선택 실패');


//3. 문자셋 지정
mysql_query(' SET NAMES '.$mysql_charset);

//4. 쿼리 생성


# $query = ' select \'complete\' as col from dual ';

$data_stream = "'".$_GET['Id']."','".$_GET['Password']."','".$_GET['Name']."','".$_GET['Email']."'";
$query = "insert into User(Id, Password, Name, Email) values (".$data_stream.")";

// echo (string)$query;

//5. 쿼리 실행
$result = mysql_query($query);

//6. 결과 처리
if($result)
	echo "1";
else
	echo "-1";
// 연결 종료
mysql_close($connect);


