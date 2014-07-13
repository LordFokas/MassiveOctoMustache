<?php
	require_once "./_data/stacks.php";
	require_once "./_data/apis.php";

	class ItemRegistry{
		private static $items = array();

		public static function get($item){
			return self::$items[$item];
		}

		private static function put($name, $item){
			self::$items[$name] = $item;
		}

		public static function init(){
			$naquadahIngot = new Item( "Naquadah Ingot", "naquadahIngot.png");
			$tabletPc = new Item( "Tablet Pc", "tabletPC.png"); // changed Pc -> PC because that's how the image file is named and Unix is case sensitive
			$underConstruction = new Item("Under Construction", "underConstruction.png");

			self::put( "naquadah-ingot", $naquadahIngot);
			self::put( "tablet-pc", $tabletPc ); // i like how this entry was added yet it's the last on the build list, ohhwell...
			self::put( "under-construction", $underConstruction);

			$naquadahIngot->setDescription("Naquadah. In Stargate Lore, it's a super-dense mineral used by a wide number of different races.<br>".
				"In StargateTech however, it is the primary base component that is used to craft the devices and items. The ingots can be obtained by either ".
				"smelting naquadah ore or finding them in loot pods."
			);

			$tabletPc->setDescription("The Tablet Pc allows for configuring blocks that do not have a GUI such as the Particle Ionizer and Shield Emitter<br>".
				"Works on the Particle Ionizer, Shield Emitter and the base blocks of the Stargate."
			);

			$underConstruction->setDescription("This item's information is under construction, check back later!");
		}
	}

	class Item extends Stackable{
		private $description;
		private $interfaces;

		public function __construct($name, $icon){
			parent::__construct($name, $icon);
			$this->description = "";
			$this->interfaces = array();
		}

		public function setDescription($description){
			$this->description = $description;
		}

		public function getDescription(){
			return $this->description;
		}

		public function addInterface($interface){
			$this->interfaces[] = $interface;
		}

		public function getInterfaces(){
			return $this->interfaces;
		}
	}

	ItemRegistry::init();
	require_once "./_data/recipes.php";
?>
