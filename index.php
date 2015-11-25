<!-- Welcome to the website for the Bodemer Collection! It is currently a work-in-progress :-) -->

<!DOCTYPE html>
<html>
	<head>
		<title>Bodemer Collection</title>
		<?php 
			include("common.php");
			head();
		?>
	</head>
	
	<body>
		
		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner(); ?>
				<div class="container uw-body">
					<div class="row">
						<div class="col-md-8 uw-content">
							<h1 class="title">Welcome</h1>
							<p> Thank you for visiting the Bodemer Collection, please have a look around!</p>
							<img src="HuskyDog.png" alt="husky dog" />
						</div>
					</div>
				</div>
				<?= footer(); ?>
			</div>
		</div>
	</body>
</html>
