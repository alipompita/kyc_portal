<?php
include_once 'log_check.php';

$checking = $invalid  = false;

$surname = $first_name = $sex = $idNumber = $dob = $doi = $doe = $nationality = "---";

$holder = null;
if (isset($_POST['id'])) {
	$holder = Holder::verify(strtoupper($_POST['id']), $userID);
	$invalid = $holder == null;
	$checking = true;

	if (!$invalid) {
		$surname = $holder->surname;
		$first_name = $holder->first_name;
		$sex = $holder->sex;
		$idNumber = $holder->id;
		$dob = $holder->dob;
		$doi = $holder->issueDate;
		$doe = $holder->expiryDate;
		$nationality = $holder->nationality;
	}
}
?>

<div class="col-md-6 offset-md-3 mt-5 ">
	<div class="container">
		<h3>Verify ID</h3>
		<form action="index.php" method="post">
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="id" placeholder="National ID Number" required aria-label="National ID Number" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button class="btn btn-info" type="submit"><i class="fa fa-link" aria-hidden="true"></i> Check</button>
				</div>
			</div>
		</form>
	</div>
	<div class="container">
		<div>
			<?php
			if ($checking) {
				if ($invalid) {
					echo "<small style='color: red;'><i class='fa fa-exclamation-circle' aria-hidden='true'></i> Invalid ID</small> <br>";
				}
			}
			?>
		</div>
	</div>
	<div class="id-card">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<p class="col-md-12 id-label"><small>Dzina la Bambo / <span class="label-trans">Surname</span></small></p>
					<p class="col-md-12 id-value"> <?php echo $surname ?> </p>
				</div>
				<div class="row">
					<p class="col-md-12 id-label"><small>Dzina, Maina Ena / <span class="label-trans">Name,
								Other Names</span></small></p>
					<p class="col-md-12 id-value"><?php echo $first_name ?></p>
				</div>
				<div class="row">
					<div class="col-md-6 pl-0">
						<p class="col-md-12 id-label"><small>Mwamuna - Mkazi / <span class="label-trans">Sex</span></small></p>
						<p class="col-md-12 id-value"><?php echo $sex ?></p>
					</div>
					<div class="col-md-6 pl-0">
						<p class="col-md-12 id-label"><small>Tsiku Lobadwa / <span class="label-trans">Date of
									Birth</span></small></p>
						<p class="col-md-12 id-value"><?php echo $dob ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 pl-0">
						<p class="col-md-12 id-label"><small>Nambala ya Chiphaso / <span class="label-trans">Identification No</span></small></p>
						<p class="col-md-12 id-value"><?php echo $idNumber ?></p>
					</div>
					<div class="col-md-6 pl-0">
						<p class="col-md-12 id-label"><small>Dziko Lobadwila / <span class="label-trans">Nationality</span></small></p>
						<p class="col-md-12 id-value"><?php echo $nationality ?></p>
					</div>

				</div>

				<div class="row">
					<div class="col-md-6 pl-0">
						<p class="col-md-12 id-label"><small>Tsiku Lolandira Chiphaso / <span class="label-trans">Date of Issue</span></small></p>
						<p class="col-md-12 id-value"><?php echo $doi ?></p>
					</div>
					<div class="col-md-6 pl-0">
						<p class="col-md-12 id-label"><small>Tsiku Lothera Chiphaso / <span class="label-trans">Date
									of Expiry</span></small></p>
						<p class="col-md-12 id-value"><?php echo $doe ?></p>
					</div>

				</div>
			</div>
			<div class="col-md-4 mt-5 id-icons">
				<div class="col-md-12 id-icons"><i class="fas fa-user fa-10x"></i></div>
				<div class="col-md-12 id-icons mt-5"><img src="../assets/img/icons/coat-of-arms.png" alt="coat-of-arms" width="100">
				</div>
			</div>
		</div>
	</div>

</div>

<div class=" container col-md-6">

</div>




<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/font-awesome.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>