<?php

	function checkInt($get_int) {
		$minus = ($get_int < 0) ? -1 : 1;
		return  $minus * abs((int)$get_int);
	}
?>
