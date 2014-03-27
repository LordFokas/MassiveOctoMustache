<?php
	require_once "./_data/blocks.php";
	
	function renderBlock($block){
		$block = BlockRegistry::get($block);
		?>
		<div class="ui segment">
			<div class="column128">
				<img src="../_resources/img/block/<?php echo $block->getIcon(); ?>" class="icon128" />
			</div>
			<div class="column730">
				<h2 style="margin-top: 0px;"><?php echo $block->getName(); ?></h2>
				<p><?php echo $block->getDescription(); ?></p>
			</div>
		</div>
		<?php
	}
?>