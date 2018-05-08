<?php

class CarClass
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
        $this->name = $model;
        $this->type = $type;
        $this->carBrand = $brand;
        $this->carDate = $date;
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

    public function carAccelerate($drive,$acc) //метод ускорения машины
    {
        if (carStatus) {
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


class TvClass
{
    public $tvType; 
    public $tvVendor;
    public $tvModel;
    public $tvStatus;
    public $tvCurrChannel;
	
    public function __construct($model, $type, $vendor)
    {
        $this->tvtype = $type;
        $this->tvVendor = $vendor;
        $this->tvModel = $model;	
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

class PencilClass
{
    public $PencilType; 
    public $PencilVendor;
    public $PencilColor;
    public $PencilState;
    public $PencilInkVolume;

    public function __construct($color, $type, $vendor, $fill)
    {
        $this->PencilType = $type;
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

    public function pencilDesc() //метод запарвки чернил на объем $vol
    {
        return 'Ручка '.$this->PencilType.' '.$this->PencilVendor.' '.$this->PencilColor;
    }
}

class DuckClass
{
    public $DuckGender; 
    public $DuckOld;
    public $DuckType;
    public $DuckName;
    public $DuckState;
    public $DuckSpeed;
    public $DuckHealth;


    public function __construct($gender, $old, $type, $name)
    {
        $this->DuckGender = $gender;
        $this->DuckOld = $old;
        $this->DuckType = $type;
        $this->DuckName = $name;
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
        $this->goodVendor = $vendor;
        $this->goodName = $name;
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

    $car = new CarClass('CX-9', 'паркетник', 'Мазда', '2014');
    $car2 = new CarClass('Ларгус', 'универсал', 'ВАЗ', '2011');
    $tv = new TvClass('CVB897665', 'LED', 'ACER');
    $tv2 = new TvClass('CB897665', 'LAMP', 'SONY');
    $pencil = new PencilClass('Красная', 'Автомат', 'Parker', 70);
    $duck = new DuckClass('male',2, 'китайская', 'Пекинская утка');
    $good = new GoodsClass ('Черноморец', 'Помидор красный', 50, 'Отличный помидор', 5, 'http://....pics/tomato.jpg');
    echo $pencil->pencilDesc().' запарвлена на '.$pencil->PencilInkVolume.' %<br/>';
    $pencil->pencilFill(20);
    echo $pencil->pencilDesc().' запарвлена на '.$pencil->PencilInkVolume.' %';
?>
