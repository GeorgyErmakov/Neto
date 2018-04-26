<?php

//основные общие свойства - этот имя объекта и тип. Используем простой класс для всех подкалссов.
class thingClass {

	protected $name;
	protected $type;

	public function getName() {
       return $this->name;
	}

	public function getType()
	{
        return $this->type;
	}

	public function setName($name) {
     $this->name=$name;
     return true;
	}

	public function setType($type)
	{
      $this->type=$type;
      return true;
	}

}


interface CarsInterface {
	public function getConfiguration();
	public function carStartEngine() ;
	public function carAccelerate($drive,$dcc);
	public function carBreak(); 
	public function carGetStatus(); 
	public function carGetSpeed();

}

class CarClass extends thingClass implements CarsInterface
{
public $carBrand; 
public $carColor; 
public $carDate;
private $carSpeed;
private $carDrives= array();
private $carAcc;
private $carStatus;

public function __construct($model,$type,$brand,$date)
{
	$this->name=$model;
	$this->type=$type;
	$this->carBrand=$brand;
    $this->carDate=$date;
	return true;
} 
public function getConfiguration() {
$this->carDrives=[1,2,3,4,5];
return true;
}

public function carStartEngine() //метод включения зажигания автомобиля
{
	if ($this->carSpeed==0 && !$this->carStatus)
	{
	$this->getConfiguration();
    $this->carStatus=true;
    echo "Start engine<br>";
}
	return $this->carStatus;
} 
public function carAccelerate($drive,$acc) //метод ускорения машины
{

if (carStatus)
	{
	$this->carSpeed=$drive*$acc+$this->carSpeed;
	echo "Drive it!<br>";
}

	return $this->carSpeed;
}
public function carBreak() //метод остановки машины
{
if ($this->carStatus)
	{
    $this->carSpeed=0;
    $this->carStatus=false;
}
	return true;
}

public function carGetStatus(){
	return $this->carStatus;
}

public function carGetSpeed(){
	return $this->carSpeed;
}

}



interface TVInterface {
    public function tvOn();
    public function tvOff();
    public function tvSwitch($channal);

}


class TvClass extends thingClass implements TVInterface
{
 
public $tvVendor;

public function __construct($model,$type,$vendor)
{
	$this->type=$type;
	$this->tvVendor=$vendor;
	$this->name=$model;
	return true;
} 

public function tvOn() // функция включения ТВ
{
	return true;
} 
public function tvOff() //функция выключения ТВ
{
	return true;
} 
public function tvSwitch($channal) //функция переключения телевизора на нужный канал $channal
{
	return true;
}
}

interface PenInterface {
    public function PencilOpen();
    public function PencilClose();
    public function PencilFill($vol);

}


class PencilClass extends thingClass implements PenInterface
{
public $PencilType; 
public $PencilVendor;
public $PencilColor;

public function __construct($color,$type,$vendor,$name)
{
    $this->name=$name;
	$this->type=$type;
	$this->PencilVendor=$vendor;
	$this->PencilColor=$color;
	return true;
} 

public function PencilOpen() // метод открытия ручки
{
	return true;
} 
public function PencilClose() // метод закрытия ручки
{
	return true;
} 
public function PencilFill($vol) //метод запарвки чернил на объем $vol
{
	return true;
}

}

interface DuckInterface {
    public function duckEat();
    public function duckRun($speed);
    public function duckFly();
    public function duckSleep();

}

class DuckClass extends thingClass implements DuckInterface
{
public $DuckGender; 
public $DuckOld;

public function __construct($gender,$old,$type,$name)
{
	$this->DuckGender=$gender;
	$this->DuckOld=$old;
	$this->type=$type;
	$this->name=$name;
	return true;
} 

public function duckEat() // метод поглощения пищи, 
{
	return true;
} 
public function duckRun($speed) // метод ходьбы и полета, приводит объект в движение на скорости $speed
{
	return true;
} 
public function duckFly() //метод взлета утки
{
	return true;
}

public function duckSleep() //метод сна утки
{
	return true;
}

}

interface goodsInterface {
    public function goodGetPrice() ;
    public function goodBuy($bool) ;
    public function goodCompare();
}

class goodsClass extends thingClass implements goodsInterface
{

public $goodVendor;
public $goodPrice;
public $goodDesc;
public $goodDiscount; 
public $goodPic; 

public function __construct($vendor,$name,$type, $price,$desc,$disc,$pic)
{
	$this->goodVendor=$vendor;
	$this->name=$name;
    $this->type=$type;
	$this->goodPrice=$price;
	$this->goodDesc=$desc;
	$this->goodDiscount=$disc;
	$this->goodPic=$pic;
	return true;
} 

public function goodGetPrice() // метод получения цены
{
	return true;
} 


public function goodBuy($bool) // метод добавления в корзину или удаления из нее
{
	return true;
} 

public function goodCompare() // метод добавления к сравнению
{
	return true;
} 
}



$car = new CarClass('CX-9','паркетник',"Мазда",'2014');

echo $car->getName();
$car->carStartEngine();
echo 'Двигатель: '.$car->carGetStatus(). ' ';
echo "Скорость: ".$car->carGetSpeed().'<br>';
$car->carAccelerate(2,10);
echo 'Двигатель: '.$car->carGetStatus(). ' ';
echo "Скорость: ".$car->carGetSpeed().'<br>';
$car->carBreak();
echo 'Двигатель: '.$car->carGetStatus(). ' ';
echo "Скорость: ".$car->carGetSpeed().'<br>';

?>
