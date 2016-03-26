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
			include("specialCollections.php");
			head(".");

			// GET variables
			$c = $_GET["c"];
			$cQuery = $c;


			// some weird outlier cases
			if ($c == "metheny") {
				// want David Metheny, not his father, S.A.S. Metheny
				$cQuery = "david%metheny";
			}
			if ($c == "smith") {
				// want C.A. Smith, not Frank
				$cQuery = "clarence";
			}

			$query = "SELECT * FROM $CURRENT_REV WHERE physician LIKE \"%$cQuery%\"";
			$result = mysqli_query($mysqli_connection, $query);
		?>
		<title>BC - Collections</title>
	</head>

	<body>
		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner("."); ?>
				<div class="container uw-body">
					<div class="row">
						<div class="col-md-12 uw-content">

							<?php
								$counter = 0;
								while($info = mysqli_fetch_assoc($result)) {
									$image = "artifact_images/" . $info['number'] . ".jpg";
									$alt = "artifact number " . $info['number'];
									$title = $info['name'];
									if (!file_exists($image)) {
										$image = "HuskyDog.png";
										$alt = "a cute Husky dog";
										$title = "Artifact image not currently available";
									}

									if ($counter == 0) { ?>
										<h1 class="physician_hdr"><?=$info['physician']?></h1>
									<?php
										if ($c == "peterkin") {
											peterkin();
										}
									?>
										<p class="sub">Click on image for item information</p>
									<?php } 
										if ($counter % 3 == 0) { ?>
											<div class="row">
									<?php } ?>
									<div class="collection-div col-md-4 col-sm-4 holder">
										<a class="artifact_link" href="artifact.php?id=<?=$info['number']?>">
											<img class="collection_item" src="<?=$image?>" alt="<?=$alt?>" title="<?=$title?>" />
										</a>
									</div>
									<?php if ($counter % 3 == 2) { ?>
										</div>
									<?php }
									$counter++;
								}
								if (($counter - 1) % 3 != 2) { ?>
									</div>
								<?php } 
								if ($counter == 0) { woops(); }
							?>
						</div>
					</div>
				</div>
				<?= footer(); ?>
			</div>
		</div>
	</body>
</html>
