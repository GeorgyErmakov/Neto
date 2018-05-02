<?php

namespace offer

interfaces OfferInterfaces
{
	public function getOffer($basket);
	public function approveOffer();
	public function cancelOffer();
	public function printOffer();
}

class OfferClass implements OfferInterfaces
{
	private $offerid;
	private $basket;
	public $buyer;
	public $delivery;

	public function getOffer($basket);
	public function approveOffer();
    public function cancelOffer();
	public function printOffer();
}

?>
