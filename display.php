<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Jig sheet viewer</title>
</head>
<body>	
	<div class="container">
	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$folderName = $_GET['folderName'];

	$jigPath = "D:/jigFolder/".$folderName;

	$dir = new DirectoryIterator($jigPath);
	foreach ($dir as $fileinfo) {
		if (!$fileinfo->isDot()) {
			$jigList = $fileinfo->getFilename();
			$info = pathinfo($jigList);
			if (is_dir($jigPath)) {
				if ($dh = opendir($jigPath)) {
					$poolId = $info['filename'];
				}
			}

			echo "<a class='btn btn-default btn-lg' href='jigs.php?folderName=".$folderName."&amp;poolId=".$poolId."'>";
			echo $jigList;
			echo "</a><br/>";
		}
		echo "<br>";
	}
    ?>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>