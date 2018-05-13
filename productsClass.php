<?php

interface ProductInterfaces
{
    public function getName();
    public function getPrice();
    public function getDesc();
    public function getPic();
    public function getDisc();
    public function setName($name);
    public function setPrice($price);
    public function setDesc($desc);
    public function setPic($picture);
    public function setDisc($discount);
}

class ProductClass implements ProductInterfaces
{
    protected $name;
    protected $description;
    public $picture;
    protected $price;
    protected $discount;
    protected $delivery;
    protected $weight;

    public function __construct($name, $price, $description)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->discount = 0;
        $this->delivery = 250;
    } 
    
    public function getName() 
    {
         return $this->name;
    }
    
    public function getPrice()
    {
        return $this->price*(1-$this->getDisc()/100);
    }

    public function getDesc() 
    {
        return $this->description;
    }

    public function getPic()
    {
        return $this->picture;
    }

    public function getDisc()
    {
        return $this->discount;
    }

    public function getDelivery()
    {
        if ($this->getDisc() <> 0) {
            return $this->delivery+50;
        } else {
            return $this->delivery;
        }
    }
    
    public function getWeight()
    {
        return $this->weight;
    }
    
    public function setName($name) 
    {
        $this->name = $name;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    public function setDesc($desc) 
    {
        $this->description = $description;
    }
    
    public function setPic($picture) 
    {
        $this->picture = $picture;
    }
    
    public function setDisc($discount)
    {
        $this->discount = $discount;
    }
    
    public function setDelivery($del)
    {
        $this->delivery = $del;
    }
	
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}

trait ExtraWeightDiscount 
{
    public function getDisc()
    {
        if ($this->weight > 10) {
            return $this->discount;
        } else {
            return $this->discount = 0;
        }
    }
} 

trait GeneralDiscount 
{
     public function getDisc()
    {
        return 10;    
    }

    public function getPrice()
    {
        return $this->price*0.9;
    }
}

class ToyClass extends ProductClass
{
    public $ageForToys;

    use GeneralDiscount;
}

class ArtClass extends ProductClass
{
    public $artType;

    use GeneralDiscount;
}

class KidsFoodClass extends ProductClass
{	
    public $dateGood;
    
    use ExtraWeightDiscount;
}

$toy = new ToyClass('погремушка', 200, 'деревянная игрушка');
$art = new ArtClass('кисть', 60, 'кисть колонок 200');
$food = new KidsFoodClass('пюре', 500,'еда натуральная');
$foodhuge = new KidsFoodClass('вагон попкорна', 5000,'еда ненатуральная');
$food->setDisc(50);
$foodhuge->setDisc(30);
$food->setWeight(23);
$foodhuge->setWeight(7);
echo 'Цена: '.$toy->getPrice().' скидка '. $toy->getDisc().' доставка '.$toy->getDelivery().'<br>';
echo 'Цена: '.$art->getPrice().' скидка '. $art->getDisc().' доставка '.$art->getDelivery().'<br>';
echo 'Цена: '.$food->getPrice().' скидка '. $food->getDisc().' доставка '.$food->getDelivery().'<br>';
echo 'Цена: '.$foodhuge->getPrice().' скидка '. $foodhuge->getDisc().' доставка '.$foodhuge->getDelivery().'<br>';

$food->setWeight(5);

echo 'Цена: '.$food->getPrice().' скидка '. $food->getDisc().' доставка '.$food->getDelivery().'<br>';
?>
