<!DOCTYPE html>
<html>
	<head>
		<title>BC - Collections</title>
		<?php 
			include("common.php");
			head("."); 

			$abbr = abbr();
			$collections = collections();
		?>
	</head>

	<body>
		<?php
			$query = "SELECT DISTINCT physician FROM $CURRENT_REV";
			$result = mysqli_query($mysqli_connection, $query);
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
		?>

		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner("."); ?>
				<div class="container uw-body">
					<div class="row">
						<div class="col-md-8 uw-content">
							<h1 class="nomargin">Collections</h1>
							
							<?php 
								$i = 0;
								for ($i = 0; $i < count($abbr); $i++) { 
									$image = "images/collections/" . $abbr[$i] . ".jpg";
									if (!file_exists($image)) {
										$image = "HuskyDog.png";
									}

									if ($i % 4 == 0) { ?>
							<div class="row">
									<?php } ?>

								<div class="col-md-3 col-sm-3">
									<a class="category_link" href="collection.php?c=<?= $abbr[$i] ?>">
										<img class="collection_pic" src="<?=$image?>" alt="<?= $collections[$i] ?>" />
										<h2 class="collection_title"><?= $collections[$i] ?></h2>
									</a>
								</div> 
									<?php 
									if ($i % 4 == 3) { ?>
							</div>
									<?php }

								} 
								if ($i % 4 != 0) { ?>
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
