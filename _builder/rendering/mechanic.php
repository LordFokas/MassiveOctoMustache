<?php
	require_once "./_data/mechanics.php";
	
	function renderMechanic($mechanic){
		$mechanic = MechanicRegistry::get($mechanic);
		?>
		<div class="ui segment">
			<div class="column128">
				<img src="../_resources/img/mechanic/<?php echo $mechanic->getIcon(); ?>" class="icon128" />
			</div>
			<div class="column730">
				<h2 style="margin-top: 0px;"><?php echo $mechanic->getName(); ?></h2>
				<p><?php echo $mechanic->getDescription(); ?></p>
			</div>
		</div>
		<?php
	}
?>