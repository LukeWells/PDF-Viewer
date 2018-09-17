<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Jig sheet viewer</title>
</head>
<body>
	<?php

	$jigPath = "D:/jigFolder/";

	$dir = new DirectoryIterator($jigPath);
	foreach ($dir as $fileinfo) {
		if (!$fileinfo->isDot()) {
			$jigList = $fileinfo->getFilename();
			$info = pathinfo($jigList);
			$poolId = $info['filename'];

			if($jigList != "outputs") {
				echo "<a href='jigs.php?poolId=".$poolId."'>";
				echo $jigList;
				echo "</a>";
			}
		}
		echo "<br>";
	}

    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>