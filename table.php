<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>Mortgage Central</h1>
  <p>Desperately trying to think of more features since 2018</p>
</div>
<form action="table.php" method="post">
		<div class="form-group">
			<label for="X">Principal</label>
			<input type="text" class="form-control" id="X" name="principal">
		</div>
		<div class="form-group">
			<label for="Y">Interest</label>
			<input type="text" class="form-control" id="Y" name="interestrate">
		</div>
		<div class="form-group">
			<label for="Years">Months</label>
			<input type="number" class="form-control" id="I" name="months">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
</form>

<?php
	if (isset($_POST)) {
		$principal = $_POST["principal"];
		$interestrate = $_POST["interestrate"];
		$months = $_POST["months"];
	}

	$payment = 0;
	$interest = $interestrate * 0.01;
	function createRow($date, $principal, $interest, $payment) {
		echo "<tr><td>" . $date . "</td><td>" . $principal . "</td><td>" . $interest . "</td><td>" . $payment . "</td></tr>";
	}
	echo "<table class='table table-bordered'><thead><tr><th>Month</th><th>Mortgage Principal</th><th>Monthly Interest</th><th>Principal Payment</th></tr></thead>";
	for ($n = 1 ; $n <= $months; $n++){
		$principal = $principal - $payment;
		$accum = round(($principal * $interest),2);
		$lol = ($interest + 1) ** $months;
		$payment = round(($principal *(($interest * $lol ) / ($lol - 1))),2);
		createRow($n, $principal, $interest, $payment);
	}
echo "</table>";
 ?>

</body>
</html>