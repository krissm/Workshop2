<?php
require_once 'Boat.php';
/**
 * there is no need to create, update, or delete member variables of member objects since they are recreated from 
 * the database at each page load anyway. But read is used to get data to present in the view.  
 * @author K
 *
 */
class Member{
	private $membershipNo;
	private $name;
	private $pn;
	private $boats = array();

	/**
	 * 
	 * @param an array with member data $member
	 * @param an array with a member's boats. Each boat contain an array with boat data $mBoats
	 */
	public function __construct($member = null, $mBoats = null){
		if($member !== null){
		$this->membershipNo = $member['id'];
		$this->name = $member['name'];
		$this->pn = $member['pn'];
		}
		if($mBoats !== null){
			foreach ($mBoats as $boat){
				$this->boats[] = new Boat($boat);
			}
		}
	}
	
	public function ReadMember(){
		$data['id'] = $this->membershipNo;
		$data['name'] = $this->name;
		$data['pn'] = $this->pn;
		$data['noOfBoats'] = count($this->boats);
		return $data;
	}

	/**
	 * 
	 * @return an array with a member's boats if there are any. 
	 */
	public function ReadBoats() {
		$boatData;
		$i = 0;
		if(count($this->boats) > 0){
			foreach ($this->boats as $boat){
				$boatData[$i] = $boat->ReadBoat();
				$i++;
			}
			return $boatData;
		}
	}

	/**
	 *
	 * @param database hanler $db
	 * @param parameters $entry
	 */
	public static function AddMember($db, $entry) {
		$parameters = array($entry['name'], $entry['pn']);
		$db->ExecuteQuery('INSERT INTO MemberRegister (name, pn) VALUES (?, ?);', $parameters);
	}
	
	public static function DeleteMember($db, $entry) {
		$db->ExecuteQuery('DELETE FROM MemberRegister WHERE id=(?);', $entry);
	}
	
	public static function EditMember($db, $entry) {
		$db->ExecuteQuery('UPDATE MemberRegister SET name=(?), pn=(?)  WHERE id=(?);', $entry);
	}
	

}