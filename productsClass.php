<?php

interfaces ProductInterfaces
{
    public function getName();
    public function getpPrice();
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
    protected $discount = 0;
    protected $delivery = 250;
    protected $weight;


    public function getName() {
        return $this->name;
	}

    public function getPrice()
	{
        return $this->price;
	}

    public function getDesc() {
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
        if ($this->dicount <> 0) {
            return $this->delivery+50;
        } else {
            return $this->delivery;
        }
	}

    public function getWeight()
    {
        return $this->weight;
	}

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price)
	{
        $this->price = $price;
    }

    public function setDesc($desc) {
        $this->description = $description;
    }

    public function setPic($picture) {
        $this->picture=$picture;
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

trait ExtraWeightDiscount {
    public function getDisc()
	{
        if ($this->weight > 10) {
            return $this->discount;
        } else {
            return $this->discount = 0;
        }
	}
} 
trait GeneralDiscount {
    public function getPrice()
    {
        return $this->price*0.1;
	}
}

class ToyClass extends ProductClass
{
    public ageForToys;
    public $discount = 10;
    use GeneralDiscount;
}


class ArtClass extends ProductClass
{
    public artType;
    public $discount = 10;
    use GeneralDiscount;
}


class KidsFoodClass extends ProductClass
{	
    use ExtraWeightDiscount;
}

?>
