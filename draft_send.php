<?php
$pdo_dsn = 'mysql:host=localhost; dbname=approval_system; charset=utf8';
$pdo_user = 'root';
$pdo_pass = 'Sata311!';
$pdo_option = array(
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_STRINGIFY_FETCHES => false
);
try {
                $pdo = new PDO($pdo_dsn, $pdo_user, $pdo_pass, $pdo_option);
} catch(Exception $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
}
?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset-"utf-8">
	<link rel="stylesheet" type="text/css"  href="./style.css"></link>
</head>
<body>
<p>
<?php
	print 'yahho';
	if(isset($_POST["price"],$_POST["comment"])){
		$price = $_POST["price"];
		$comment = $_POST["comment"];
		date_default_timezone_set('Asia/Tokyo');
		// $day = date("Y-m-d");
	}

$regist = $pdo->prepare("INSERT INTO T_Ringi(Price,Comment) VALUES(?,?)");

$regist->bindParam("Price",$price);
$regist->bindParam("Comment",$comment);

$regist->execute(array($price,$comment));

if($regist){
	echo"sucessd";
}else{
	echo"failed";
}
?></p>
<!-- 
T_Ringi--
ID,FK_Draft_Employee_ID,DateTime,Price,Comment,Reference,FK_Type_of_M_Workflow_Price_ID,FK_Draft_M_department_ID,Workflow_Ordering
T_Ringi_log--
ID,FK_Action_T_employee_ID,FK_Target_T_Ringi_ID,DateTime,Status,Comment,IPAddress
-->


<button onclick="history.back()">戻る</button>
	</p>
</form>


</p>


</body>
</html>

