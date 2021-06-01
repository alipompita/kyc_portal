<?php
include_once 'log_check.php';
$institution = $inst;
$users = $institution->getAllUsers();
?>
<div class="display col-md-6 offset-md-3 mt-5">
	<p><a class="btn btn-secondary" href="new_user.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add User</a></p>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th> <th>Email</th> <th>User Type</th> <th> Total Scans</th> <th>Verified</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if ($users != null){
			    foreach ($users as $user){
			        echo "<tr><td>".$user->getFirstName()." ". $user->getSurname()."</td> <td>".$user->getEmail()."</td> <td>".$user->getType()."</td> 
                    <td>".$user->getScanCount()."</td> <td>".$user->getVerificationCount()."</td></tr>";
			    }
			}
			?>
		</tbody>
	</table>
</div>

</body>
</html>