<?php 

	function peterkin() { ?>

		<div class="row peterkin">
			<img src="images/peterkin/peterkin-1.jpg" alt="page1" />
			<img src="images/peterkin/peterkin-2.jpg" alt="page2" />
			<img src="images/peterkin/peterkin-3.jpg" alt="page3" />
			<img src="images/peterkin/peterkin-4.jpg" alt="page4" />
		</div>

	<?php
	}

	function collection($msi, $src, $phys, $feat, $hdr, $other, $link) {

?>
	<div class="collection-header">
		<h2><?= $hdr ?></h2>
		<img src="<?= $phys . "/" . $feat ?>" alt="feature collection" />
		<hr />
	</div>

	<?php
		$qq = "SELECT * FROM $phys";
		$rr = mysqli_query($msi, $qq);
		$counter = 0;
		while($ii = mysqli_fetch_assoc($rr)) {
			$image = "$phys/25/$src" . $ii['number'] . ".jpg";
			$alt = "artifact number " . $ii['number'];
			$title = $ii['name'];
			if (!file_exists($image)) {
				$image = "HuskyDog.png";
				$alt = "a cute Husky dog";
				$title = "Artifact image not currently available";
			} 

			if ($counter == 0) { ?>
	<div class="row">
	<?php 
			} else if ($counter % 3 == 0) { 
	?>
	</div>
	<div class="row">
	<?php 
			} 
	?>

		<div class="col-md-4">
			<a href="artifact.php?id=<?=$link . "" . $src . "" . $ii['number']?>">
				<img class="collection_item" src="<?=$image?>" alt="<?=$alt?>" title="<?=$title?>" />
			</a>
		</div>

	<?php 
			$counter++;
		} 
	?>
		</div>

	<?php
		if ($other) { 
	?>
	<div class="collection-header">
		<h2>Other</h2>
		<hr />
	</div>
	<?php 
		}
	}
?>
