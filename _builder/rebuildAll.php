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
		flushFolder("miscellaneous");
		flushFolder("block");
		flushFolder("item");
		flushFolder("resources");
		flushFolder("mechanics");
                
		build("block", "under-construction");
                
		build("miscellaneous", "home");
		build("miscellaneous", "downloads");
		build("miscellaneous", "changelog");
		
		build("block", "shield-emitter");
		build("block", "particle-ionizer");return;
		build("block", "transport-ring");
		build("block", "naquadah-ore");
		build("block", "lantean-wall");
		build("block", "naquadah-rail");
		build("block", "stargate");
		build("block", "abstract-bus-cable");
		build("block", "abstract-bus-adapter");
		
		build("item", "personal-shield");
		build("item", "tablet-pc");
		build("item", "power-crystals");
		build("item", "naquadah-ingot");
		build("item", "naquadah-dust");
		build("item", "naquadah-bar");
		build("item", "naquadah-plate");
		build("item", "semiconductor-lattice");
		build("item", "circuit-crystal");
		
		build("resources", "power");
		build("resources", "ionized-particles");
		
		build("mechanics", "abstract-bus");
		build("mechanics", "lazy-intercom-protocol");
	}
?>