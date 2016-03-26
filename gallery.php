<!DOCTYPE html>
<html>
	<head>
		<title>BC - Gallery</title>
		<?php 
			include("common.php");
			head(".");
			$data = mysqli_query($mysqli_connection, 
					"SELECT * FROM $CURRENT_REV
					ORDER BY number ASC");
			$info = mysqli_fetch_array( $data );
		?>
	</head>

	<body>
		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner("."); ?>
				<div class="container uw-body">
					<div class="row">
						<div class="col-md-12 uw-content">
							<h1 class="nomargin">Gallery</h1>
							<p class="sub">Click on image for item information</p>

							<?php 
							$counter = 0;
							do { 
								$image = "artifact_images_half/" . $info['number'] . ".jpg"; 
								$alt = $info['name'];
								$title = $info['name'];
								if (!file_exists($image)) {
									$image = "HuskyDog.png";
									$alt = "a cute Husky dog";
									$title = "artifact image not currently available";
								}
								if ($counter % 4 == 0) {
								?>
							<div class="row">
							<?php } ?>

								<!-- <div class="gallery-div col-md-3 col-sm-3"> -->
								<div class="col-md-3 col-sm-3 col-xs-3">
								
									<a class="artifact_link" href="artifact.php?id=<?=$info['number']?>">
										<img class="artifact_pic" src="<?=$image?>" alt="<?=$alt?>" title="<?=$title?>">
									</a>
								</div>

							<?php 
								if ($counter % 4 == 3) { ?>
							</div>

							<?php 
								}	
								$counter++;
							} while ($info = mysqli_fetch_array( $data )); 

							if ($counter % 4 != 3) { ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?= footer(); ?>
			</div>
		</div>
	</body>
</html>
