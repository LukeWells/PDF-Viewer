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
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
			
		require 'api.php';

		$folderName = $_GET['folderName'];
		$poolId = $_GET['poolId'];
		
		$jigPath = "D:/jigFolder/".$folderName."/";
		$output_file = "D:/jigFolder/outputs/".$poolId.".html";
		$jigList = $poolId.".pdf";

		//run conversion and display on this page.
		if(file_exists($output_file)) {
			echo file_get_contents($output_file);
		} else {
			try {
				$api->convert([
					"inputformat" => "pdf",
					"outputformat" => "html",
					"input" => "upload",
					"converteroptions" => [
						"page_width" => 924,
						"page_height" => 668,
					],
					"file" => fopen($jigPath.$jigList, 'r')])->wait()->download("D:/jigFolder/outputs/");
					
			echo file_get_contents($output_file);

			} catch (\CloudConvert\Exceptions\ApiBadRequestException $e) {
				echo "Something with your request is wrong: " . $e->getMessage();
			} catch (\CloudConvert\Exceptions\ApiConversionFailedException $e) {
				echo "Conversion failed, maybe because of a broken input file: " . $e->getMessage();
			}  catch (\CloudConvert\Exceptions\ApiTemporaryUnavailableException $e) {
				echo "API temporary unavailable: " . $e->getMessage() ."\n";
				echo "We should retry the conversion in " . $e->retryAfter . " seconds";
			} catch (Exception $e) {
				// network problems, etc..
				echo "Something else went wrong: " . $e->getMessage() . "\n";
			} 
		} 
	?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>

