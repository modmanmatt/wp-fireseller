<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'ListingTypeCodeType.php';
require_once 'OrderStatusCodeType.php';
require_once 'TradingRoleCodeType.php';
require_once 'PaginationType.php';
require_once 'OrderIDArrayType.php';
require_once 'AbstractRequestType.php';

/**
 * Retrieves the orders for which the authenticated user is a participant, either 
 * as the buyeror the seller.&nbsp;<b>Also for Half.com</b>. The call returns all 
 * theorders that meet the request specifications. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetOrdersRequestType.html
 *
 */
class GetOrdersRequestType extends AbstractRequestType
{
	/**
	 * @var OrderIDArrayType
	 */
	protected $OrderIDArray;
	/**
	 * @var dateTime
	 */
	protected $CreateTimeFrom;
	/**
	 * @var dateTime
	 */
	protected $CreateTimeTo;
	/**
	 * @var TradingRoleCodeType
	 */
	protected $OrderRole;
	/**
	 * @var OrderStatusCodeType
	 */
	protected $OrderStatus;
	/**
	 * @var ListingTypeCodeType
	 */
	protected $ListingType;
	/**
	 * @var PaginationType
	 */
	protected $Pagination;
	/**
	 * @var dateTime
	 */
	protected $ModTimeFrom;
	/**
	 * @var dateTime
	 */
	protected $ModTimeTo;
	/**
	 * @var int
	 */
	protected $NumberOfDays;
	/**
	 * @var boolean
	 */
	protected $IncludeFinalValueFee;

	/**
	 * @return OrderIDArrayType
	 */
	function getOrderIDArray()
	{
		return $this->OrderIDArray;
	}
	/**
	 * @return void
	 * @param OrderIDArrayType $value 
	 */
	function setOrderIDArray($value)
	{
		$this->OrderIDArray = $value;
	}
	/**
	 * @return dateTime
	 */
	function getCreateTimeFrom()
	{
		return $this->CreateTimeFrom;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setCreateTimeFrom($value)
	{
		$this->CreateTimeFrom = $value;
	}
	/**
	 * @return dateTime
	 */
	function getCreateTimeTo()
	{
		return $this->CreateTimeTo;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setCreateTimeTo($value)
	{
		$this->CreateTimeTo = $value;
	}
	/**
	 * @return TradingRoleCodeType
	 */
	function getOrderRole()
	{
		return $this->OrderRole;
	}
	/**
	 * @return void
	 * @param TradingRoleCodeType $value 
	 */
	function setOrderRole($value)
	{
		$this->OrderRole = $value;
	}
	/**
	 * @return OrderStatusCodeType
	 */
	function getOrderStatus()
	{
		return $this->OrderStatus;
	}
	/**
	 * @return void
	 * @param OrderStatusCodeType $value 
	 */
	function setOrderStatus($value)
	{
		$this->OrderStatus = $value;
	}
	/**
	 * @return ListingTypeCodeType
	 */
	function getListingType()
	{
		return $this->ListingType;
	}
	/**
	 * @return void
	 * @param ListingTypeCodeType $value 
	 */
	function setListingType($value)
	{
		$this->ListingType = $value;
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
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetOrdersRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'OrderIDArray' =>
					array(
						'required' => false,
						'type' => 'OrderIDArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CreateTimeFrom' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CreateTimeTo' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'OrderRole' =>
					array(
						'required' => false,
						'type' => 'TradingRoleCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'OrderStatus' =>
					array(
						'required' => false,
						'type' => 'OrderStatusCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ListingType' =>
					array(
						'required' => false,
						'type' => 'ListingTypeCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
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
					'NumberOfDays' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
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
					)
				));
	}
}
?>
