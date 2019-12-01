<?php
class Factory{
	public function create($type){
		switch($type){
			case 'Mac':
                return new MacSystem();
            case 'Win':
                return new WinSystem();
            case 'Linux':
                return new LinuxSystem();
		}
	}
}
class System{ }
class WinSystem extends System{
	
	public function __construct(){
		echo "win";
	}
	
}
class MacSystem extends System{
	public function __construct(){
		echo "mac";
	}
}
class LinuxSystem extends System{
	public function __construct(){
		echo "linux";
	}
}
$factory = new Factory();
$type="Win";
$factory->create($type);
?>