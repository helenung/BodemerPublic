<?php
	// include this file when you need the list of 
	// physicians / collections
	// it is hard-coded because it's the easiest way to do it

	function abbr() {
		$abbr = [ 
					"convention",
					"desoto", 
					"gunby", 
					"metheny", 
					"mckie", 
					"minor", 
					"peterkin", 
					"plummer",
					"providence", 
					"smith", 
					"weed"
				];
		return $abbr;
	}

	function collections() {
		$collections = [
							"A.M.A. Convention Exhibit",
							"Dr A. DeSoto", 
							"Dr Paul C. Gunby", 
							"Dr David Metheny",
							"Dr J. F. McKie", 
							"Dr Thomas T. Minor",
							"Dr Guy Shearman Peterkin",
							"Dr Reginald 'Rex' Copeland Plummer",
							"Providence Hospital", 
							"Dr Clarence A. Smith", 
							"Dr Gideon A. Weed"
						];
		return $collections;
	}
?>