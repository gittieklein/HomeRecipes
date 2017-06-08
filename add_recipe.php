<!DOCTYPE html>
<html>
	<head>
		<title>Submit Recipe | HomeRecipe</title>
		
        <!--attach the css file-->
        <link rel="stylesheet" href="css/home.css">
        
        <?php 
	        include 'header.php'; 
	        if(!(isset($_SESSION['LoggedIn'])) || $_SESSION['LoggedIn'] == FALSE)
	        {
	            header("Location: login.php");
				exit();
	        }
        ?>
        
    </head>
    <body>      
    	<div class="col-md-10 col-md-offset-1">   
	            <h1 class="col-md-12 text-center" style="margin-bottom:20px">Submit Recipe</h1>
	            
	            <form action="addrecipe-db.php" method="POST">
	                
	                <div class="form-group col-md-6 col-md-offset-3">
				      	<label>Recipe Title:</label>
				      	<input type="text" class="form-control" required/>
				    </div>
	                
	                <div class="form-group col-md-6 col-md-offset-3">
				      	<label>Category:</label>			      					    	             
		                <?php
		                	$my_connection = mysqli_connect('localhost', 'root', '', 'homerecipes');
	            
							if (!$my_connection) {
								trigger_error("Connection failed: " . mysqli_connect_error());
							}              
		
		                    $dbquery = 'SELECT * FROM category';
		                    $dbresult = mysqli_query ($my_connection, $dbquery);
		
		                    if ($dbresult == false)
		                    {
		                            die  ("Unable to perform query<br>");
		                    }
		           
		                   //select options from the database
		                   echo '<select class="form-control">'; 
		                   while ($dbrow = mysqli_fetch_assoc($dbresult))
                           {
                               echo "<option>$dbrow[name]</option>";
                           }
		                   echo "</select>";
		                ?>
	            	</div>
				    
				    <div class="form-group col-md-6 col-md-offset-3">
					    <label>Prep Time:</label>
					    <div class="input-group">				    	
					    	<input type="text" class="form-control">
	    					<span class="input-group-addon">min.</span> 					
	  					</div>
  					</div>
				    
	              	<div class="form-group col-md-6 col-md-offset-3">
					    <label>Cook Time:</label>
					    <div class="input-group">				    	
					    	<input type="text" class="form-control">
	    					<span class="input-group-addon">min.</span> 					
	  					</div>
  					</div>
				    
	                <div class="form-group col-md-6 col-md-offset-3">
				      	<label>Ingredients:</label>
				      	<textarea class="form-control" name="ingredients" rows="12" cols="50" placeholder="Type the ingredients here, each on its own line." required></textarea>                
				    </div>
				    
	                <div class="form-group col-md-6 col-md-offset-3">
				      	<label>Directions:</label>
				      	<textarea class="form-control" rows="12" cols="50" placeholder="Type the instructions here, each on its own line." name="instructions" required></textarea>
	                </div>
	                
	                <div class="form-group col-md-6 col-md-offset-3">
				      	<label>Difficulty:</label>			      					    	             
		                <?php
		                    $dbquery = 'SELECT * FROM category';
		                    $dbresult = mysqli_query ($my_connection, $dbquery);
		
		                    if ($dbresult == false)
		                    {
		                            die  ("Unable to perform query<br>");
		                    }
		           
		                   //select options from the database
		                   echo '<select class="form-control">'; 
		                   while ($dbrow = mysqli_fetch_assoc($dbresult))
                           {
                               echo "<option>$dbrow[name]</option>";
                           }
		                   echo "</select>";
		                ?>
	            	</div>
	            	
	            	<div class="form-group col-md-6 col-md-offset-3">
	                	<input class="form-control btn" type="SUBMIT" name="button" value="Submit">
	                </div> 
	            </form>
        </div>

       <?php include 'Footer.html'; ?>
    </body>
</html>