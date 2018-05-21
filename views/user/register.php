<br><br><br>
<center><form method="post">
	<div>
		<label for="username">Username:</label>
                <input id="username" type="text" name="username" placeholder="Username" required>
	</div> 

	<div>
		<label for="password">Password:</label>
		<input id="password" type="password" name="password" placeholder="Password" minlength="5" required title="minimum 5 characters">
	</div>

	<div>
		<label for="email">Email:</label>
		<input id="email" type="email" name="email" placeholder="Email" required>
	</div>

	<div>
		<label for="isRestaurator">Are you an restaurant owner?</label>
		<input id="isRestaurator" type="checkbox" name="isRestaurator" value="1">
	</div>

	<div>
		<label for="agreed">I agree to the terms and conditions:</label>
		<input id="agreed" type="checkbox" name="agreed" required>
	</div>

	<div class="row-form">
        <input type="submit"  value="Submit" name="create-user">
    </div>
</form>
 <?php if (count($_POST)>0) echo "<script type='text/javascript'>alert('Register sucessful! Log in now.');</script>"; ?>
</center>