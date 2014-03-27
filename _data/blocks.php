<?php
	require_once "./_data/stacks.php";
	
	class BlockRegistry{
		private static $blocks = array();
		
		public static function get($block){
			return self::$blocks[$block];
		}
		
		private static function put($name, $block){
			self::$blocks[$name] = $block;
		}
		
		public static function init(){
			$shieldEmitter = new Block("Shield Emitter", "shieldEmitter.png");
			$particleIonizer = new Block("Particle Ionizer", "particleIonizer.png");
			
			self::put("shield-emitter", $shieldEmitter);
			self::put("particle-ionizer", $particleIonizer);
			
			$shieldEmitter->setDescription("The Shield Emitter is used to direct and propel Ionized Particles in order to create a shielded surface.<br /><br />".
			"As of v0.7.0 they can no longer be placed freely, being only admissible (in)directly connected to a single ShieldController or facing an emitter that is.".
			"They also can no longer be configured or fed with Ionized Particles, which is the role of their associated ShieldController.<br /><br />".
			"Only the player who placed the Shield Emitter can remove it, by shift+clicking it with a wrench. If a Shield Controller is removed from the world ".
			"all associated Shield Emitters are removed as well.");
			
			$particleIonizer->setDescription("The Particle Ionizer is capable of reducing some kinds of matter into tiny ionized particles, charged with a lot of energy. ".
			"Upon colliding with each others at high speeds they burst, creating a small but powerful magnetic field. Frequencies and particle velocity can be adjusted to ".
			"let some kinds of entities through it.<br /><br />".
			"In order to work, the Particle Ionizer requires matter (either liquid, solid, or a mix of both) and energy (Redstone Flux). If the necessary matter has been ".
			"inserted, it will start working, filling it's internal tank with Ionized Particles, which can be pumped out by any standard fluid system.");
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