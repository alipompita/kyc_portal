<?php
include_once 'log_check.php';

$institution = $inst;

if (isset($_POST['type'])){
    $type = $_POST['type'];
    $nid = $_POST['nid'];
    $fName = $_POST['fName'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    
    $institution->addUser($type, $nid, $fName, $surname, $email, $phone, $password);
    
}
?>

<body>
	
	
	
	<form action="" method="post" class="col-md-4 offset-md-4 mt-5">
		
		<div class="form-group">
			<label for="type">User Type</label>
			<select id="type" name="type" class="form-control">
				<option value="3">Staff</option>
				<option value="2">Admin</option>
				
			</select>
		</div>
		
		<div class="form-group">
			<label for="nid">National ID</label>
			<input type="text" id="nid" name="nid" required class="form-control">
		</div>
		
		<div class="form-group">
			<label for="fName">First Name</label>
			<input type="text" id="fName" name="fName" required class="form-control">
		</div>
		
		<div class="form-group">
			<label for="surname">Surname</label>
			<input type="text" id="surname" name="surname" required class="form-control">
		</div>
		
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" id="email" name="email" required class="form-control">
		</div>
		
		<div class="form-group">
			<label for="phone">Phone</label>
			<input type="tel" id="phone" name="phone" required class="form-control">
		</div>
		
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" id="password" name="password" required class="form-control">
		</div>
		
		
		<div class="form-group">
			<input type="submit" value="Add User" class="btn btn-info float-right col-md-4">
			<A href="users.php" class="btn btn-danger col-md-4">Cancel</A>
		</div>
	</form>
</body>
</html>