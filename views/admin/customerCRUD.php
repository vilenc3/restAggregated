<?php
require_once dirname(__FILE__).'/../../controllers/mainController.php';
mainController::process();

            if(isset($_SESSION['username'])){
                if($_SESSION['isAdmin'] == '1'){
        ?>

<center>

    <p>Delete user:</p>
<form method="post">
	<div>
		<label for="id">user's ID to be deleted:</label>
                <input id="id" type="number" name="id" required>
	</div>
        
    
	<div class="row-form">
        <input type="submit"  value="Delete" name="delete-user">
    </div>
</form>



    <p>Update user:</p>
<form method="post">
         <div>
		<label for="id">user's ID to be updated:</label>
                <input id="id" type="number" name="id">
	</div> 
	<div>
		<label for="username">Username:</label>
                <input id="username" type="text" name="username">
	</div> 

    <div>
		<label for="password">Password:</label>
                <input id="password" type="password" name="password">
	</div>
        
    <div>
		<label for="email">Email:</label>
                <input id="email" type="email" name="email">
	</div> 
        
        <div>
		<label for="isRestaurator">isRestaurator:</label>
                <input id="isRestaurator" type="number" name="isRestaurator">
	</div> 

	<div class="row-form">
        <input type="submit"  value="Update" name="update-user">
    </div>
</form>

</center>

<?php
                
            }   else
                    echo "You shouldn't be here...";
                } else
                    echo "Access denied";
                
?>