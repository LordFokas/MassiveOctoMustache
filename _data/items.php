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
			$naquadahIngot = new Item("Naquadah Ingot", "naquadahIngot.png");
			$naquadahDust = new Item("Naquadah Dust", "naquadahDust.png");
			$naquadahPlate = new Item("Naquadah Plate", "naquadahPlate.png");
			$magCoil = new Item("Magnetic Induction Coil", "coilNaquadah.png");
			$endCoil = new Item("Matter Conductance Coil", "coilEnder.png");
			$circuit = new Item("Circuit Crystal", "circuitCrystal.png");
			$shield = new Item("Personal Shield", "personalShield.png");
			
			$tabletPc = new Item( "Tablet PC", "tabletPC.png"); // changed Pc -> PC because that's how the image file is named and Unix is case sensitive
			//$underConstruction = new Item("Under Construction", "underConstruction.png");

			self::put("naquadah-ingot", $naquadahIngot);
			self::put("naquadah-dust", $naquadahDust);
			self::put("naquadah-plate", $naquadahPlate);
			self::put("magnetic-induction-coil", $magCoil);
			self::put("matter-conductance-coil", $endCoil);
			self::put("circuit-crystal", $circuit);
			self::put("personal-shield", $shield);
			
			self::put("tablet-pc", $tabletPc ); // i like how this entry was added yet it's the last on the build list, ohhwell...
			//self::put("under-construction", $underConstruction);

			$naquadahIngot->setDescription("In Stargate Lore, Naquadah is a super-heavy metal used by a wide number of different races.<br>".
				"In StargateTech however, it is the primary base component that is used to craft the devices and items. The ingots can be obtained by either ".
				"smelting naquadah ore / dust or finding them in loot pods."
			);

			$naquadahDust->setDescription("It's the product of smashing and/or grinding the ore. You get 2x Dust per naquadah ore block.<br>".
				"Can be smelted into Naquadah Ingots."
			);
			
			$naquadahPlate->setDescription("A reinforced plate of pure Naquadah.<br />It is used to craft machines that require a lot of structural stability.");
			$magCoil->setDescription("By forcing a strong current through the Magnetic Induction Coil it creates a very powerful magnetic field.");
			$endCoil->setDescription("Exploiting the weird properties of Ender Pearls you can materialize, dematerialize and transport matter as energy.");
			
			$circuit->setDescription("Using the purest Naquadah as a superconductor and Nether Quartz's crystalline structure ".
				"the Ancients came up with a small, light, waterproof and electrically efficient circuit which they promptly ".
				"used as the base for most of their technology."
			);
			
			$shield->setDescription("When the war against the Wraith began the Ancients developed a small portable shield to protect them on their field trips.<br />".
				"While it can only block out physical damage, which means you can still drown, starve or asphyxiate in rock-slides among others, it has saved many ".
				"Ancient lives from surprise attacks and / or finding themselves among a horde of enemies.<br /><br />".
				"It will protect you as long as you carry it on your inventory and it has energy. After it depletes there's no recharging it."
			);
			
			$tabletPc->setDescription("The Tablet Pc allows for configuring blocks that do not have a GUI such as the Particle Ionizer and Shield Emitter<br>".
				"Works on Shield blocks and the base blocks of the Stargate. THIS ITEM IS SUBJECT TO A LOT OF CHANGES."
			);

			//$underConstruction->setDescription("This item's information is under construction, check back later!");
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
