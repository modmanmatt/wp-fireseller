<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'FeesType.php';
require_once 'SKUType.php';
require_once 'DiscountReasonCodeType.php';
require_once 'AbstractResponseType.php';
require_once 'ExpressItemRequirementsType.php';
require_once 'ItemIDType.php';

/**
 * Returns the estimated fees that would be applicable for a new listing(were the 
 * item actually listed to eBay with AddItem). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/VerifyAddFixedPriceItemResponseType.html
 *
 */
class VerifyAddFixedPriceItemResponseType extends AbstractResponseType
{
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var SKUType
	 */
	protected $SKU;
	/**
	 * @var FeesType
	 */
	protected $Fees;
	/**
	 * @var boolean
	 */
	protected $ExpressListing;
	/**
	 * @var ExpressItemRequirementsType
	 */
	protected $ExpressItemRequirements;
	/**
	 * @var string
	 */
	protected $CategoryID;
	/**
	 * @var string
	 */
	protected $Category2ID;
	/**
	 * @var DiscountReasonCodeType
	 */
	protected $DiscountReason;

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
	 * @return FeesType
	 */
	function getFees()
	{
		return $this->Fees;
	}
	/**
	 * @return void
	 * @param FeesType $value 
	 */
	function setFees($value)
	{
		$this->Fees = $value;
	}
	/**
	 * @return boolean
	 */
	function getExpressListing()
	{
		return $this->ExpressListing;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setExpressListing($value)
	{
		$this->ExpressListing = $value;
	}
	/**
	 * @return ExpressItemRequirementsType
	 */
	function getExpressItemRequirements()
	{
		return $this->ExpressItemRequirements;
	}
	/**
	 * @return void
	 * @param ExpressItemRequirementsType $value 
	 */
	function setExpressItemRequirements($value)
	{
		$this->ExpressItemRequirements = $value;
	}
	/**
	 * @return string
	 */
	function getCategoryID()
	{
		return $this->CategoryID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setCategoryID($value)
	{
		$this->CategoryID = $value;
	}
	/**
	 * @return string
	 */
	function getCategory2ID()
	{
		return $this->Category2ID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setCategory2ID($value)
	{
		$this->Category2ID = $value;
	}
	/**
	 * @return DiscountReasonCodeType
	 * @param integer $index 
	 */
	function getDiscountReason($index = null)
	{
		if ($index !== null) {
			return $this->DiscountReason[$index];
		} else {
			return $this->DiscountReason;
		}
	}
	/**
	 * @return void
	 * @param DiscountReasonCodeType $value 
	 * @param  $index 
	 */
	function setDiscountReason($value, $index = null)
	{
		if ($index !== null) {
			$this->DiscountReason[$index] = $value;
		} else {
			$this->DiscountReason = $value;
		}
	}
	/**
	 * @return void
	 * @param DiscountReasonCodeType $value 
	 */
	function addDiscountReason($value)
	{
		$this->DiscountReason[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('VerifyAddFixedPriceItemResponseType', 'urn:ebay:apis:eBLBaseComponents');
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
					'SKU' =>
					array(
						'required' => false,
						'type' => 'SKUType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Fees' =>
					array(
						'required' => false,
						'type' => 'FeesType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExpressListing' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExpressItemRequirements' =>
					array(
						'required' => false,
						'type' => 'ExpressItemRequirementsType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CategoryID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Category2ID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DiscountReason' =>
					array(
						'required' => false,
						'type' => 'DiscountReasonCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
