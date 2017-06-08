<!DOCTYPE HTML>
<html>
	<head>	
        <meta charset="UTF-8">
       
        <title>Login | HomeRecipe</title>     
        
        <!--include bootstrap and stylesheet-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
        
        <?php include 'header.php'; ?>
    </head>
    <body>
        <div class="col-md-5 col-md-offset-1" >
			<div class="col-md-10 col-md-offset-1">
	            <form action ="login-db.php" method="post">
	                <h1 class="title">Login</h1>	               
	                <input class="form-control" type="text" name="email" placeholder='Email' required/> 
	                <input class="form-control input-margin" type="password" name="password" placeholder='Password' required/>
	                <input class="form-control buttom-margin btn" type="SUBMIT" name="button" value="Login">
	            	<br>
	            </form>
	        
		        <!--display an error assigned to a session variable if login is incorrect.-->
            	<?php 
	            	if(!empty($_SESSION['LoginError'])){ 
	                    echo $_SESSION['LoginError'];
	                }                
           		?>
            </div> 
    		<!--clear the error session after the message is displayed.-->       
	        <?php unset($_SESSION['LoginError']); ?>	           
		</div>
		
		<div class="col-md-5 middle-line" style="height: 375px;">
			<div class="col-md-10 col-md-offset-1">
	            <form action ="createaccount-db.php" method="post">
	                <h1 class="title">Create An Account</h1>	
	                <input class="form-control" type="text" name="firstname" placeholder='First Name' required/>             
	                <input class="form-control input-margin" type="text" name="lastname" placeholder='Last Name' required/>
	                <input class="form-control input-margin" type="text" name="email" placeholder='Email' required/> 
	                <input class="form-control input-margin" type="password" name="password1" placeholder='Password' required/>
	                <input class="form-control input-margin" type="password" name="password2" placeholder='Confirm Password' required/>
	                <input class="form-control buttom-margin btn" type="SUBMIT" name="button" value="Join">
	            	<br>
	            </form>
	        
		        <!--display an error assigned to a session variable if login is incorrect.-->
	        	<?php 
	            	if(!empty($_SESSION['createAccountError'])){
	            		 echo $_SESSION['createAccountError']; 
	                }
                ?>
            </div> 
    		<!--clear the error session after the message is displayed.-->    
	        <?php unset($_SESSION['createAccountError']); ?>	  
		</div>
        
		<?php include 'footer.html'; ?>
	</body>
</html>