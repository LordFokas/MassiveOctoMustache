<?php
	require_once "./_builder/rendering/renderer.php";
	
	function build($folder, $item){
		switch($folder){
			case "miscellaneous":
				render($folder, "misc", $item);
				break;
			case "block":
				render($folder, "block", $item);
				break;
			case "item":
				render($folder, "item", $item);
				break;
			case "resources":
				render($folder, "res", $item);
				break;
			case "mechanics":
				render($folder, "mech", $item);
				break;
			default: break;
		}
	}
	
	function flushFolder($folder){
		$files = glob("./$folder/*");
		foreach($files as $file){
		  if(is_file($file))
			unlink($file);
		}
	}
	
	function rebuildAll(){
		echo "Flushing folders";
		flushFolder("miscellaneous");
		flushFolder("block");
		flushFolder("item");
		flushFolder("resources");
		flushFolder("mechanics");
		
		echo "Building data<br>";
		build("resources", "under-construction");
		build("mechanics", "under-construction");
		
		echo "Building Misc<br>";
		build("miscellaneous", "home");
		build("miscellaneous", "downloads");
		build("miscellaneous", "changelog");
		
		echo "Building Blocks<br>";
		build("block", "shield-controller");
		build("block", "shield-emitter");
		build("block", "particle-ionizer");
		build("block", "transport-ring");
		build("block", "naquadah-rail");
		build("block", "naquadah-ore");
		build("block", "stargate");
		build("block", "abstract-bus-cable");
		build("block", "abstract-bus-adapter");
		build("block", "lantean-wall");
		
		echo "Building Items<br>";
		build("item", "naquadah-ingot");
		build("item", "naquadah-dust");
		build("item", "naquadah-plate");
		build("item", "magnetic-induction-coil");
		build("item", "matter-conductance-coil");
		build("item", "circuit-crystal");
		build("item", "personal-shield");
		build("item", "tablet-pc");return;
		
		build("resources", "power");
		build("resources", "ionized-particles");
		
		build("mechanics", "abstract-bus");
		build("mechanics", "lazy-intercom-protocol");
	}
?>