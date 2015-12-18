<?php 
	if (!isset($_GET["category"])) {
		header('Location: https://depts.washington.edu/bodemer/');
		die();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			include("common.php");
			head();

			// GET variables
			$category = $_GET["category"];

			$query = "SELECT * FROM $CURRENT_REV WHERE uwdept LIKE \"%$category%\"";
			if ($category == "Unclassified") {
				$query = "SELECT * FROM $CURRENT_REV WHERE uwdept = \"\"";
			}

			$result = mysqli_query($mysqli_connection, $query);
			
		?>
		<title>BC - <?=$category?></title>
	</head>

	<body>
		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner(); ?>
				<div class="container uw-body">
					<div class="row">
						<div class="col-md-8 uw-content">
							<?php 
								$info = mysqli_fetch_assoc($result);
								if (!$info) {
									woops();
								} else { 
							?>

							<h1><?=$category?></h1>

							<?php
								$counter = 0;
								do {
									if ($counter % 4 == 0) { ?>
										<div class="row">
									<?php } ?>
									<div class="col-md-3 col-sm-3 holder">
										<a class="artifact_link" href="artifact.php?id=<?=$info['number']?>">
											<h2 class="artifact_num">Item <?=$info['number']?></h2>
											<img class="artifact_pic" src="artifact_image_thumbnails/<?=$info['number']?>.jpg" alt="picture">
										</a>
									</div>
									<?php if ($counter % 4 == 3) { ?>
										</div>
									<?php }
									$counter++;
								} while ($info = mysqli_fetch_assoc($result));
								if (($counter - 1) % 4 != 3) { ?>
									</div>
								<?php } 
							}
							?>
						</div>
					</div>
				</div>
				<?= footer(); ?>
			</div>
		</div>
	</body>
</html>
