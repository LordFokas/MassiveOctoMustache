<?php
	class Buffer{
		private $filename;
		
		public function __construct($folder, $item){
                        $folder = "./{$folder}/";
                        if(!file_exists($folder))
                            mkdir($folder);
			$this->filename = "{$folder}{$item}.html";
			ob_start(array($this, 'write'));
		}
		
		public function save(){
			@ob_end_flush();
		}
		
		public function write($output){
			file_put_contents($this->filename, $output);
		}
	}
?>