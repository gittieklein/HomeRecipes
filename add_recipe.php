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
	                
	                
	                
	                <div class="form-group col-md-2 col-md-offset-1">
				      	<label>Category:</label>			      					    	             
		                <?php
		                	$my_connection = mysqli_connect('localhost', 'root', '', 'homerecipes');
	            
							if (!$my_connection) {
								trigger_error("Connection failed: " . mysqli_connect_error());
							}              
		
		                    $dbquery = 'SELECT * FROM category order by name';
		                    $dbresult = mysqli_query ($my_connection, $dbquery);
		
		                    if ($dbresult == false)
		                    {
		                            die  ("Unable to perform query<br>");
		                    }
		           
		                   //select options from the database
		                   echo '<select class="form-control">'; 
		                   echo '<option selected disabled hidden>Select</option>';
		                   while ($dbrow = mysqli_fetch_assoc($dbresult))
                           {
                               echo "<option>$dbrow[name]</option>";
                           }
		                   echo "</select>";
		                ?>
	            	</div>
				    
				    <div class="form-group col-md-10 col-md-offset-1">
				      	<label>Recipe Title:</label>
				      	<input type="text" class="form-control" required/>
				    </div>
				    
				    
	  				
	  				<div class="form-group col-md-2 col-md-offset-1">
				      	<label>Amount:</label>		     			      					    	             
		                <?php
		                    $dbquery = 'SELECT * FROM amount order by amount';
		                    $dbresult = mysqli_query ($my_connection, $dbquery);
		
		                    if ($dbresult == false)
		                    {
		                            die  ("Unable to perform query<br>");
		                    }
		           
		                   //select options from the database
		                   echo '<select class="form-control">'; 
						   echo '<option selected disabled hidden>Select</option>';
		                   while ($dbrow = mysqli_fetch_assoc($dbresult))
                           {
                               echo "<option>$dbrow[display]</option>";
                           }
		                   echo "</select>";
		                ?>
		     		</div>
		                
	                <div class="col-md-2">  
	                	<label>Measurement:</label>		    			      					    	             
		                <?php
		                    $dbquery = 'SELECT * FROM measurement order by measurement';
		                    $dbresult = mysqli_query ($my_connection, $dbquery);
		
		                    if ($dbresult == false)
		                    {
		                            die  ("Unable to perform query<br>");
		                    }
		           
		                   //select options from the database
		                   echo '<select class="form-control">'; 
		                   echo '<option selected disabled hidden>Select</option>';
		                   while ($dbrow = mysqli_fetch_assoc($dbresult))
                           {
                               echo "<option>$dbrow[measurement]</option>";
                           }
		                   echo "</select>";
		                ?>
	                </div>
		                
	                <div class="col-md-4">
	                	<label>Ingredient:</label>		
	                	<input type="text" class="form-control"/>
	                </div>
				    
	              	<div class="form-group col-md-2">
					    <label>Cook Time:</label>
					    <div class="input-group">				    	
					    	<input type="text" class="form-control">
	    					<span class="input-group-addon">min.</span> 					
	  					</div>
  					</div>	
  					
	                <div class="form-group col-md-8 col-md-offset-2">
				      	<label>Directions:</label>
				      	<textarea class="form-control" rows="12" cols="50" placeholder="Type the instructions here, each on its own line." name="instructions" required></textarea>
	                </div>
	            	
	            	<div class="form-group col-md-4 col-md-offset-4">
	                	<input class="form-control btn" type="SUBMIT" name="button" value="Submit">
	                </div> 
	            </form>
        </div>

       <?php include 'Footer.html'; ?>
    </body>
</html>