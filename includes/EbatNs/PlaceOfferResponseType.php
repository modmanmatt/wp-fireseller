<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'SellingStatusType.php';
require_once 'AbstractResponseType.php';
require_once 'BestOfferType.php';

/**
 * The <b>PlaceOffer</b> response notifies you about the success and resultof the 
 * call. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PlaceOfferResponseType.html
 *
 */
class PlaceOfferResponseType extends AbstractResponseType
{
	/**
	 * @var SellingStatusType
	 */
	protected $SellingStatus;
	/**
	 * @var string
	 */
	protected $TransactionID;
	/**
	 * @var BestOfferType
	 */
	protected $BestOffer;
	/**
	 * @var string
	 */
	protected $OrderLineItemID;

	/**
	 * @return SellingStatusType
	 */
	function getSellingStatus()
	{
		return $this->SellingStatus;
	}
	/**
	 * @return void
	 * @param SellingStatusType $value 
	 */
	function setSellingStatus($value)
	{
		$this->SellingStatus = $value;
	}
	/**
	 * @return string
	 */
	function getTransactionID()
	{
		return $this->TransactionID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setTransactionID($value)
	{
		$this->TransactionID = $value;
	}
	/**
	 * @return BestOfferType
	 */
	function getBestOffer()
	{
		return $this->BestOffer;
	}
	/**
	 * @return void
	 * @param BestOfferType $value 
	 */
	function setBestOffer($value)
	{
		$this->BestOffer = $value;
	}
	/**
	 * @return string
	 */
	function getOrderLineItemID()
	{
		return $this->OrderLineItemID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setOrderLineItemID($value)
	{
		$this->OrderLineItemID = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PlaceOfferResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SellingStatus' =>
					array(
						'required' => false,
						'type' => 'SellingStatusType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'TransactionID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'BestOffer' =>
					array(
						'required' => false,
						'type' => 'BestOfferType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'OrderLineItemID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
