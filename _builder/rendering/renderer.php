<?php
	require_once "./_builder/Buffer.php";
	
	function render($folder, $tab, $item){
		$buffer = new Buffer($folder, $item);
		require "./_builder/rendering/root.php";
		$buffer->save();
	}
	
	function displayCustomSection($file){
		$file = "./_builder/rendering/" . $file . ".php";
		if(file_exists($file)){
			require_once $file;
		}
	}
	
	function displayImage($img){
		echo "<img src=\"{$img}\" style=\"width:100%;\" />";
	}
?>