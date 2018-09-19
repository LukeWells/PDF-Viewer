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

	$jigPath = "D:/jigFolder/";

	echo "<table cellspacing='200'><tr><th>Pool ID</th><th>Last Modified Date</th></tr><br/>";
	
	$dir = new DirectoryIterator($jigPath);
	foreach ($dir as $fileinfo) {
		if (!$fileinfo->isDot()) {
			$jigList = $fileinfo->getFilename();
			$modTime = $fileinfo->getMTime();
			$info = pathinfo($jigList);
			$folderName = $info['filename'];
			$curPath = $jigPath.$folderName;
			if (is_dir($curPath)) {
				if ($dh = opendir($curPath)) {
					while (($file = readdir($dh)) !== false) {
						$poolId = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file); 
					}
					closedir($dh);
				}
			}
			 
			if($jigList != "outputs") {
				
				echo "<tr><td>";
				echo "<a class='btn btn-default btn-lg' href='display.php?folderName=".$folderName."&amp;poolId=".$poolId."'>";
				echo $jigList;
				echo "</a></td><td>";
				echo "&nbsp;".date('r',$modTime);
				echo "</td></tr>";
			}
		}
	}
	
    ?>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>