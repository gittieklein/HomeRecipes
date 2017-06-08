<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<!--attach the css file and bootstrap-->
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!--Logo that is connected to a link to the website's homepage-->

		<div class="col-md-10 col-md-offset-1">
			<div id="logo" style="float:left">
				<a href="index.php"> <img src="./images/homerecipes.png"/> </a>
			</div>

			<div style="margin-top:50px;">
				<?php	
					if(!(isset($_SESSION['WelcomeUser'])))
					{
						$_SESSION['WelcomeUser'] = '<div style="color:#a91f23; text-align:right; font-family:Calibri; font-size:20px; ">Welcome!</div>';	
					}
					echo "<p>" . $_SESSION['WelcomeUser'] . "</p>";
				?>	
			</div>
			
			<div class="input-group" id="search" style="width:300px; float:right; ">
				<input type="text" class="form-control input-lg" placeholder="Search" name="search">
				<div class="input-group-btn">
					<button class="btn btn-default input-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
			</div>

			<!--These will be links for the user to find or submit recipes-->
			<div class="row">
				<div class="col-md-10">
					<ul id="horizontal-list" >
						<li>
							<a href = "Mains.php">Mains</a>
						</li>
						<li>
							<a href= "Salads.php">Salads</a>
						</li>
						<li>
							<a href="Soups.php">Soups</a>
						</li>
						<li>
							<a href="Sides.php">Sides</a>
						</li>
						<li>
							<a href="Desserts.php">Desserts</a>
						</li>
						<li>
							<a href="add_recipe.php">+Recipe</a>
						</li>
					</ul>
				</div>
				<div id="login" class="col-md-2 text-right">
					<a href="login.php"><i class="glyphicon glyphicon-user"></i><b> Login</b></a>				
				</div>
			</div>
			
			<div id="space"></div>
		</div>
	</head>
</html>
