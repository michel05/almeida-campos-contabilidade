<?php

/**
 * Perform Spatial Array Sort
 */
function sort_spatial($a, $b){
	if($a['matchCount'] > $b['matchCount']) {
		return -1;
	} else {
		return 1;
	}
}

?>