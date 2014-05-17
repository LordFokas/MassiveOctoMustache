<?php
	require_once "./_data/stacks.php";
	require_once "./_data/apis.php";
	
	class MechanicRegistry{
		private static $mechanics = array();
		
		public static function get($mechanic){
			return self::$mechanics[$mechanic];
		}
		
		private static function put($name, $mechanic){
			self::$mechanics[$name] = $mechanic;
		}
		
		public static function init(){
			$underConstruction = new Mechanic("Under Construction", "underConstruction.png");
			
			self::put("under-construction", $underConstruction);
                        
			$underConstruction->setDescription("This mechanic's information is under construction, check back later!");
		}
	}
	
	class Mechanic extends Stackable{
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
	
	MechanicRegistry::init();
	require_once "./_data/recipes.php";
?>