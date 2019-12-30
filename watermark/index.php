<?php 
include("watermark.php"); 
$f = "visit.php";
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
		<meta name="robots" content="noindex, nofollow">
		<title>WaterMark LSB</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="img/favicon.ico" type="image/png">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		
			<div class="pagevisit">
				<div class="visitcount">

				</div>
			</div>
		</nav>
		<div class="topmost">
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<center>
							<strong class="panelinputtitle">Watermark Image</strong>
						</center>
					</div>
					<div class="panel-body">
						<form method = "post" enctype="multipart/form-data">
							<div class = "form-group">
								<label>Image to Watermark: </label>
								<input type="file" class="btn btn-info btn-block" name="filejpg" class="form-control" required />
							</div>
							<div class = "form-group">
								<input type = "submit" class = "btn btn-primary btn-block" name="process" value="Watermark Image"></label>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div>
				<div class="col-md-9">
					<div class="panel panel-success">
						<div class="panel-heading pheading">
							<center>
								<strong class="panelresulttitle">Watermarked Image</strong>
							</center>
						</div>
						<div class="panel-body">
							<div class="watermarkedimages">
								<div class="jumbotron">
									<center>
										<p>
										<?php
											$DirPath = 'results';
											// Get File Extension
											function get_extension($filename){
												$myext = substr($filename, strrpos($filename, '.'));
												return str_replace('.','',$myext);
											}
											if($erroroutput != ""){
												echo $erroroutput;
												goto outputexit;
											}
											//Checks if Directory 'results' exists
											if (file_exists('results')) {
												
												if($dir = opendir($DirPath)){
													//if file count inside the folder is 0 display Empty Warning
													if(count(glob($DirPath."/*")) === 0 ){
														echo "	
															<div class='alert alert-warning'>
																<center>
																	<strong><h4>Warning!</strong> Folder '<u>Results</u>' is Empty.</h4>
																</center>
															</div>";
													}else{
														$testar = glob("results/*.jpg");
														$kawnt = (count($testar)-1);
													
														$checkfile = get_extension($testar[$kawnt]);
														//validate folder content if not a directory and extension must be jpg or jpeg
														if(!is_dir($testar[$kawnt]) and ($checkfile == "jpg" or $checkfile == "jpeg")){
															echo "<img src='".$testar[$kawnt]."' alt='' width='270' height='170' class='resultimg'/>";
														}
														echo '<div class = "form-group">
															<a class = "btn btn-primary" href="download.php?file='.$testar[$kawnt].'">Download Image</a>
														</div>';
														
													}
													closedir($dir);
												}
												outputexit:
											}else{
												//if Directory 'results' not found, display NOT FOUND warning
												echo "	
												<div class='alert alert-warning'>
													<center>
														<strong><h4>Warning!</strong> Folder '<u>Results</u>' not Found.</h4>
													</center>
												</div>";
											}
										?>
										</p>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>