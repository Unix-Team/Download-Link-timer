<?php

//connect to the DB
include ('include/connect.php');

//create a random key
function createKey(){
	$strKey = md5(microtime());
	return $strKey;
}
date_default_timezone_set('Asia/Tehran');
//get a unique download key
$strKey = createKey();

//insert the download record into the database
$sql="INSERT INTO `downloadlinks` (owner, downloadkey, file, created, expires) VALUES (?,?,?,?,?)";
$result= $connect -> prepare($sql);
$result->bindValue(1,'test_hastim@gmail.com');
$result->bindValue(2,$strKey);
$result->bindValue(3,'test hastim.zip');
$result->bindValue(4,(date("H:i:s")." - ".date("Y/m/d")));
$result->bindValue(5,(time()+(60*60*24*1)));
$query = $result->execute();

?>

<html>
	<head>
		<title>لینک زماندار</title>
	</head>
	<body dir="rtl">
	<p>لینک دانلود شما :</p>
	<strong><a href="dl.php?key=<?php echo $strKey;?>">دانلود فایل</a></strong>
	<p>توجه داشته باشید که این لینک تنها 2 مرتبه در 24 ساعت آینده قابل استفاده می باشد.</p>
	</body>
</html>