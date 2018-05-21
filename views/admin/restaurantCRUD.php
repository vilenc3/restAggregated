<?php
require_once dirname(__FILE__).'/../../controllers/mainController.php';
mainController::process();
?>
<?php
            if(isset($_SESSION['username'])){
                if($_SESSION['isAdmin'] == '1'){?>
<center>
<p>Add restaurant form:</p>
<form method="post">
	<div>
		<label for="name">Restaurant name: </label>
                <input id="name" type="text" name="name" required>
	</div> 
        
    <div>
        <label for="description">Description: </label>
                <input id="description" type="text" name="description" required>
    </div>
    
    <div>
		<label for="phone">Phone number: </label>
                <input id="phone" type="number" step="any" name="phone" required>
	</div>
        
    <div>
        <label for="address">Address: </label>
                <input id="address" type="text" name="address" required>
    </div>

    <div>
        <label for="district_id">District_id: </label>
                <input id="district_id" type="number" step="any" name="district_id" min = 1 max = 5 required>
    </div>
    
<!--     <div>
            <label for="isSponsored"></label>
                <input id="isSponsored" type="hidden" value="0" name="isSponsored">
    </div> -->

	<div class="row-form">
        <input type="submit"  value="Create" name="create-restaurant">
    </div>
</form>
    
    <p>Delete Restaurant: </p>
<form method="post">
	<div>
		<label for="id">Restaurant's ID to be deleted:</label>
                <input id="id" type="number" name="id" required>
	</div> 

	<div class="row-form">
        <input type="submit"  value="Delete" name="delete-restaurant">
    </div>
</form>

    <p>Update Restaurant:</p>
<form method="post">
    <div>
		<label for="id">Restaurant's ID to be updated:</label>
                <input id="id" type="number" name="id">
	</div> 
	<div>
		<label for="name">Restaurant's new name: </label>
                <input id="name" type="text" name="name" required>
	</div> 
        
    <div>
        <label for="description">Description: </label>
                <input id="description" type="text" name="description" required>
    </div>
    
    <div>
        <label for="phone">Phone number: </label>
                <input id="phone" type="number" step="any" name="phone" required>
    </div>
        
    <div>
        <label for="address">Address: </label>
                <input id="address" type="text" name="address" required>
    </div>

    <div>
        <label for="district_id">District_id: </label>
                <input id="district_id" type="number" step="any" name="district_id" min = 1 max = 5 required>
    </div>
    <div class="row-form">
        <input type="submit"  value="Update" name="update-restaurant">
    </div>
</form>

</center>

<?php
                
            }   else
                    echo "You shouldn't be here...";
                } else
                    echo "Access denied";
                
?>