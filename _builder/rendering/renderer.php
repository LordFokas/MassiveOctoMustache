<?php
	require_once "./_builder/Buffer.php";
	
	function render($folder, $tab, $item){
		$buffer = new Buffer($folder, $item);
		require "./_builder/rendering/root.php";
		$buffer->save();
	}
?>