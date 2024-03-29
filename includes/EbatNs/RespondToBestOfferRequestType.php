<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'BestOfferIDType.php';
require_once 'AmountType.php';
require_once 'BestOfferActionCodeType.php';
require_once 'AbstractRequestType.php';
require_once 'ItemIDType.php';

/**
 * Enables the seller of a Best Offer item to accept, decline, or counter 
 * offersmade by bidders. Best offers can be declined in bulk, using the same 
 * messagefrom the seller to the bidders of all rejected offers. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/RespondToBestOfferRequestType.html
 *
 */
class RespondToBestOfferRequestType extends AbstractRequestType
{
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var BestOfferIDType
	 */
	protected $BestOfferID;
	/**
	 * @var BestOfferActionCodeType
	 */
	protected $Action;
	/**
	 * @var string
	 */
	protected $SellerResponse;
	/**
	 * @var AmountType
	 */
	protected $CounterOfferPrice;
	/**
	 * @var int
	 */
	protected $CounterOfferQuantity;

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
	 * @return BestOfferIDType
	 * @param integer $index 
	 */
	function getBestOfferID($index = null)
	{
		if ($index !== null) {
			return $this->BestOfferID[$index];
		} else {
			return $this->BestOfferID;
		}
	}
	/**
	 * @return void
	 * @param BestOfferIDType $value 
	 * @param  $index 
	 */
	function setBestOfferID($value, $index = null)
	{
		if ($index !== null) {
			$this->BestOfferID[$index] = $value;
		} else {
			$this->BestOfferID = $value;
		}
	}
	/**
	 * @return void
	 * @param BestOfferIDType $value 
	 */
	function addBestOfferID($value)
	{
		$this->BestOfferID[] = $value;
	}
	/**
	 * @return BestOfferActionCodeType
	 */
	function getAction()
	{
		return $this->Action;
	}
	/**
	 * @return void
	 * @param BestOfferActionCodeType $value 
	 */
	function setAction($value)
	{
		$this->Action = $value;
	}
	/**
	 * @return string
	 */
	function getSellerResponse()
	{
		return $this->SellerResponse;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setSellerResponse($value)
	{
		$this->SellerResponse = $value;
	}
	/**
	 * @return AmountType
	 */
	function getCounterOfferPrice()
	{
		return $this->CounterOfferPrice;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setCounterOfferPrice($value)
	{
		$this->CounterOfferPrice = $value;
	}
	/**
	 * @return int
	 */
	function getCounterOfferQuantity()
	{
		return $this->CounterOfferQuantity;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setCounterOfferQuantity($value)
	{
		$this->CounterOfferQuantity = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('RespondToBestOfferRequestType', 'urn:ebay:apis:eBLBaseComponents');
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
					'BestOfferID' =>
					array(
						'required' => false,
						'type' => 'BestOfferIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					),
					'Action' =>
					array(
						'required' => false,
						'type' => 'BestOfferActionCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SellerResponse' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CounterOfferPrice' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CounterOfferQuantity' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
