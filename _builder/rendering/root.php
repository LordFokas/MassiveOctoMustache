<!DOCTYPE html>
<html>
<head>
	<!-- Standard Meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<!-- Site Properties -->
	<title> StargateTech 2 </title>
	<link rel="stylesheet" type="text/css" href="../_resources/semantic/css/semantic.css">
	<link rel="stylesheet" type="text/css" href="../_resources/css/root.css">
	<link rel="icon" type="image/png" href="../_resources/favicon.png">

	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.address/1.6/jquery.address.js"></script>
	<script src="../_resources/semantic/javascript/semantic.js"></script>
	<script src="../_resources/js/menu.js"></script>
</head>


<body>
	<div id="root">
		<!-- LOGO -->
		<div id="logo"></div>

		<!-- MENU -->
		<div id="menu" class="ui tiered menu">
			<div class="menu" id="menu-tabs">
				<a class="active item orange" id="tab-misc">
					<i class="globe icon"></i>
					Miscellaneous
				</a>
				<a class="item orange" id="tab-block">
					<i class="users icon"></i>
					Blocks
				</a>
				<a class="item orange" id="tab-item">
					<i class="users icon"></i>
					Items
				</a>
				<a class="item orange" id="tab-res">
					<i class="truck icon"></i>
					Resources
				</a>
				<a class="item orange" id="tab-mech">
					<i class="settings icon"></i>
					Mechanics
				</a>
				<a class="item orange" id="tab-tut">
					<i class="users icon"></i>
					Tutorials
				</a>
			</div>
			<div class="ui sub menu" id="sub-misc">
				<a class="active item" href="../miscellaneous/home.html">
					<i class="home icon"></i>
					Home
				</a>
				<a class="item" href="../miscellaneous/downloads.html">
					<i class="download disk icon"></i>
					Downloads
				</a>
				<a class="item" href="../miscellaneous/changelog.html">
					<i class="text file icon"></i>
					Changelog
					</a>
				<a class="item" href="http://www.youtube.com/user/L0RDF0KAS" target="_blank">
					<i class="youtube icon"></i>
					YouTube Channel
				</a>
				<a class="item" href="http://www.minecraftforum.net/topic/1584795-" target="_blank">
					<i class="chat outline icon"></i>
					Forum Thread
				</a>
				<a class="item" href="https://github.com/LordFokas/StargateTech2" target="_blank">
					<i class="github alternate icon"></i>
					Source Code
				</a>
				<a class="item" href="http://webchat.esper.net/?nick=wikiUser...&channels=StargateTech" target="_blank">
					<i class="chat outline icon"></i>
					IRC Channel
				</a>
			</div>
			<!-- This needs to be automated in some sense, having them all set to 'under-construction' is not going to help people navigating -->
			<div class="ui sub menu" id="sub-block">
				<a class="item" href="../block/shield-emitter.html"> Shield Emitter </a>
				<a class="item" href="../block/particle-ionizer.html"> Particle Ionizer </a>
				<a class="item" href="../block/transport-ring.html"> Transport Ring </a>
				<a class="item" href="../block/under-construction.html"> Naquadah Ore </a>
				<a class="item" href="../block/under-construction.html"> Lantean Wall </a>
				<a class="item" href="../block/naquadah-rail.html"> Naquadah Rail </a>
				<a class="item" href="../block/under-construction.html"> Stargate </a>
				<a class="item" href="../block/under-construction.html"> Abstract Bus Cable </a>
				<a class="item" href="../block/under-construction.html"> Abstract Bus Adapter </a>
			</div>
			<div class="ui sub menu" id="sub-item">
				<a class="item" href="../item/under-construction.html"> Personal Shield </a>
				<a class="item" href="../item/tablet-pc.html"> Tablet PC </a>
				<a class="item" href="../item/under-construction.html"> Power Crystals </a>
				<a class="item" href="../item/under-construction.html"> Naquadah Ingot </a>
				<a class="item" href="../item/under-construction.html"> Naquadah Dust </a>
				<a class="item" href="../item/under-construction.html"> Naquadah Bar </a>
				<a class="item" href="../item/under-construction.html"> Naquadah Plate </a>
				<a class="item" href="../item/under-construction.html"> Semiconductor Lattice </a>
				<a class="item" href="../item/under-construction.html"> Circuit Crystal </a>
			</div>
			<div class="ui sub menu" id="sub-res">
				<a class="item" href="../resources/under-construction.html"> Power </a>
				<a class="item" href="../resources/under-construction.html"> Ionized Particles </a>
			</div>
			<div class="ui sub menu" id="sub-mech">
				<a class="item" href="../mechanics/under-construction.html"> Abstract Bus </a>
				<a class="item" href="../mechanics/under-construction.html"> Lazy Intercom Protocol (LIP)</a>
			</div>
			<div class="ui sub menu" id="sub-tut">
				<a class="item">
					<i class="frown icon"></i>
					There are no tutorials yet
					<i class="frown icon"></i>
				</a>
			</div>
		</div>

		<!-- SHOW CURRENT TAB -->
		<script type="text/javascript">
			showTab("<?php echo $tab; ?>");
		</script>

		<!-- CONTENT -->
		<div id="content">
			<?php
				switch($tab){
					case "misc":
						if($item == "home"){ require "./_builder/rendering/misc/home.php"; }
						if($item == "downloads"){ require "./_builder/rendering/misc/downloads.php"; }
						if($item == "changelog"){ require "./_builder/rendering/misc/changelog.php"; }
						break;
					case "block":
						require_once "./_builder/rendering/block.php";
						renderBlock($item);
						break;
					case "item":
						require_once "./_builder/rendering/item.php";
						renderItem($item);
						break;
					case "res":
						require_once "./_builder/rendering/resource.php";
						renderResource($item);
						break;
					case "mech":
						require_once "./_builder/rendering/mechanic.php";
						renderMechanic($item);
						break;
					default: break;
				}
			?>
		</div>

		<!-- FOOTER -->
		<div class="ui inverted segment" id="footer">
			<span>
				<i class="blue code icon"></i>
				Designed and coded by LordFokas
			</span>
			<span>
				<i class="red bolt icon"></i>
				Powered by PHP and Semantic-UI
			</span>
			<span>
				<i class="green url icon"></i>
				Kindly hosted by JoshTheEnder
			</span>
		</div>
	</div>
</body>
</html>
