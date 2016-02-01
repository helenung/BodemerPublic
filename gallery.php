<!DOCTYPE html>
<html>
	<head>
		<title>BC - Gallery</title>
		<?php 
			include("common.php");
			head();
			$data = mysqli_query($mysqli_connection, 
					"SELECT * FROM $CURRENT_REV
					ORDER BY number ASC");
			$info = mysqli_fetch_array( $data );
		?>
	</head>

	<body>
		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner(); ?>
				<div class="container uw-body">
					<div class="row">
						<div class="col-md-8 uw-content">
							<h1 class="nomargin">Gallery</h1>
							<?php do { 
								if (file_exists("artifact_image_thumbnails/" . $info['number'] . ".jpg")) {
								?>

							<div class="col-md-3 col-sm-3 holder galItem">
								<a class="artifact_link" href="artifact.php?id=<?=$info['number']?>">
									<img class="artifact_pic" src="artifact_image_thumbnails/<?=$info['number']?>.jpg" alt="picture" title="<?=$info['name']?>">
								</a>
							</div>

							<?php 
								}
							} while ($info = mysqli_fetch_array( $data )); ?>

						</div>
					</div>
				</div>
				<?= footer(); ?>
			</div>
		</div>
	</body>
</html>
