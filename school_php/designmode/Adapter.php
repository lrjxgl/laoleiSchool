<?php
/**
 * 第一种方式：对象适配器
 */
interface Target {
    public function sampleMethod1();
    public function sampleMethod2();
}

class Adaptee {
    public function sampleMethod1() {
        echo 'AAAA<br/>';
    }
}

class Adapter implements Target {
    private $_adaptee;

    public function __construct(Adaptee $adaptee) {
        $this->_adaptee = $adaptee;
    }

    public function sampleMethod1() {
        $this->_adaptee->sampleMethod1(); 
    }

    public function sampleMethod2() {
        echo 'BBBB<br/>'; 
    }
}
$adapter = new Adapter(new Adaptee());
$adapter->sampleMethod1();
$adapter->sampleMethod2();



?>
<?php
//参考 https://www.cnblogs.com/DeanChopper/p/4770572.html
abstract class Toy  
{  
    public abstract function openMouth();  
  
    public abstract function closeMouth();  
}  
  
class Dog extends Toy  
{  
    public function openMouth()  
    {  
        echo "Dog open Mouth\n";  
    }  
  
    public function closeMouth()  
    {  
        echo "Dog close Mouth\n";  
    }  
}  
  
class Cat extends Toy  
{  
    public function openMouth()  
    {  
        echo "Cat open Mouth\n";  
    }  
  
    public function closeMouth()  
    {  
        echo "Cat close Mouth\n";  
    }  
}


//目标角色:红枣遥控公司  
interface RedTarget  
{  
    public function doMouthOpen();  
  
    public function doMouthClose();  
}  
  
//目标角色:绿枣遥控公司及  
interface GreenTarget  
{  
    public function operateMouth($type = 0);  
}


//类适配器角色:红枣遥控公司  
class RedAdapter implements RedTarget  
{  
    private $adaptee;  
  
    function __construct(Toy $adaptee)  
    {  
        $this->adaptee = $adaptee;  
    }  
  
    //委派调用Adaptee的sampleMethod1方法  
    public function doMouthOpen()  
    {  
        $this->adaptee->openMouth();  
    }  
  
    public function doMouthClose()  
    {  
        $this->adaptee->closeMouth();  
    }  
}  
  
//类适配器角色:绿枣遥控公司  
class GreenAdapter implements GreenTarget  
{  
    private $adaptee;  
  
    function __construct(Toy $adaptee)  
    {  
        $this->adaptee = $adaptee;  
    }  
  
    //委派调用Adaptee：GreenTarget的operateMouth方法  
    public function operateMouth($type = 0)  
    {  
        if ($type) {  
            $this->adaptee->openMouth();  
        } else {  
            $this->adaptee->closeMouth();  
        }  
    }  
}



class testDriver  
{  
    public function run()  
    {  
         //实例化一只狗玩具  
        $adaptee_dog = new Dog();  
        echo "给狗套上红枣适配器\n";  
        $adapter_red = new RedAdapter($adaptee_dog);  
        //张嘴  
        $adapter_red->doMouthOpen();  
        //闭嘴  
        $adapter_red->doMouthClose();  
        echo "给狗套上绿枣适配器\n";  
        $adapter_green = new GreenAdapter($adaptee_dog);  
        //张嘴  
        $adapter_green->operateMouth(1);  
        //闭嘴  
        $adapter_green->operateMouth(0);  
    }  
}  
  
$test = new testDriver();  
$test->run();

