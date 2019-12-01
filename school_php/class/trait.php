<?php
class Base {
    public function sayHi() {
        echo 'Hi ';
    }
}

trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
	public function sayHi(){
		parent::sayHi();
		echo " trait!<br/>";
	}
}

class MyHelloWorld extends base {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

$o = new MyHelloWorld();
$o->sayHi();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();

?> 