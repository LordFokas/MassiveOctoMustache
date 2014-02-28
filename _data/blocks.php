<?php
	class BlockRegistry{
		private static $blocks = array();
		
		public static get($block){
			return self::$blocks[$block];
		}
		
		public static put($name, $block){
			self::$blocks[$name] = $block;
		}
	}
	
	class Block{
		
	}
	
	
?>