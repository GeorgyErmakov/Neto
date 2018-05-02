<?php
namespace Products;

abstract class ProductClass
{
	public $id;
	public $name;
	public $description;
	public $picture;
	public $price;
	public $discount;


	abstract public function getId();

	abstract public function getName(); 
	
	abstract public function getPrice();

    abstract public function getDesc(); 

	abstract public function getPic();
	
	abstract public function getDisc();

	abstract public function setName($name);

	abstract public function setId($id);

	abstract public function setPrice($price);

    abstract public function setDesc($desc);

	abstract public function setPic($picture);

	abstract public function setDisc($discount);
}
?>
