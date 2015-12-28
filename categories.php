<!DOCTYPE html>
<html>
	<head>
		<title>BC - Categories</title>
		<?php 
			include("common.php");
			head();
			$department = file("categories.txt",FILE_IGNORE_NEW_LINES);
			$non_department = file("nondepartment.txt",FILE_IGNORE_NEW_LINES);
			$c = isset($_GET["c"]) ? $_GET["c"] : NULL;
			if ($c != "dept" && $c != "non") {
				$c = NULL;
			}
		?>
	</head>

	<body>
		<div id="uw-container">
			<div id="uw-container-inner">
				<?= banner(); ?>
				<div class="container uw-body">
					<div class="row">
						<div class="col-md-8 uw-content">
							<?php 
								if ($c == NULL || $c == "dept") { ?>
									<h1>Departments in School of Medicine</h1>
									<?php 
										$counter = 0;
										foreach($department as $category){
											$category_name = strtolower(preg_replace('/\s*/', '', $category)); 
											if ($counter % 4 == 0) { ?>
												<div class="row"> 
											<?php } ?>
											<div class="col-md-3 col-sm-3 holder">
												<a class="category_link" href="category.php?category=<?=$category?>">
													<img class="category_pic" src="images/uw_seal.jpeg" alt="picture">
													<h2 class="category_title"><?=$category?></h1>
												</a>
											</div>

											<?php if ($counter % 4 == 3) { ?>
												</div> 
											<?php }
											$counter++;
										}
										if (($counter - 1) % 4 != 3) { ?>
											</div>
										<?php } 
									}
							?>

							<div>
								<?php
									if ($c == NULL || $c == "non") { ?>
										<h1>Non-Departmental</h1>
										<?php 
											$counter = 0;
											foreach($non_department as $category) {
												$category_name = strtolower(preg_replace('/\s*/', '', $category)); 
												if ($counter % 4 == 0) { ?>
													<div class="row"> 
												<?php } ?>
												<div class="col-md-3">
													<a class="category_link" href="category.php?category=<?=$category?>">
														<img class="category_pic" src="images/uw_seal.jpeg" alt="picture">
														<h2 class="category_title"><?=$category?></h2>
													</a>
												</div>

												<?php if ($counter % 4 == 3) { ?>
													</div> 
												<?php }
												$counter++;
											}
											if (($counter - 1) % 4 != 3) { ?>
												</div>
											<?php }
										}	
									?>
							</div>
						</div>
					</div>
				</div>
				<?= footer(); ?>
			</div>
		</div>					
	</body>
</html>
