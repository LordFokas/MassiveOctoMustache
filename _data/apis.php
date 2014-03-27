<?php
	abstract class GameInterface{
		private $purpose;
		private $name;
		private $icon;
		
		public function __construct($purpose, $name, $icon){
			$this->purpose = $purpose;
			$this->name = $name;
			$this->icon = $icon;
		}
		
		public function getPurpose(){
			return $this->purpose;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getIcon(){
			return $this->icon;
		}
	}
	
	abstract class SidedInterface extends GameInterface{
		private $sides;
		
		public function __construct($purpose, $name, $icon){
			parent::__construct($purpose, $name, $icon);
			$this->sides = "NONE";
		}
		
		public function getSides(){
			return $this->sides;
		}
		
		public function setSides($sides){
			$this->sides = $sides;
		}
	}
	
	class PowerInterface extends GameInterface{
		public function __construct($purpose){
			parent::__construct($purpose, "Redstone Flux", "img/interfaces/rf.png");
		}
	}
?>