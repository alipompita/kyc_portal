<?php
include_once 'log_check.php';
$institution = new Institution();
$institution->load($instID);

$invalidLogs = $validLogs = array();
$range = "";
if(isset($_GET['range'])){
    $range = $_GET['range'];
    
}else{
    $validLogs = $institution->getVerifiedScans();
    $invalidLogs = $institution->getInvalidInputs();
}


?>
<html>
<body>
<head>
	<style type="text/css">
	   th, td{
	       border-bottom: solid 1px #333333;
	   }
	   table { 
            border-spacing: 10px;
            border-collapse: separate;
        }
	</style>
</head>
<form>
	<input type="date" name="range" placeholder="filter-date" required <?php echo "value='$range'"?>>
	<input type="submit" value="filter">
</form>

<div>
	<h2>Valid IDs Checked: <?php echo sizeof($validLogs)?></h2>
	<table>
		<thead>
			<tr>
				
				<th>Date</th> <th>Time</th> <th>Input</th> <th>Holder</th> <th>Staff</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if ($validLogs != null){
			    foreach ($validLogs as $log){
			        $holder = new Holder();
			        $staff = new User();
			        $staff->load($log->userID);
			        $holder->load($log->input);
			        echo "<tr><td>".$log->date."</td> <td>".$log->time."</td> <td>".$log->input."</td> <td><a href='view_holder.php?id=".$log->input."'>".$holder->first_name." ".$holder->surname."</a> </td>  <td><a href='staff_reports.php?staffID=".$staff->getID()."'>".$staff->getFullName()."</a></td> </tr>";
			    }
			}
			?>
		</tbody>
	</table>
	<h2>Invalid ID Inputs: <?php echo sizeof($invalidLogs)?></h2>
	<table>
		<thead>
			<tr>
				<th>Date</th> <th>Time</th> <th>Input</th> <th>Staff</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if ($invalidLogs != null){
			    foreach ($invalidLogs as $log){
			        $staff = new User();
			        $staff->load($log->userID);
			        echo "<tr><td>".$log->date."</td> <td>".$log->time."</td> <td>".$log->input."</td> <td><a href='staff_reports.php?staffID=".$staff->getID()."'>".$staff->getFullName()."</a></td></tr>";
			    }
			}
			?>
		</tbody>
	</table>
</div>
</body>
</html>