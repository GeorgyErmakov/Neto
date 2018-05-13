<?php

//основные общие свойства - этот имя объекта и тип. Используем простой класс для всех подкалссов.

class thingClass 
{

    protected $name;
    protected $type;

    public function getName() 
    {
        return $this->name;
    }

    public function getType() 
    {
        return $this->type;
    }

    public function setName($name) 
    {
        $this->name = $name;
    }

    public function setType($type) 
    {
      $this->type = $type;
    }
}

interface CarsInterface 
{
    public function getConfiguration();
    public function carStartEngine() ;
    public function carAccelerate($drive, $dcc);
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
    private $carDrives = array();
    private $carAcc;
    private $carStatus;
    
    public function __construct($name, $type, $brand, $date)
    {
        $this->name = $name;
        $this->type = $type;
        $this->carBrand = $brand;
        $this->carDate = $date;
        $this->carStatus = false;
    } 
    
    public function getConfiguration() 
    {
        $this->carDrives=[1,2,3,4,5];
    }
    
    public function carStartEngine() //метод включения зажигания автомобиля
    {
        if ($this->carSpeed == 0 && !$this->carStatus) {
            $this->getConfiguration();
            $this->carStatus = true;
            echo "Start engine<br>";
        }
        return $this->carStatus;
    } 
    
    public function carAccelerate($drive, $acc) //метод ускорения машины
    {
        if ($this->carStatus) {
            $this->carSpeed = $drive*$acc+$this->carSpeed;
            echo "Drive it!<br>";
        }
            return $this->carSpeed;
    }
    
    public function carBreak() //метод остановки машины
    {
        if ($this->carStatus) {
            $this->carSpeed = 0;
            $this->carStatus = false;
        }
    }
    
    public function carGetStatus()
    {
        return $this->carStatus;
    }
    
    public function carGetSpeed()
    {
        return $this->carSpeed;
    }
}

interface TVInterface 
{
    public function tvOn();
    public function tvOff();
    public function tvSwitch($channal);
}

class TvClass extends thingClass implements TVInterface
{
    public $tvVendor;
    public $tvStatus;
    public $tvCurrChannel;
	
    public function __construct($name, $type, $vendor)
    {
        $this->name = $name;
        $this->type = $type;
        $this->tvVendor = $vendor;
    }

    public function tvOn() // функция включения ТВ
    {
        $this->tvStatus = true;
    } 
    
    public function tvOff() //функция выключения ТВ
    {
        $this->tvStatus = false;
    } 
    
    public function tvSwitch($channel) //функция переключения телевизора на нужный канал $channal
    {
        $this->tvCurrChannel = $channel;
    }
}

interface PenInterface 
{
    public function pencilOpen();
    public function pencilClose();
    public function pencilFill($vol);
    public function pencilDesc();
}

class PencilClass extends thingClass implements PenInterface
{
    public $PencilVendor;
    public $PencilColor;
    public $PencilState;
    public $PencilInkVolume;
    public function __construct($color, $type, $vendor, $fill)
    {
        $this->type = $type;
        $this->PencilVendor = $vendor;
        $this->PencilColor = $color;
        $this->PencilInkVolume = $fill;
    } 
    
    public function pencilOpen() // метод открытия ручки
    {
        $this->PencilState = true;
    } 
   
    public function pencilClose() // метод закрытия ручки
    {
        $this->PencilState = false;
    } 
    
    public function pencilFill($vol) //метод запарвки чернил на объем $vol
    {
        echo 'заправляем ручку, подождите ...<br/>';     
        $fill = $this->PencilInkVolume+$vol;
        $this->PencilInkVolume = min(100,$fill);
    }
    
    public function pencilDesc()
    {
        return 'Ручка '.$this->type.' '.$this->PencilVendor.' '.$this->PencilColor;
    }
}

interface DuckInterface 
{
    public function duckEat($vol);
    public function duckRun($speed);
    public function duckFly($speed);
    public function duckSleep();
}

class DuckClass extends thingClass implements DuckInterface
{
    public $DuckGender; 
    public $DuckOld;
    public $DuckState;
    public $DuckSpeed;
    public $DuckHealth;
    public function __construct($gender, $old, $type, $name)
    {
        $this->DuckGender = $gender;
        $this->DuckOld = $old;
        $this->type = $type;
        $this->name = $name;
    } 
    
    public function duckEat($vol) // метод поглощения пищи, 
    {
        $this->DuckHealth = $this->DuckHealth+log10($vol);
    } 
    
    public function duckRun($speed) // метод ходьбы и полета, приводит объект в движение на скорости $speed
    {
        $this->DuckState = 'run';
        $this->DuckSpeed = $speed;
    } 
    
    public function duckFly($speed) //метод взлета утки
    {
        $this->DuckState = 'fly';
        $this->DuckSpeed = $speed;
    }
    
    public function duckSleep() //метод сна утки
    {
        $this->DuckSpeed = 0;
        $this->DuckState = 'sleep';
    }
}

interface goodsInterface 
{
    public function goodGetPrice();
    public function goodSetPrice($price);
}

class GoodsClass extends thingClass implements goodsInterface
{
    public $goodVendor;
    public $goodPrice;
    public $goodDesc;
    public $goodDiscount; 
    public $goodPic; 
    
    public function __construct($vendor, $name, $type, $price, $desc, $disc, $pic)
    {
        $this->goodVendor = $vendor;
        $this->name = $name;
        $this->type = $type;
        $this->goodPrice = $price;
        $this->goodDesc = $desc;
        $this->goodDiscount = $disc;
        $this->goodPic = $pic;	
    } 
    public function goodGetPrice() // метод получения цены
    {
        return $this->goodPrice;
    } 
	
    public function goodSetPrice($price) // установка цены
    {
        $this->goodPrice = $price;
    } 
}

    $tv = new TvClass('CVB897665', 'LED', 'ACER');
    
    $duck = new DuckClass('male',2, 'китайская', 'Пекинская утка');
    $good = new GoodsClass ('Черноморец', 'Помидор красный','овощ', 50, 'Отличный помидор', 5, 'http://....pics/tomato.jpg');

    echo 'Пример-тест с ручкой'.'<br>';
    $pencil = new PencilClass('Красная', 'Автомат', 'Parker', 70);
    echo $pencil->pencilDesc().' запарвлена на '.$pencil->PencilInkVolume.' %<br/>';
    $pencil->pencilFill(20);
    echo $pencil->pencilDesc().' запарвлена на '.$pencil->PencilInkVolume.' %<br/>';
    
    echo 'Пример-тест с атомобилем'.'<br>';
    $car = new CarClass('CX-9','паркетник',"Мазда",'2014');
    echo $car->getName().'<br>';
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
