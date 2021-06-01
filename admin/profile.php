<?php
include_once 'log_check.php';
$user = new User();
$user->load($userID);
$invalidPasword = $nomatch = "";
$p1 = $p2 = $p3 = "";
if (isset($_POST['p1'])) {
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$p3 = $_POST['p3'];

	if (!$user->validPassword($p1)) {
		$invalidPasword = "Invalid Password";
	} elseif ($p2 != $p3) {
		$nomatch = "Password entries do not match";
	} else {
		$user->upDatePassword($p2);
	}
}

?>
<div class="container col-md-12">

	<div class="col-md-6  offset-md-3 mt-5">
		<div class="col-md-8 offset-md-2">
			<h2>User Detail</h2>
			<p class="col-md-12 id-label"><small>Institution</small></p>
			<p class="col-md-12 id-value"><?php echo $user->getInstitutionName() ?></p>
			<p class="col-md-12 id-label"><small>Name</small></p>
			<p class="col-md-12 id-value"><?php echo $user->getFullName(); ?></p>
			<p class="col-md-12 id-label"><small>Email</small></p>
			<p class="col-md-12 id-value"><?php echo $user->getEmail(); ?></p>
			<p class="col-md-12 id-label"><small>Phone</small></p>
			<p class="col-md-12 id-value"><?php echo $user->getPhone(); ?></p>
			<hr>
			<h2>Update Password</h2>
			<hr>
			<form action="" method="post">
				<div class="form-group">
					<label for="p1">Old Password</label>
					<input type="password" name='p1' id='p1' class="form-control" required <?php echo "value='$p1'" ?>>
					<small><?php echo $invalidPasword ?></small>
				</div>

				<div class="form-group">
					<label for="p2">New Password</label>
					<input type="password" name='p2' id='p2' class="form-control" required <?php echo "value='$p2'" ?>>
				</div>
				<div class="form-group">
					<label for="p3">Repeat Password</label>
					<input type="password" name='p3' id='p3' class="form-control" required <?php echo "value='$p3'" ?>>
					<small><?php echo $nomatch ?></small>
				</div>

				<div class="form-group">
					<input type="submit" value="Update" class="btn btn-info float-right col-md-4">
				</div>


			</form>
		</div>
	</div>

</div>

</body>

</html>