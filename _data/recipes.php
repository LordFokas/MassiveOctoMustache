<?php
	require_once "./_data/blocks.php";
	
	class RecipeRegistry{
		
		public static function getRecipes($stack){
			return null;
		}
		
		public static function getUsedIn($stack){
			return null;
		}
	}
	
	interface IStackable{
		public function getIcon();
		public function getName();
	}
	
	class ItemStack{
		private $stackable;
		private $size;
		
		public function __construct($stackable, $size = 1){
			$this->stackable = $stackable;
			$this->size = $size;
		}
		
		public function getIcon(){
			return $this->stackable->getIcon();
		}
		
		public function getName(){
			return $this->stackable->getName();
		}
		
		public function getSize(){
			return $this->size;
		}
	}
?>