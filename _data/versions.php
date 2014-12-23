<?php
	class Change{
		private $type;
		private $text;
		
		public function __construct($type, $text){
			$this->type = $type;
			$this->text = $text;
		}
		
		public function getType(){ return $this->type; }
		public function getText(){ return $this->text; }
	}
	
	class Changelog{
		private $changes = array();
		
		public function getChanges(){
			return $this->changes;
		}
		
		public function add($text){
			$this->changes[] = new Change("add", $text);
			return $this;
		}
		
		public function rem($text){
			$this->changes[] = new Change("rem", $text);
			return $this;
		}
		
		public function fix($text){
			$this->changes[] = new Change("fix", $text);
			return $this;
		}
		
		public function alt($text){
			$this->changes[] = new Change("alt", $text);
			return $this;
		}
	}
	
	class Version{
		private $name;
		private $out;
		private $mc;
		private $forge;
		private $link;
		private $log;
		
		public function __construct($n, $o, $m, $f, $l){
			$this->name = $n;
			$this->out = $o;
			$this->mc = $m;
			$this->forge = $f;
			$this->link = $l;
		}
		
		public function getName(){ return $this->name; }
		public function getOut(){ return $this->out; }
		public function getMC(){ return $this->mc; }
		public function getForge(){ return $this->forge; }
		public function getLink(){ return $this->link; }
		public function getChangelog(){ return $this->log; }
		
		public function setChangelog($changelog){
			$this->log = $changelog;
			return $this;
		}
	}
	
	class DependentVersion extends Version{
		private $super;
		
		public function __construct($n, $o, $m, $s, $f, $l){
			parent::__construct($n, $o, $m, $f, $l);
			$this->super = $s;
		}
		
		public function getSuper(){ return $this->super; }
	}
	
	class VersionList{
		private static $bcVersions = array();
		
		public static function getBCVersions(){
			return self::$bcVersions;
		}
		
		########################################################################################################################################################################
		########################################################################################################################################################################
		public static function init(){
			self::$bcVersions[] = (new DependentVersion("0.7.6 Alpha", "10-Dec-14", "1.7.10", "TE 4.0.0.0", "1232",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-7-6-MC1710-Forge1232.jar"))->setChangelog((new Changelog())
				-> fix("Crashing on some JVMs when ComputerCraft wasn't present.")
				-> alt("Overhauled mod integration system.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.7.5 Alpha", "05-Oct-14", "1.7.10", "TE 4.0.0.0", "1232",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-7-5-MC1710-Forge1232.jar"))->setChangelog((new Changelog())
				-> alt("Ported to Minecraft 1.7.10")
				-> fix("Minor fixes.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.7.4 Alpha", "29-Jul-14", "1.6.4", "TE 3.0.0.2", "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-7-4-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> fix("Server randomly crashing on boot.")
				-> fix("Clients crashing when rendering on partially-loaded worlds. Probably.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.7.3 Alpha", "23-Jun-14", "1.6.4", "TE 3.0.0.2", "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-7-3-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> alt("Buffed Abstract Bus Cable recipe output.")
				-> fix("Naquadah Blocks merging with and transforming into Naquadah Ore.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.7.2 Alpha", "15-Jun-14", "1.6.4", "TE 3.0.0.2", "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-7-2-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> add("Tinker's Construct integration :D")
				-> add("Naquadah Block, a storage solution for ingots.")
				-> fix("Players being unable to write underscores in Shield Controller GUI.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.7.1 Alpha", "05-Jun-14", "1.6.4", "TE 3.0.0.2", "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-7-1-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> fix("Shield Controllers can now be crafted. My bad :|")
				-> fix("Crash when CC wasn't present. Also my bad :|")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.7.0 Alpha", "04-Jun-14", "1.6.4", "TE 3.0.0.2", "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-7-0-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> add("API now allows custom world/address generation.")
				-> add("Abstract Bus machines can now provide feedback.")
				-> add("CoFH Friend system can be used to configure shields. Currently disabled until CoFH provides client sync.")
				-> add("GUI Tabs.")
				-> add("Sided configuration.")
				-> alt("The Particle Ionizer can now accept liquids.")
				-> alt("Complete overhaul of the Shield-related systems (particle ionizer, shield emitters, etc).")
				-> alt("Overhauled the machine abstraction layer.")
				-> fix("Stargate and Transport Ring lighting bugs.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.6.5 Alpha", "04-Feb-14", "1.6.4", "---"     , "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-6-5-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> add("API now exposes more features.")
				-> alt("Split the Core module into Automation, Core, Enemy, Energy, Factory, Transport and World.")
				-> alt("Massively buffed the Particle Ionizer.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.6.4 Alpha", "31-Jan-14", "1.6.4", "---"     , "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-6-4-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> alt("Stargates can now have their wormholes disconnected from the Abstract Bus.")
				-> alt("Stargates can now be dialed with custom Wormhole timeouts.")
				-> alt("Changed the Stargate's Abstract Bus protocol.")
				-> alt("Stargates now require 20K RF in order to dial (source gate only).")
				-> alt("Transport Rings can now be activated from the Abstract Bus.")
				-> alt("Transport Rings can skip platforms when activated from the Bus.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.6.3 Alpha", "25-Jan-14", "1.6.4", "---"     , "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-6-3-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> fix("Fixed integration plugins not running. It's more than one might think.")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.6.2 Alpha", "23-Jan-14", "1.6.4", "---"     , "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-6-2-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> add("Added ThermalExpansion 3 support")
				-> rem("Dropped Buildcraft 4. And good riddance!")
				-> alt("Changed recipes a bit")
				-> fix("Made Abstract Bus Adapters retrievable from the world")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.6.1 Alpha", "13-Jan-14", "1.6.4", "BC 4.2.1", "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-6-1-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> add("Abstract Bus Cables as loot in Loot Pods")
				-> add("Recipes for Abstract Bus Cables and Abstract Bus Adapters")
				-> fix("Shield Emitters not persisting administrative shutdown state")
				-> fix("Obfuscation problems with the Abstract Bus API")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.6.0 Alpha", "13-Jan-14", "1.6.4", "BC 4.2.1", "965",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-6-0-MC164-Forge965.jar"))->setChangelog((new Changelog())
				-> add("Abstract Bus")
				-> add("Stargate spawns in Desert biomes")
				-> add("ComputerCraft Integration: Computers can handle the Abstract Bus through the Abstract Bus Adapter block")
				-> alt("Finished the Stargates: they now dial")
				-> alt("Nerfed Loot Pod spawns")
				-> alt("Loot Pod spawns configurable on the server side")
				-> alt("Shield Emitters can be enabled and disabled through the Abstract Bus")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.5.1 Alpha", "26-Dec-13", "1.6.4", "BC 4.1.0", "942",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-5-1-MC164-Forge942.jar"))->setChangelog((new Changelog())
				-> rem("Unnecessary synchronization")
				-> alt("Nerfed tank sizes on Particle Ionizers and Shield Emitters")
				-> alt("Shield Emitter range can be configured on the server side")
				-> fix("Naquadah Ore visible through \"invisible\" chunks")
				-> fix("Placing a Stargate crashing clients while on remote servers")
				-> fix("Naquadah ore not mineable with Tinker's Construct awesome tools")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.5.0 Alpha", "24-Dec-13", "1.6.4", "BC 4.1.0", "942",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-5-0-MC164-Forge942.jar"))->setChangelog((new Changelog())
				-> add("Stargates")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.4.2 Alpha", "06-Nov-13", "1.6.4", "BC 4.1.0", "942",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-4-2-MC164-Forge942.jar"))->setChangelog((new Changelog())
				-> alt("Shield Emitters now can only be removed or configured by the player who placed them")
				-> fix("Block / Item ID allocation is now smarter and prevents collisions")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.4.1 Alpha", "04-Nov-13", "1.6.4", "BC 4.1.0", "942",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-4-1-MC164-Forge942.jar"))->setChangelog((new Changelog())
				-> alt("Modified Naquadah Capacitor GUI")
				-> fix("Naquadah Capacitor bad upgrade behavior")
				-> fix("Wrong loot in loot pods")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.4.0 Alpha", "24-Oct-13", "1.6.4", "BC 4.1.0", "881",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-4-0-MC164-Forge881.jar"))->setChangelog((new Changelog())
				-> add("Naquadah Capacitor")
				-> add("Naquadah Power Crystals")
				-> add("Semiconductor Lattice Blend and Circuit Crystals")
				-> add("Naquadah Derivates: Dust, Bar, Plate")
				-> alt("Changed recipes to make a deeper recipe tree")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.3.1 Alpha", "17-Oct-13", "1.6.4", "BC 4.1.0", "881",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-3-1-MC164-Forge881.jar"))->setChangelog((new Changelog())
				-> add("Lantean Wall block appear in Loot Pods")
				-> fix("Players carrying Personal Shields randomly crashing upon being damaged")
				-> fix("Shield Emitters not considering \"pseudo-air\" blocks to be air")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.3.0 Alpha", "07-Oct-13", "1.6.4", "BC 4.1.0", "881",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-3-0-MC164-Forge881.jar"))->setChangelog((new Changelog())
				-> add("Lantean Wall blocks, available in 16 colors")
				-> add("World-generated Loot Pods, containing chests with loot")
				-> add("Personal Shields. Go hug a Creeper!")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.2.1 Alpha", "16-Sep-13", "1.6.2", "BC 4.0.0", "848",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-2-1-MC162-Forge848.jar"))->setChangelog((new Changelog())
				-> alt("Transport Ring Platform drops when wrenched")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.2.0 Alpha", "15-Sep-13", "1.6.2", "BC 4.0.0", "848",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-2-0-MC162-Forge848.jar"))->setChangelog((new Changelog())
				-> add("Transport Ring Platform")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.1.2 Alpha", "28-Aug-13", "1.6.2", "BC 4.0.0", "842",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-1-2-MC162-Forge842.jar"))->setChangelog((new Changelog())
				-> add("IC2 Integration: Scrap, Scrap Boxes and UU-Matter can be used as ionizable matter")
				-> fix("Dedicated server crashes")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.1.1 Alpha", "27-Aug-13", "1.6.2", "BC 4.0.0", "842",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-1-1-MC162-Forge842.jar"))->setChangeLog((new Changelog())
				-> alt("Shield Emitters and Particle Ionizers drop as blocks when wrenched")
			);
			
			self::$bcVersions[] = (new DependentVersion("0.1.0 Alpha", "26-Aug-13", "1.6.2", "BC 4.0.0", "842",
			"https://dl.dropboxusercontent.com/u/51166414/stargatetech/releases/StargateTech2-Alpha-0-1-0-MC162-Forge842.jar"))->setChangelog((new Changelog())
				-> add("Shield Emitters")
				-> add("Particle Ionizers")
				-> add("Naquadah Rails")
				-> add("Tablet PC")
				-> add("Naquadah ores and ingots")
				-> add("API Draft")
			);
		}
		########################################################################################################################################################################
		########################################################################################################################################################################
	}
	
	VersionList::init();
?>