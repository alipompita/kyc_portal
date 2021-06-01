<?php
include_once 'log_check.php';


if (isset($_GET['accept'])) {
    $application = new Application();
    $application->load($_GET['accept']);
    $application->accept();
}

$pendingApplications = Application::pendingApplications();
?>

<div class=" col-md-8 offset-md-2 mt-5">

<div class="container">
	<h3>Pending Applications</h3>
	<div class="display">
		<table class="table table-striped">
			<thead>
			
				<tr>
					<th>Institution</th> <th>Industry</th> <th>location</th> <th></th>
				</tr>
			
			</thead>
			
			<tbody>
			<?php 
			foreach ($pendingApplications as $application){
			    $inst = $application->getInstitution();
			    echo "<tr><td>".$inst->name."</td> <td>".$inst->industry."</td> <td>".$inst->location."</td>
                             <td><a class='btn btn-success' href='?accept=".$application->id."'><i class='fa fa-check'></i> Accept</a> <a class='btn btn-danger' href='?reject=".$application->id."'><i class='fa fa-window-close'></i> Reject</a></td> 
                                </tr>";
			}
			?>
			</tbody>
		</table>
	</div>
</div>


</div>

</body>
</html>