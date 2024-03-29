<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EndReasonCodeType.php';
require_once 'SKUType.php';
require_once 'AbstractRequestType.php';
require_once 'ItemIDType.php';

/**
 * Ends the specified fixed-price listing before the date and time at whichit would 
 * normally end (per the listing duration). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/EndFixedPriceItemRequestType.html
 *
 */
class EndFixedPriceItemRequestType extends AbstractRequestType
{
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var EndReasonCodeType
	 */
	protected $EndingReason;
	/**
	 * @var SKUType
	 */
	protected $SKU;

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
	 * @return EndReasonCodeType
	 */
	function getEndingReason()
	{
		return $this->EndingReason;
	}
	/**
	 * @return void
	 * @param EndReasonCodeType $value 
	 */
	function setEndingReason($value)
	{
		$this->EndingReason = $value;
	}
	/**
	 * @return SKUType
	 */
	function getSKU()
	{
		return $this->SKU;
	}
	/**
	 * @return void
	 * @param SKUType $value 
	 */
	function setSKU($value)
	{
		$this->SKU = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('EndFixedPriceItemRequestType', 'urn:ebay:apis:eBLBaseComponents');
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
					'EndingReason' =>
					array(
						'required' => false,
						'type' => 'EndReasonCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SKU' =>
					array(
						'required' => false,
						'type' => 'SKUType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
