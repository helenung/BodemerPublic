<?php 
	if (!isset($_GET["id"])) {
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
			$id = $_GET["id"];
			$newId = $id;
			if (preg_match("/^126 /", $id)) {
				$id = preg_replace("/^126 /", "", $id);
				$table = "mckie";
				$other = true;
			} else if (preg_match("/^kol-/", $id)) {
				$id = preg_replace("/^kol-/", "", $id);
				$newId = $id;
				$table = "koluda";
				$other = true;
			} else {
				$table = $CURRENT_REV;
				$mckie = false;
			}
			
			$query = "SELECT * FROM $table WHERE number = '$id'";
			$data = mysqli_query($mysqli_connection, $query);
			$info = mysqli_fetch_array( $data );

			function notAvailable() { ?>
				<span class="notAvailable">Not Available</span>
			<?php } 
		?>

		<title>BC - Artifact</title>
	
	</head>
	
	<body>
		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner("."); ?>
				<div class="container uw-body">

					<?php
						if (!$info) {
							woops();
						} else { 
					?>
						<div class="row">
							<div class="col-md-8 uw-content">
								
								<h1 class="title"><?=$info['name']?></h1>
								<div id="mainArea">
									<?php 
										$img = "artifact_images/" . $id . ".jpg";
										$alt = "Artifact image";
										$title = $info['name'];

										if ($other) {
											$img = "$table/50/" . $newId . ".jpg";
										}
										if (!file_exists($img)) {
											$img = "HuskyDog.png";
											$alt = "Husky dog";
											$title = "Artifact image not available at this time";
										} 
									?>
									<img src="<?=$img?>" alt="<?=$alt?>" title="<?=$title?>" />
									<h2>Medical Specialty: <a href="http://depts.washington.edu/bodemer/category.php?c=<?=$info['uwDept']?>"><?=$info['uwDept'] ? $info['uwDept'] : "None" ?></a></h2>
									<hr />
									<h2><span>Information</span></h2>
									<ul>
										<li><strong>Item Name: </strong><?=trim($info['name']) ? $info['name'] : notAvailable() ?></li>
										<li><strong>Manufacturer: </strong><?=trim($info['manufacturer']) ? $info['manufacturer'] : notAvailable() ?></li>
										<li><strong>Model Number: </strong><?=trim($info['model number']) ? $info['model number'] : notAvailable() ?></li>
										<li><strong>Mfg Date: </strong><?=trim($info['mfg date']) ? $info['mfg date'] : notAvailable() ?></li>
										<li><strong>Country of origin: </strong><?=trim($info['origin']) ? $info['origin'] : notAvailable() ?></li>
										<li><strong>Medical Use: </strong><?=trim($info['medical use']) ? $info['medical use'] : notAvailable() ?></li>
									</ul>
							
									<p>Do you have feedback for this item? <a style="color:black" href="mailto:bodemer@uw.edu?subject=Bodemer Collection question for item #<?=$id?> - <?=$info['name']?>">Email us</a></p>
								</div>
							</div>
						</div>
					<?php 
						} 
					?>
				</div>
				<?= footer(); ?>
			</div>
		</div>
	</body>
</html>
