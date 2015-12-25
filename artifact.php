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
			head();

			// GET variables
			$id = $_GET["id"];
			
			$data = mysqli_query($mysqli_connection, "SELECT * FROM $CURRENT_REV WHERE number = $id");
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
				<?= banner(); ?>
				<div class="container uw-body">

					<?php
						if (!$info) {
							woops();
						} else { ?>
						<div class="row">
							<?php
								if($id == 1){
									?>
									<a class="nav right" href="artifact.php?id=<?=$id + 1?>"><span> Next &gt;</span></a>
								<?php } else {
									?>
									<a class="nav left" href="artifact.php?id=<?=$id - 1?>"><span> &lt; Previous</span></a>
									<a class="nav right" href="artifact.php?id=<?=$id + 1?>"><span> Next &gt;</span></a>
								<?php }
							?>
						</div>
						<div class="row">
							<div class="col-md-8 uw-content">
								
								<h1 class="title"><?=$info['name']?></h1>
								<div id="mainArea">
									<img src="artifact_images/<?=$id?>.jpg" alt="Artifact image" title="<?$info['name']?>" />
									<h2>Medical Specialty: <a href="http://depts.washington.edu/bodemer/category.php?category=<?=$info['uwDept']?>"><?=$info['uwDept']?></a></h2>
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
					<?php } ?>
				</div>
				<?= footer(); ?>
			</div>
		</div>
	</body>
</html>
