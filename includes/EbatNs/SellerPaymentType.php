<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AmountType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'ExternalProductIDType.php';
require_once 'OrderIDType.php';
require_once 'PaymentTypeCodeType.php';
require_once 'ItemIDType.php';

/**
 * A payment between Half.com and a seller. The financial value of a payment 
 * istypically based on an amount that a buyer paid to Half.com for one order 
 * lineitem, plus the buyer's shipping cost, minus Half.com's commission. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellerPaymentType.html
 *
 */
class SellerPaymentType extends EbatNs_ComplexType
{
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var string
	 */
	protected $TransactionID;
	/**
	 * @var OrderIDType
	 */
	protected $OrderID;
	/**
	 * @var string
	 */
	protected $SellerInventoryID;
	/**
	 * @var string
	 */
	protected $PrivateNotes;
	/**
	 * @var ExternalProductIDType
	 */
	protected $ExternalProductID;
	/**
	 * @var string
	 */
	protected $Title;
	/**
	 * @var PaymentTypeCodeType
	 */
	protected $PaymentType;
	/**
	 * @var AmountType
	 */
	protected $TransactionPrice;
	/**
	 * @var AmountType
	 */
	protected $ShippingReimbursement;
	/**
	 * @var AmountType
	 */
	protected $Commission;
	/**
	 * @var AmountType
	 */
	protected $AmountPaid;
	/**
	 * @var dateTime
	 */
	protected $PaidTime;
	/**
	 * @var string
	 */
	protected $OrderLineItemID;

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
	 * @return OrderIDType
	 */
	function getOrderID()
	{
		return $this->OrderID;
	}
	/**
	 * @return void
	 * @param OrderIDType $value 
	 */
	function setOrderID($value)
	{
		$this->OrderID = $value;
	}
	/**
	 * @return string
	 */
	function getSellerInventoryID()
	{
		return $this->SellerInventoryID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setSellerInventoryID($value)
	{
		$this->SellerInventoryID = $value;
	}
	/**
	 * @return string
	 */
	function getPrivateNotes()
	{
		return $this->PrivateNotes;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setPrivateNotes($value)
	{
		$this->PrivateNotes = $value;
	}
	/**
	 * @return ExternalProductIDType
	 */
	function getExternalProductID()
	{
		return $this->ExternalProductID;
	}
	/**
	 * @return void
	 * @param ExternalProductIDType $value 
	 */
	function setExternalProductID($value)
	{
		$this->ExternalProductID = $value;
	}
	/**
	 * @return string
	 */
	function getTitle()
	{
		return $this->Title;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setTitle($value)
	{
		$this->Title = $value;
	}
	/**
	 * @return PaymentTypeCodeType
	 */
	function getPaymentType()
	{
		return $this->PaymentType;
	}
	/**
	 * @return void
	 * @param PaymentTypeCodeType $value 
	 */
	function setPaymentType($value)
	{
		$this->PaymentType = $value;
	}
	/**
	 * @return AmountType
	 */
	function getTransactionPrice()
	{
		return $this->TransactionPrice;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setTransactionPrice($value)
	{
		$this->TransactionPrice = $value;
	}
	/**
	 * @return AmountType
	 */
	function getShippingReimbursement()
	{
		return $this->ShippingReimbursement;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setShippingReimbursement($value)
	{
		$this->ShippingReimbursement = $value;
	}
	/**
	 * @return AmountType
	 */
	function getCommission()
	{
		return $this->Commission;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setCommission($value)
	{
		$this->Commission = $value;
	}
	/**
	 * @return AmountType
	 */
	function getAmountPaid()
	{
		return $this->AmountPaid;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setAmountPaid($value)
	{
		$this->AmountPaid = $value;
	}
	/**
	 * @return dateTime
	 */
	function getPaidTime()
	{
		return $this->PaidTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setPaidTime($value)
	{
		$this->PaidTime = $value;
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
		parent::__construct('SellerPaymentType', 'urn:ebay:apis:eBLBaseComponents');
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
					'TransactionID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'OrderID' =>
					array(
						'required' => false,
						'type' => 'OrderIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SellerInventoryID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PrivateNotes' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExternalProductID' =>
					array(
						'required' => false,
						'type' => 'ExternalProductIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Title' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PaymentType' =>
					array(
						'required' => false,
						'type' => 'PaymentTypeCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'TransactionPrice' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShippingReimbursement' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Commission' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AmountPaid' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PaidTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
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
