<?php
namespace Products;

trait ExtraWeightDiscount 
{
	public function getDisc()
	{
		if ($this->weight>10)
		{
        return $this->discount;
	    }
	    else{
	    return $this->discount=0;
	    }
	}
} 

trait GeneralDiscount 
{
	public function getPrice()
	{
    return $this->price*0.1;
	}
}

?>
