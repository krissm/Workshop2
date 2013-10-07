<?php
require_once 'Boat.php';

class Member{
	private $membershipNo;
	private $name;
	private $pn;
	private $boats = array();

	public function __construct($member, $mBoats){
		$this->membershipNo = $member['id'];
		$this->name = $member['name'];
		$this->pn = $member['pn'];
		foreach ($mBoats as $boat){
			$this->boats[] = new Boat($boat);
		}

	}
}