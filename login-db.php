<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <header>
        <title>Login | HomeRecipes</title>
    </header>
    <body>
        <?php
            $my_connection = mysqli_connect('localhost', 'root', '', 'homerecipes');
            
			if (!$my_connection) {
				trigger_error("Connection failed: " . mysqli_connect_error());
			}

			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$stmt = "SELECT * FROM account where email = '$email' && password = '$password'";
            $dbresult = mysqli_query ($my_connection, $stmt);

            if ($dbresult == false)
            {
            	die  ("Unable to perform query<br>");
            }
            
			if(mysqli_num_rows($dbresult) > 0)
			{
				$dbrow = mysqli_fetch_assoc($dbresult);
				$first_name = ucwords($dbrow['first_name']);				
                $_SESSION['WelcomeUser'] = '<div style="color:#a91f23; text-align:right; font-family:Calibri; font-size:20px; ">Welcome ' . $first_name . '!</div>';
                $_SESSION['name'] = $dbrow['firstname'] . " " . $dbrow['lastname'];
                setCookie('email', $_POST['email']);
                $_SESSION['LoggedIn'] = TRUE;	
				header("Location: index.php");
				exit();
			}
			else
            {
                //assign an error message to a session and redirect to the login page.
                $_SESSION['LoginError']='<p style="color: red; text-align: center; font-size: 12px; margin-top: 20px">*Invalid email or password</p>';
                header("Location: login.php");
				exit();
            }
         
        ?>
    </body>
</html>