<?php
	// include this file when you need the list of 
	// physicians / collections
	// it is hard-coded because it's the easiest way to do it

	function abbr() {
		$abbr = [ 
					"koluda",
					"mckie", 
					"minor", 
					"providence", 
					"smith", 
					"weed",
					"convention",
					"desoto", 
					"gunby", 
					"metheny", 
					"peterkin", 
					"plummer"
				];
		return $abbr;
	}

	function collections() {
		$collections = [
							"Dr Stanislaw B. Koluda",
							"Dr J. F. McKie", 
							"Dr Thomas T. Minor",
							"Providence Hospital", 
							"Dr Clarence A. Smith", 
							"Dr Gideon A. Weed",
							"A.M.A. Convention Exhibit",
							"Dr A. DeSoto", 
							"Dr Paul C. Gunby", 
							"Dr David Metheny",
							"Dr Guy Shearman Peterkin",
							"Dr Reginald 'Rex' Copeland Plummer"
						];
		return $collections;
	}
?>