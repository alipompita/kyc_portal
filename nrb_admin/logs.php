<?php
include_once 'log_check.php';
$validLogs = Log::allValidLogs();
$invalidLogs = Log::allInvalidLogs();

?>

<html>

<head>
	<style type="text/css">
	   th, td{
	       border-bottom: solid 1px #333333;
	       margin: 10px;
	   }
	   table { 
            border-spacing: 10px;
            border-collapse: separate;
        }
	</style>
</head>
<body>
	<div>
	<h2>Valid IDs Checked: <?php echo sizeof($validLogs)?></h2>
	<table>
		<thead>
			<tr>
				
				<th>Date</th> <th>Time</th> <th>Holder</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if ($validLogs != null){
			    foreach ($validLogs as $log){
			        echo "<tr><td>".$log->date."</td> <td>".$log->time."</td> <td>".$log->input."</td></tr>";
			    }
			}
			?>
		</tbody>
	</table>
	<h2>Invalid ID Inputs: <?php echo sizeof($invalidLogs)?></h2>
	<table>
		<thead>
			<tr>
				<th>Date</th> <th>Time</th> <th>Input</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if ($invalidLogs != null){
			    foreach ($invalidLogs as $log){
			        echo "<tr><td>".$log->date."</td> <td>".$log->time."</td> <td>".$log->input."</td></tr>";
			    }
			}
			?>
		</tbody>
	</table>
</div>
</body>
</html>