<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'UserType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'PromotionalSaleDetailsType.php';
require_once 'AmountType.php';
require_once 'ListingStatusCodeType.php';

/**
 * Contains various details about the current status of a listing. Thesevalues are 
 * computed by eBay and cannot be specified at listing time. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellingStatusType.html
 *
 */
class SellingStatusType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $BidCount;
	/**
	 * @var AmountType
	 */
	protected $BidIncrement;
	/**
	 * @var AmountType
	 */
	protected $ConvertedCurrentPrice;
	/**
	 * @var AmountType
	 */
	protected $CurrentPrice;
	/**
	 * @var UserType
	 */
	protected $HighBidder;
	/**
	 * @var int
	 */
	protected $LeadCount;
	/**
	 * @var AmountType
	 */
	protected $MinimumToBid;
	/**
	 * @var int
	 */
	protected $QuantitySold;
	/**
	 * @var boolean
	 */
	protected $ReserveMet;
	/**
	 * @var boolean
	 */
	protected $SecondChanceEligible;
	/**
	 * @var long
	 */
	protected $BidderCount;
	/**
	 * @var ListingStatusCodeType
	 */
	protected $ListingStatus;
	/**
	 * @var AmountType
	 */
	protected $FinalValueFee;
	/**
	 * @var PromotionalSaleDetailsType
	 */
	protected $PromotionalSaleDetails;
	/**
	 * @var boolean
	 */
	protected $AdminEnded;
	/**
	 * @var boolean
	 */
	protected $SoldAsBin;

	/**
	 * @return int
	 */
	function getBidCount()
	{
		return $this->BidCount;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setBidCount($value)
	{
		$this->BidCount = $value;
	}
	/**
	 * @return AmountType
	 */
	function getBidIncrement()
	{
		return $this->BidIncrement;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setBidIncrement($value)
	{
		$this->BidIncrement = $value;
	}
	/**
	 * @return AmountType
	 */
	function getConvertedCurrentPrice()
	{
		return $this->ConvertedCurrentPrice;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setConvertedCurrentPrice($value)
	{
		$this->ConvertedCurrentPrice = $value;
	}
	/**
	 * @return AmountType
	 */
	function getCurrentPrice()
	{
		return $this->CurrentPrice;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setCurrentPrice($value)
	{
		$this->CurrentPrice = $value;
	}
	/**
	 * @return UserType
	 */
	function getHighBidder()
	{
		return $this->HighBidder;
	}
	/**
	 * @return void
	 * @param UserType $value 
	 */
	function setHighBidder($value)
	{
		$this->HighBidder = $value;
	}
	/**
	 * @return int
	 */
	function getLeadCount()
	{
		return $this->LeadCount;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setLeadCount($value)
	{
		$this->LeadCount = $value;
	}
	/**
	 * @return AmountType
	 */
	function getMinimumToBid()
	{
		return $this->MinimumToBid;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setMinimumToBid($value)
	{
		$this->MinimumToBid = $value;
	}
	/**
	 * @return int
	 */
	function getQuantitySold()
	{
		return $this->QuantitySold;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setQuantitySold($value)
	{
		$this->QuantitySold = $value;
	}
	/**
	 * @return boolean
	 */
	function getReserveMet()
	{
		return $this->ReserveMet;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setReserveMet($value)
	{
		$this->ReserveMet = $value;
	}
	/**
	 * @return boolean
	 */
	function getSecondChanceEligible()
	{
		return $this->SecondChanceEligible;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setSecondChanceEligible($value)
	{
		$this->SecondChanceEligible = $value;
	}
	/**
	 * @return long
	 */
	function getBidderCount()
	{
		return $this->BidderCount;
	}
	/**
	 * @return void
	 * @param long $value 
	 */
	function setBidderCount($value)
	{
		$this->BidderCount = $value;
	}
	/**
	 * @return ListingStatusCodeType
	 */
	function getListingStatus()
	{
		return $this->ListingStatus;
	}
	/**
	 * @return void
	 * @param ListingStatusCodeType $value 
	 */
	function setListingStatus($value)
	{
		$this->ListingStatus = $value;
	}
	/**
	 * @return AmountType
	 */
	function getFinalValueFee()
	{
		return $this->FinalValueFee;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setFinalValueFee($value)
	{
		$this->FinalValueFee = $value;
	}
	/**
	 * @return PromotionalSaleDetailsType
	 */
	function getPromotionalSaleDetails()
	{
		return $this->PromotionalSaleDetails;
	}
	/**
	 * @return void
	 * @param PromotionalSaleDetailsType $value 
	 */
	function setPromotionalSaleDetails($value)
	{
		$this->PromotionalSaleDetails = $value;
	}
	/**
	 * @return boolean
	 */
	function getAdminEnded()
	{
		return $this->AdminEnded;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setAdminEnded($value)
	{
		$this->AdminEnded = $value;
	}
	/**
	 * @return boolean
	 */
	function getSoldAsBin()
	{
		return $this->SoldAsBin;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setSoldAsBin($value)
	{
		$this->SoldAsBin = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellingStatusType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'BidCount' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'BidIncrement' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ConvertedCurrentPrice' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CurrentPrice' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'HighBidder' =>
					array(
						'required' => false,
						'type' => 'UserType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'LeadCount' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MinimumToBid' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'QuantitySold' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ReserveMet' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SecondChanceEligible' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'BidderCount' =>
					array(
						'required' => false,
						'type' => 'long',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ListingStatus' =>
					array(
						'required' => false,
						'type' => 'ListingStatusCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'FinalValueFee' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PromotionalSaleDetails' =>
					array(
						'required' => false,
						'type' => 'PromotionalSaleDetailsType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AdminEnded' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SoldAsBin' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
