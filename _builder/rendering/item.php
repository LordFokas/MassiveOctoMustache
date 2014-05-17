<?php
	require_once "./_data/items.php";
	
	function renderItem($item){
		$item = ItemRegistry::get($item);
		?>
		<div class="ui segment">
			<div class="column128">
				<img src="../_resources/img/item/<?php echo $item->getIcon(); ?>" class="icon128" />
			</div>
			<div class="column730">
				<h2 style="margin-top: 0px;"><?php echo $item->getName(); ?></h2>
				<p><?php echo $item->getDescription(); ?></p>
			</div>
		</div>
		<?php
	}
?>