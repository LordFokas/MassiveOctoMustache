<?php
	require_once "./_data/resources.php";
	
	function renderResource($resource){
		$resource = ResourceRegistry::get($resource);
		?>
		<div class="ui segment">
			<div class="column128">
				<img src="/_resources/img/resource/<?php echo $resource->getIcon(); ?>" class="icon128" />
			</div>
			<div class="column730">
				<h2 style="margin-top: 0px;"><?php echo $resource->getName(); ?></h2>
				<p><?php echo $resource->getDescription(); ?></p>
			</div>
		</div>
		<?php
	}
?>
