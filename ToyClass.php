<?php
namespace Products;

require "ProductClass.php";
require "traits.php";

class ToyClass extends ProductClass
{
	public $ageForToys;
	use GeneralDiscount;

    public function getId() 
        {
        return $this->id;
	    }

	public function getName() 
        {
        return $this->name;
	    }
	
	public function getPrice()
	    {
        return $this->price;
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
	
	public function setName($name) 
	    {
        $this->name = $name;
        return true;
	    }

	public function setId($id) 
	    {
        $this->id = $id;
        return true;
	    }
	
	public function setPrice($price)
	    {
        $this->price = $price;
        return true;
	    }
    
    public function setDesc($desc) 
        {
        $this->description = $description;
        return true;
	    }
	
	public function setPic($picture)
	    {
        $this->picture = $picture;
        return true;
	    }
	
	public function setDisc($discount)
	    {
        $this->discount = $discount;
        return true;
	    }
    
    public function __construct($id, $name, $price)
        {
	    $this->id = $id;
	    $this->name = $name;
	    $this->price = $price;
	    }

}

?>
