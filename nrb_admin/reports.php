<?php
include_once 'log_check.php';


$range = "";
$invalidLogs = $validLogs = array();

$validLogs = Log::allValidLogs();
$invalidLogs = Log::allInvalidLogs();
if (isset($_GET['range'])) {
    $range = $_GET['range'];
    $validLogs = Log::allFValidLogs($range);
    $invalidLogs = Log::allFInvalidLogs($range);
}



?>

<div class="container col-md-12">
	<div class="col-md-6 offset-md-3 mt-5">
		<form>
			<div class="input-group mb-3">
				<input type="date" class="form-control" name="range" required aria-label="Filter Date" aria-describedby="basic-addon2" <?php echo "value='$range'" ?>>
				<div class="input-group-append">
					<button class="btn btn-primary" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
				</div>
			</div>
		</form>

	</div>
</div>


<div class="container col-md-12 row">

	<div class="display col-md-5 offset-md-2">
		<h2>Valid IDs Checked: <?php echo sizeof($validLogs) ?></h2>
		<div style="overflow: scroll; height:400px">
			<table class="table table-striped">
				<thead>
					<tr>

						<th>Date</th>
						<th>Time</th>
						<th>Input</th>
						<th>Holder</th>
					</tr>
				</thead>

				<tbody>
					<?php
					if ($validLogs != null) {
						foreach ($validLogs as $log) {
							$holder = new Holder();
							$holder->load($log->input);
							echo "<tr><td>" . $log->date . "</td> <td>" . $log->time . "</td> <td>" . $log->input . "</td> <td><a href='view_holder.php?id=" . $log->input . "'>" . $holder->first_name . " " . $holder->surname . "</a> </td> </tr>";
						}
					}
					?>
				</tbody>
			</table>
		</div>


	</div>
	<div class="display col-md-4">
		<h2>Invalid ID Inputs: <?php echo sizeof($invalidLogs) ?></h2>
		<div style="overflow: scroll; height:400px">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time</th>
						<th>Input</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($invalidLogs != null) {
						foreach ($invalidLogs as $log) {
							echo "<tr><td>" . $log->date . "</td> <td>" . $log->time . "</td> <td>" . $log->input . "</td></tr>";
						}
					}
					?>
				</tbody>
			</table>
		</div>

	</div>
</div>
</body>

</html>