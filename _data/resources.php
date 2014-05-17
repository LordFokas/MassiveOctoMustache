<?php
	require_once "./_data/stacks.php";
	require_once "./_data/apis.php";
	
	class ResourceRegistry{
		private static $resources = array();
		
		public static function get($resource){
			return self::$resources[$resource];
		}
		
		private static function put($name, $resource){
			self::$resources[$name] = $resource;
		}
		
		public static function init(){
			$underConstruction = new Resource("Under Construction", "underConstruction.png");
			
			self::put("under-construction", $underConstruction);
                        
			$underConstruction->setDescription("This resource's information is under construction, check back later!");
		}
	}
	
	class Resource extends Stackable{
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
	
	ResourceRegistry::init();
	require_once "./_data/recipes.php";
?>