<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script type="text/javascript" src="bootstrap-filestyle.min.js"> </script>
		<script src="main.js"></script>
	</head>
	<body style="background: url('images/tiny_grid.png')">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-1 col-xs-0"></div>
				<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12" style="text-align: center">
				<h1 style="font: 30px OurFont, Arial">fontViewr</h1><br>
					<form action="index.php" method="post" enctype="multipart/form-data">
			<input type="text" placeholder="Type something..." class="input_text form-control" name="checktext" autocomplete="off"><br>
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
			<input type="file" class="filestyle" onchange="this.form.submit()"
			data-buttonName="btn-primary"
			data-iconName="false" name="fileupload" data-placeholder="<?php 
			if(isset($_FILES["fileupload"])){
				echo $_FILES["fileupload"]["name"];
			}
			else{
				echo "Load a font";
			}
			 ?>"><br>
			<?php 
			if(isset($_FILES["fileupload"])){
				move_uploaded_file($_FILES["fileupload"]["tmp_name"], "upload/{$_FILES["fileupload"]["name"]}");
				$checkingtext = $_POST["checktext"];
				echo <<<EOT
				<script>
				$(function(){
					$(".input_text").attr('value', '$checkingtext');
				});
				</script>
				<style>
				@font-face {
					font-family: OurFont;
					src: url("upload/{$_FILES["fileupload"]["name"]}");
				}
				</style>
EOT;
			}
		 ?>
		 <blockquote class="result" style="font: 20px OurFont, Arial; padding: 0px; background: #fff;
		 border-radius: 3px; overflow: auto; line-height: 50px"><?php 
		if(isset($_FILES["fileupload"])){
		echo $checkingtext;
		} 
		?></blockquote>
		</div>
		</form>
				<div class="col-lg-2 col-md-2 col-sm-1 col-xs-0"></div>
			</div>
		</div>
	</body>
</html>