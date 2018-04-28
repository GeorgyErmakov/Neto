<?php

class CarClass
{
    public $carModel; 
    public $carType; 
    public $carBrand; 
    public $carColor; 
    public $carDate;
    public $carSpeed;
    public $carDrives= array();
    public $carAcc;
    
    public function __construct($model, $type, $brand, $date)
    {
        $this->carModel=$model;
	$this->carType=$type;
	$this->carBrand=$brand;
        $this->carDate=$date;
	
	return true;
     } 
	
    public function carStartEngine() //метод включения зажигания автомобиля
    {
	return true;
     } 
	
    public function carAccelerate($carDrive, $carAcc) //метод ускорения машины
    {
	return $speed;
     }
	
    public function carBreak($carSpeed) //метод остановки машины
    {
	return true;
     }
}

class TvClass
{
    public $tvType; 
    public $tvVendor;
    public $tvModel;
	
    public function __construct($model, $type, $vendor)
    {
	$this->tvtype=$type;
	$this->tvVendor=$vendor;
	$this->tvModel=$model;
	
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

class PencilClass
{
   public $PencilType; 
   public $PencilVendor;
   public $PencilColor;

   public function __construct($color, $type, $vendor)
   {
	$this->PencilType=$type;
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

class DuckClass
{
    public $DuckGender; 
    public $DuckOld;
    public $DuckType;
    public $DuckName;

    public function __construct($gender, $old, $type, $name)
    {
	$this->DuckGender=$gender;
	$this->DuckOld=$old;
	$this->DuckType=$type;
	$this->DuckName=$name;
	
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

class GoodsClass
{
    public $goodVendor;
    public $goodName;
    public $goodPrice;
    public $goodDesc;
    public $goodDiscount; 
    public $goodPic; 

    public function __construct($vendor, $name, $price, $desc, $disc, $pic)
    {
        $this->goodVendor=$vendor;
	$this->goodName=$name;
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

$car = new CarClass('CX-9', 'паркетник', 'Мазда', '2014');
$tv = new TvClass('CVB897665', 'LED', 'ACER');
$pencil = new PencilClass('Красная', 'Автомат', 'Parker');
$duck = new DuckClass('male',2, 'китайская', 'Пекинская утка');
$good = new GoodsClass ('Черноморец', 'Помидор красный', 50, 'Отличный помидор', 5, 'http://....pics/tomato.jpg');
?>
