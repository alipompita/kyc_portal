<?php
include_once 'log_check.php';
$surname = $first_name = $sex = $idNumber = $dob = $doi = $doe = $nationality = "---";
$holder = new Holder();
if (isset($_GET['id'])) {
	if ($holder->load($_GET['id'])) {
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

<html>

<body>
	<div class="col-md-6 offset-md-3 mt-5">
		<div class="row">
			<a href="index.php" class="btn btn-link"><i class="fa fa-window-close" aria-hidden="true"></i> Close</a>
		</div>
		<br>
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
</body>

</html>