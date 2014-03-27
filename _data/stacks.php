<?php
	abstract class Stackable{
		private $name;
		private $icon;
		private $size;
		
		public function __construct($name, $icon){
			$this->name = $name;
			$this->icon = $icon;
			$this->size = 64;
		}
		
		public function getIcon(){
			return $this->icon;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getMaxStackSize(){
			return $this->size;
		}
		
		public function setMaxStackSize($size){
			$this->size = $size;
		}
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