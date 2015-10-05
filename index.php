<?php 
// include dependent library 
require 'vendor/autoload.php';

use MetzWeb\Instagram\Instagram;

// check request and retive user data 
if($_GET && isset($_GET['name'])){
		
	$instagram = new Instagram('Your Client ID');	
	$name = $_GET['name'];
	$result = $instagram->searchUser($name,9999);		
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instagram User Search</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Enter Instagram username here</h3>
					</div>
					<div class="panel-body">
						<form class="form-inline">
							<div class="form-group">						
								<input <?php if(isset($name)) echo 'value="'.$name.'"';?> name="name" type="text" placeholder="Instagram Username" class="form-control" required>
							</div>					
							<button class="btn btn-default" type="submit">Submit</button>
						</form>
					</div>
				</div>			
			</div>
		</div>
		<div class="row">
			<?php if(isset($result) && count($result->data)): 
			foreach ($result->data as $value) { ?>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="box-info text-center user-profile-2">					
					<div class="user-profile-inner">
						<h4>User ID: <?php echo $value->id;?></h4>
						<img src="<?php echo $value->profile_picture; ?>" class="img-circle profile-avatar" alt="User avatar">
						<h5><?php echo $value->full_name;?></h5>
						<h5>User name: <?php echo $value->username;?></h5>

						<!-- User button -->
						<div class="user-button">
							<div class="row">								
								<div class="col-md-12">
									<a class="btn btn-default btn-sm btn-block" href="https://instagram.com/<?php echo $value->username;?>/" target="_blank">FOLLOW !!!</a>
								</div>
							</div>
						</div>
					</div>
				</div>					
			</div>
			<?php } endif;?>
		</div>
		
	</div>
	
</body>
</html>

