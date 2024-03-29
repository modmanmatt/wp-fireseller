<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'TransactionPlatformCodeType.php';
require_once 'PaginationType.php';
require_once 'AbstractRequestType.php';
require_once 'ItemIDType.php';

/**
 * Retrieves order line item (transaction) information for a specified 
 * <b>ItemID</b>. &nbsp;<b>Also for Half.com</b>. The call returns zero, one, 
 * ormultiple order line items, depending on the number of items sold from the 
 * listing.<br><br>You can retrieve order line item data for a specific time range 
 * ornumber of days. If you don't specify a range or number of days, order line 
 * itemdata will be returned for the past 30 days. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetItemTransactionsRequestType.html
 *
 */
class GetItemTransactionsRequestType extends AbstractRequestType
{
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var dateTime
	 */
	protected $ModTimeFrom;
	/**
	 * @var dateTime
	 */
	protected $ModTimeTo;
	/**
	 * @var string
	 */
	protected $TransactionID;
	/**
	 * @var PaginationType
	 */
	protected $Pagination;
	/**
	 * @var boolean
	 */
	protected $IncludeFinalValueFee;
	/**
	 * @var boolean
	 */
	protected $IncludeContainingOrder;
	/**
	 * @var TransactionPlatformCodeType
	 */
	protected $Platform;
	/**
	 * @var int
	 */
	protected $NumberOfDays;
	/**
	 * @var boolean
	 */
	protected $IncludeVariations;
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
	 * @return dateTime
	 */
	function getModTimeFrom()
	{
		return $this->ModTimeFrom;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setModTimeFrom($value)
	{
		$this->ModTimeFrom = $value;
	}
	/**
	 * @return dateTime
	 */
	function getModTimeTo()
	{
		return $this->ModTimeTo;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setModTimeTo($value)
	{
		$this->ModTimeTo = $value;
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
	 * @return PaginationType
	 */
	function getPagination()
	{
		return $this->Pagination;
	}
	/**
	 * @return void
	 * @param PaginationType $value 
	 */
	function setPagination($value)
	{
		$this->Pagination = $value;
	}
	/**
	 * @return boolean
	 */
	function getIncludeFinalValueFee()
	{
		return $this->IncludeFinalValueFee;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setIncludeFinalValueFee($value)
	{
		$this->IncludeFinalValueFee = $value;
	}
	/**
	 * @return boolean
	 */
	function getIncludeContainingOrder()
	{
		return $this->IncludeContainingOrder;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setIncludeContainingOrder($value)
	{
		$this->IncludeContainingOrder = $value;
	}
	/**
	 * @return TransactionPlatformCodeType
	 */
	function getPlatform()
	{
		return $this->Platform;
	}
	/**
	 * @return void
	 * @param TransactionPlatformCodeType $value 
	 */
	function setPlatform($value)
	{
		$this->Platform = $value;
	}
	/**
	 * @return int
	 */
	function getNumberOfDays()
	{
		return $this->NumberOfDays;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setNumberOfDays($value)
	{
		$this->NumberOfDays = $value;
	}
	/**
	 * @return boolean
	 */
	function getIncludeVariations()
	{
		return $this->IncludeVariations;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setIncludeVariations($value)
	{
		$this->IncludeVariations = $value;
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
		parent::__construct('GetItemTransactionsRequestType', 'urn:ebay:apis:eBLBaseComponents');
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
					'ModTimeFrom' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ModTimeTo' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
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
					'Pagination' =>
					array(
						'required' => false,
						'type' => 'PaginationType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'IncludeFinalValueFee' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'IncludeContainingOrder' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Platform' =>
					array(
						'required' => false,
						'type' => 'TransactionPlatformCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'NumberOfDays' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'IncludeVariations' =>
					array(
						'required' => false,
						'type' => 'boolean',
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
