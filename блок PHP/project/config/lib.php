<?php

	function checkInt($int) {
		$minus = ($int < 0) ? -1 : 1;
		return  $minus * abs((int)$int);
	}
?>