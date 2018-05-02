<?php

namespace basket

interfaces BasketInterfaces
{
	public function addItem($itemid);
	public function delItem($itemid);
    public function getBasketList();
	public function clearBasket();
	public function getDisc();
	public function setDisc($num);
}

class BasketClass implements BasketInterfaces
{
	private $basketid;
	private $products;
	private $sum;
	public $discount;

	public function addItem($itemid);
	public function delItem($itemid);
    public function getBasketList();
	public function clearBasket();
	public function getDisc();
	public function setDisc($num);
}

?>