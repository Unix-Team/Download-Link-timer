<html>
	<head>
		<title>لینک زماندار</title>
	</head>
	<body dir="rtl">
		<?php

			//connect to the DB
			include ('include/connect.php');

			//The directory where the download files are kept - keep outside of the web document root
			$DownloadFolder = "downloads/";

			if(!empty($_GET['key'])){
				
				//check the DB for the key	
				$sql= "select * from downloadlinks where downloadkey ='".Check_Param($_GET['key'])."' LIMIT 1";
				$res = $connect->prepare($sql);
				$res -> execute();
				$row = $res->fetch(PDO::FETCH_ASSOC);
				
				if(!empty($row['file'])){
					
					//check that the download time hasnt expired
					if($row['expires']>=time()){
						if($row['downloads'] < 2){
							
							//check the file exists and then let the user download it
							$strDownload = $DownloadFolder.$row['file'];
							
							if(true){
								
								//get the file content
								$strFile = file_get_contents($strDownload);
								
								//set the headers to force a download
								header("Content-type: application/force-download");
								header("Content-Disposition: attachment; filename=\"".str_replace(" ", "_", $row['file'])."\"");
								
								//echo the file to the user
								echo $strFile;
								
								//update the DB to say this file has been downloaded					
								$sql="UPDATE `downloadlinks` SET downloads = downloads + 1  WHERE `downloadkey` = ? LIMIT 1";
								$result = $connect -> prepare($sql);
								$result -> bindValue(1,$_GET['key']);
								$query = $result->execute();
								
								exit;
							}else{
								//We couldn't find the file to download.
								echo "متاسفانه هیچ فایلی برای دانلود یافت نشد.";
							}
						}else{
							//his file has already been downloaded and multiple downloads are not allowed.
							echo "شما ".$row['downloads']." مرتبه این فایل را دانلود کرده اید و دیگر قادر به دانلود آن نمی باشید.";
						}
					}else{
						//This download has passed its expiry date.
						echo "انقضای لینک مورد نظر به پایان رسیده است و دیگر امکان دانلود فایل مورد نظر وجود ندارد.";
					}
				}else{
					//No file was found to download.
					echo "متاسفانه هیچ فایلی برای دانلود یافت نشد.";
				}
			}else{
				//No download key was provided. Please return to the previous page and try again.
				echo "هیچ لینکی یافت نشد.لطفا به مرحله قبل بازگشته و مجددا تلاش کنید.";
			}

		?>
	</body>
</html>