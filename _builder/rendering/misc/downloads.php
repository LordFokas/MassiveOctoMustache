<div class="ui blue inverted segment">
	<i class="info letter icon"></i>
    These are the versions the mod was built with. It will work with most newer and probably with some older versions too. Note: BC is Buildcraft, TE is ThermalExpansion
</div>
<table class="ui table segment">
	<thead>
		<tr>
			<th> Version </th>
			<th> Released </th>
			<th> Minecraft <i class="blue info letter icon"></i></th>
			<th> Dependencies <i class="blue info letter icon"></i></th>
			<th> Forge <i class="blue info letter icon"></i></th>
			<th> Download </th>
		</tr>
	</thead>
	<tbody>
		<?php
			require_once "./_data/versions.php";
			$bc_releases = 0;
			foreach(VersionList::getBCVersions() as $version){
				$bc_releases++;
				echo "<tr><td>{$version->getName()}</td><td>{$version->getOut()}</td><td>{$version->getMC()}</td><td>{$version->getSuper()}</td><td>#{$version->getForge()}</td>";
				echo "<td><a href=\"{$version->getLink()}\" target=\"_blank\" class=\"dl-link\">Download <i class=\"disk download icon\"></i></a></td></tr>";
			}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="6">
				<?php echo $bc_releases . " releases"; ?>
			</th>
		</tr>
	</tfoot>
</table>
