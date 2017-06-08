<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <header>
        <title>Join | HomeRecipes</title>
    </header>
    <body>
        <?php
            $my_connection = mysqli_connect('localhost', 'root', '', 'homerecipes');
            
			if (!$my_connection) {
				trigger_error("Connection failed: " . mysqli_connect_error());
			}
            
			$email = $_POST['email'];
            $stmt = "SELECT * FROM account where email = '$email'";
            $dbresult = mysqli_query ($my_connection, $stmt);

            $valid = TRUE; //to validate that the count does not exist.
            
            if(mysqli_num_rows($dbresult) > 0)
			{				
                $valid = FALSE;
                header("Location:login.php");
                $_SESSION['createAccountError']='<p style="color: red; text-align: center; font-size: 12px; margin-top: 20px">*Account with email already exists</p>';
			}
			
			if($valid)
			{	
	            $password = $_POST['password1'];
				$password2 = $_POST['password2'];
	            if ($password == $password2)
	            {
	                $first = $_POST['firstname'];
	                $last =  $_POST['lastname'];
	            
	                $stmt = "INSERT INTO account (first_name, last_name, email, password) VALUES ('$first', '$last', '$email', '$password')";
	                $dbresult = mysqli_query ($my_connection, $stmt);
	                               
	                $_SESSION['name'] = $_POST['firstname'] . " ". $_POST['lastname'];
	
	                if (!$dbresult)
	                {
	                	die  (mysqli_error($my_connection) . "Unable to create account<br>");
	                }
	            }
	            else
	            {
	                //if the account was unsuccessful until now it means the confirmed password did not match.	              
	                $_SESSION['createAccountError'] = '<p style="color: red; text-align: center; font-size: 12px; margin-top: 20px;">*Passwords do not match</p>';
					header("Location: login.php");
					exit();
				}
            }

            //if an account was successfully made then go to the home page
            if ($valid)
            {
            	$_SESSION['LoggedIn'] = TRUE;
                $_SESSION['WelcomeUser'] = '<div style="color:#a91f23; text-align:right; font-family:Calibri; font-size:20px; ">Welcome ' . ucwords($first) . '!</div>';
                header("Location: index.php");
            }
        ?>
    </body>
</html>