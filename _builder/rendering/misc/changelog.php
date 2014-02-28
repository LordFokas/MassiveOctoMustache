<?php
	function changelog($versionList){
		foreach($versionList as $version){
			echo "<div class=\"ui segment\">";
				echo "<div class=\"ui small black ribbon label changelog-label\">{$version->getName()} ({$version->getOut()})</div>";
				$changelog = $version->getChangelog();
				if($changelog != null){
					foreach($changelog->getChanges() as $change){
						switch($change->getType()){
							case "add":
								$t = "Added";
								$c = "#080";
								$icon = "add sign box";
								break;
							case "rem":
								$t = "Removed";
								$c = "#f00";
								$icon = "minus sign alternate";
								break;
							case "fix":
								$t = "Fixed";
								$c = "#02c";
								$icon = "wrench";
								break;
							case "alt":
								$t = "Changed";
								$c = "#f80";
								$icon = "edit";
								break;
							default: break;
						}
						echo "<div><i class=\"$icon icon\" style=\"color: $c;\" title=\"$t\"></i>{$change->getText()}</div>";
					}
				}
			echo "</div>";
		}
	}
	
	require_once "./_data/versions.php";
	changelog(VersionList::getBCVersions());
?>