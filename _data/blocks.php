<?php
	require_once "./_data/stacks.php";
	require_once "./_data/apis.php";

	class BlockRegistry{
		private static $blocks = array();

		public static function get($block){
			return self::$blocks[$block];
		}

		private static function put($name, $block){
			self::$blocks[$name] = $block;
		}

		public static function init(){
			$shieldController = new Block("Shield Controller", "shieldController.png");
			$shieldEmitter = new Block("Shield Emitter", "shieldEmitter.png");
			$particleIonizer = new Block("Particle Ionizer", "particleIonizer.png");
			$transportRing = new Block("Transport Ring", "transportRing.png");
			$naquadahRail = new Block("Naquadah Rail", "naquadahRail.png");
			$naquadahOre = new Block("Naquadah Ore", "naquadahOre.png");
			$stargate = new Block("Stargate", "stargate.png");
			
			$underConstruction = new Block("Under Construction", "underConstruction.png");
			$underConstruction->setDescription("This block's information is under construction, check back later!");
			self::put("under-construction", $underConstruction);
			
			self::put("shield-controller", $shieldController);
			self::put("shield-emitter", $shieldEmitter);
			self::put("particle-ionizer", $particleIonizer);
			self::put("transport-ring", $transportRing);
			self::put("naquadah-rail", $naquadahRail);
			self::put("naquadah-ore", $naquadahOre);
			self::put("stargate", $stargate);
			
			$shieldController->setDescription("The Shield Controller allows you to control all the emitters associated with it, which can generate a shield provided the Shield Controller ".
				"has enough Ionized Particles in its internal tank. It can also be controlled through the Abstract Bus.");
			
			$shieldEmitter->setDescription("The Shield Emitter is used to direct and propel Ionized Particles in order to create a shielded surface.<br /><br />".
				"As of v0.7.0 they can no longer be placed freely, being only admissible (in)directly connected to a single ShieldController or facing an emitter that is.".
				"They also can no longer be configured or fed with Ionized Particles, which is the role of their associated ShieldController.<br /><br />".
				"Only the player who placed the Shield Emitter can remove it, by shift+clicking it with a wrench. If a Shield Controller is removed from the world ".
				"all associated Shield Emitters are removed as well."
			);

			$particleIonizer->setDescription("The Particle Ionizer is capable of reducing some kinds of matter into tiny ionized particles, charged with a lot of energy. ".
				"Upon colliding with each others at high speeds they burst, creating a small but powerful magnetic field. Frequencies and particle velocity can be adjusted to ".
				"let some kinds of entities through it.<br /><br />".
				"In order to work, the Particle Ionizer requires matter (either liquid, solid, or a mix of both) and energy (Redstone Flux). If the necessary matter has been ".
				"inserted, it will start working, filling it's internal tank with Ionized Particles, which can be pumped out by any standard fluid system."
			);

			$transportRing->setDescription("The Transport Ring allows for teleportation from one ring base to another within the same X & Z axis. <br /><br />".
				"When a player is within the transporting area (3x3 block space centered on the ring base) pressing either the up or down buttons on the keyboard will ".
				"make the rings search above or below (depending on what key was pressed) for another ring base. If one was found, the rings activate and the contents of ".
				"both ring sets are switched to the opisite base. If another ring base was not found then the rings don't activate because there is no-where for them to beam ".
				"the matter to."
			);

			$naquadahRail->setDescription("The Naquadah Rail is a special type of rail that can be placed through shields. It cannot be set as a turning track (come on now, that would be silly) ".
				"It exists as a way to have minecarts able to go through the shields."
			);
			
			$naquadahOre->setDescription("Naquadah Ore is the mineral form of Naquadah, a super heavy metal used as the base of all Ancient technology.");
			
			$stargate->setDescription("The Stargate is our crown jewel. More information (a lot more information, actually) will be added later, right now we're just composing the page stubs...");
		}
	}

	class Block extends Stackable{
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

	BlockRegistry::init();
	require_once "./_data/recipes.php";
?>
