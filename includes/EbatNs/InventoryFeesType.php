<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'FeeType.php';
require_once 'ItemIDType.php';

/**
 * This is used in ReviseInventoryStatus response to provide the set of fees 
 * associated with each unique ItemID.. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/InventoryFeesType.html
 *
 */
class InventoryFeesType extends EbatNs_ComplexType
{
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var FeeType
	 */
	protected $Fee;

	/**
	 * @return ItemIDType
	 */
	function getItemID()
	{
		return $this->ItemID;
	}
	/**
	 * @return void
	 * @param ItemIDType $value 
	 */
	function setItemID($value)
	{
		$this->ItemID = $value;
	}
	/**
	 * @return FeeType
	 * @param integer $index 
	 */
	function getFee($index = null)
	{
		if ($index !== null) {
			return $this->Fee[$index];
		} else {
			return $this->Fee;
		}
	}
	/**
	 * @return void
	 * @param FeeType $value 
	 * @param  $index 
	 */
	function setFee($value, $index = null)
	{
		if ($index !== null) {
			$this->Fee[$index] = $value;
		} else {
			$this->Fee = $value;
		}
	}
	/**
	 * @return void
	 * @param FeeType $value 
	 */
	function addFee($value)
	{
		$this->Fee[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('InventoryFeesType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ItemID' =>
					array(
						'required' => false,
						'type' => 'ItemIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Fee' =>
					array(
						'required' => false,
						'type' => 'FeeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
