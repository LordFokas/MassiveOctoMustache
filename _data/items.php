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
			$underConstruction = new Item("Under Construction", "underConstruction.png");
			
			self::put("under-construction", $underConstruction);
                        
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