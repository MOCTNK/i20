<?php

	function checkInt($get_int) {
		if($get_int < 0) {
			$minus = -1;
		} else {
			$minus = 1;
		}
		return  abs((int)$get_int);
	}
?>