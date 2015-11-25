<!-- Common PHP page for the Bodemer Collection-->
<?php
	include("credentials.php");

	function head() { ?>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="underscore-min.js" type="text/javascript"></script>
		<script src="backbone-min.js" type="text/javascript"></script>
		<script src="//uw.edu/assets/uw.js" type="text/javascript"></script> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="images/title_image.jpeg" type="image/jpeg" rel="shortcut icon" />
		<link rel="stylesheet" href="//uw.edu/assets/uw.css" type="text/css"/>
		<link rel="stylesheet" href="styles/style.css" type="text/css" />
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<?php }

	function banner() { 
    	$department = file("categories.txt",FILE_IGNORE_NEW_LINES); 
    	$non_department = file("nondepartment.txt",FILE_IGNORE_NEW_LINES);
	?>
	         <header class="uw-thinstrip">

	         	<div>
		            <nav class="uw-thin-strip-nav align-right">
		                <ul class="uw-thin-links">
		                    <li>
		                        <a href="index.php" title=
		                        "Bodemer Collection">Bodemer Collection</a>
		                    </li>

		                    <li>
		                        <a href="about_us.php" title=
		                        "About Us">About Us</a>
		                    </li>
		                </ul>
		            </nav>

	            <div class="container">
	            	<img class="bodemer_logo" src="https://depts.washington.edu/bodemer/images/banner_purple_croped.png" alt="logo" />
	            </div>
	        </header>

	        <nav id="dawgdrops">
	            <div class="dawgdrops-inner container">
	                <ul class="dawgdrops-nav" id="menu-brand-menu">
	                    <li class="dawgdrops-item">
	                        <a href=
	                        "index.php"
	                        title="Home">Home</a>
	                    </li>

	                    <li class="dawgdrops-item">
	                        <a class="dropdown-toggle" href=
	                        "categories.php?c=dept"
	                        title="Visual">Departments</a>
	                       
	                        <ul class="dawgdrops-menu">
	                        	<div>
		                            <?php 
		                            if ($department) {
										foreach($department as $category) { ?>
											<li>
				                                <a href=
				                                "https://depts.washington.edu/bodemer/category.php?category=<?=$category?>"
				                                title="<?=$category?>"><?=$category?></a>
				                            </li>
										<?php } 
									} ?>
								</div>
							
                            </ul>
	                    </li>

	                    <?php if ($non_department) { ?>
		                    <li class="dawgdrops-item">
		                        <a class="dropdown-toggle" href=
		                        "categories.php?c=non"
		                        title="Visual">Non-Departmental</a>
		                       
		                        <ul class="dawgdrops-menu">
		                        	<div>
			                            <?php 
											foreach($non_department as $category) { ?>
												<li>
					                                <a href=
					                                "https://depts.washington.edu/bodemer/category.php?category=<?=$category?>"
					                                title="<?=$category?>"><?=$category?></a>
					                            </li>
											<?php } ?>
									</div>
	                            </ul>
		                    </li>
	                    <?php } ?>

	                    <li class="dawgdrops-item">
	                        <a class="dropdown-toggle" href=
	                        "collections.php"
	                        title="Collections">Collections</a>

	                        <ul class="dawgdrops-menu">
	                        	<div>
		                            <?php 
		                            	$abbr = ["weed", "mckie", "minor", "desoto"];
										$collections = ["Dr Gideon A. Weed", 
												"Dr J. F. McKie", "Dr Thomas T. Minor", 
												"Dr A. DeSoto"];
										for ($i = 0; $i < count($abbr); $i++) { ?>
											<li>
				                                <a href=
				                                "https://depts.washington.edu/bodemer/collection.php?physician=<?=$abbr[$i]?>"
				                                title="<?=$collections[$i]?>"><?=$collections[$i]?></a>
				                            </li>
										<?php } ?>
								</div>
                            </ul>

	                    </li>

	                    <li class="dawgdrops-item">
	                        <a href="gallery.php"
	                        title="Gallery">Gallery</a>
	                    </li>
	                </ul>
	            </div>
	        </nav>

	        <nav aria-label="relative" class="frontpage bighero" id="mobile-relative" role="navigation">
	        	<div id="spacer"></div>
	        	<button class="uw-mobile-menu-toggle">Menu</button>
	        	<ul class="uw-mobile-menu first-level" style="display: none;">
	        		<div class="menu-dropdowns-container">
	        			<ul class="" id="menu-dropdowns-1">
	        				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
	        					<a href="index.php">Home</a>
        					</li>
        					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
	        					<a href="categories.php?c=dept">Departments</a>
        					</li>
        					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
	        					<a href="categories.php?c=non">Non-Departmental</a>
        					</li>
        					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
	        					<a href="collections.php">Collections</a>
        					</li>
        					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
	        					<a href="gallery.php">Gallery</a>
        					</li>
        					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
	        					<a href="about_us.php">About Us</a>
        					</li>
    					</ul>
					</div>
				</ul>
			</nav>
	<?php }
	
	function valids() { ?>
	
	<?php }

	function footer() { ?>
		<div class="uw-footer">
			<p>&#169;2014 Bodemer Collection. All rights reserved.</p>
		</div>
	<?php }
?>