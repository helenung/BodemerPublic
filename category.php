<?php 
	if (!isset($_GET["c"])) {
		header('Location: https://depts.washington.edu/bodemer/');
		die();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			include("common.php");
			head(".");

			// GET variables
			$c = $_GET["c"];

			$query = "SELECT * FROM $CURRENT_REV "
					. "WHERE uwdept LIKE \"%$c%\""
					. "ORDER BY number ASC";
			if ($c == "Unclassified") {
				$query = "SELECT * FROM $CURRENT_REV WHERE uwdept = \"\"";
			}

			$result = mysqli_query($mysqli_connection, $query);
			
		?>
		<title>BC - <?=$c?></title>
	</head>

	<body>
		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner("."); ?>
				<div class="container uw-body">
					<div class="row">
						<div class="col-md-12 uw-content">
							<?php 
								$count = 0;
								$info = mysqli_fetch_assoc($result);
								if (!$info) {
									woops();
								} else { 
							?>

							<h1><?=$c?></h1>
							<p class="sub">Click on image for item information</p>
							

								<?php do { 
									$image = "artifact_images_half/" . $info['number'] . ".jpg";
									$alt = $info['name'];
									$title = $alt;
									if (!file_exists($image)) {
										$image = "HuskyDog.png";
										$alt = "a cute Husky dog";
										$title = "artifact image not currently available";
									}

									if ($count % 4 == 0) { ?>
							<div class="row">
									<?php } ?>

								<div class="col-md-3 col-sm-3">
									<a class="artifact_link" href="artifact.php?id=<?=$info['number']?>">
										<img class="artifact_pic" src="<?=$image?>" alt="<?=$alt?>" title="<?=$title?>">
									</a>
								</div>

								<?php 
									if ($count % 4 == 3) { ?>
							</div>
									<?php } 
									$count++;
								} while ($info = mysqli_fetch_assoc($result)); 
									if ($count % 4 != 0) { ?>
							</div>
								<?php }
							} ?>
						</div>
					</div>
				</div>
				<?= footer(); ?>
			</div>
		</div>
	</body>
</html>
