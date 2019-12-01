<?php
/**
 * 
 * 原型接口
 *
 */
interface Prototype { public function copy(); }

/**
 * 具体实现
 *
 */
class ConcretePrototype implements Prototype{
    private  $_name;
    public function __construct($name) { $this->_name = $name; } 
    public function copy() { return clone $this;}
}

class Test {}

// client
$object1 = new ConcretePrototype(new Test());
var_dump($object1);
$object2 = $object1->copy();
var_dump($object2);
?>