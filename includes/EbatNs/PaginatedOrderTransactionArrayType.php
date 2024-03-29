<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'OrderTransactionArrayType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'PaginationResultType.php';

/**
 * Contains a paginated list of orders. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PaginatedOrderTransactionArrayType.html
 *
 */
class PaginatedOrderTransactionArrayType extends EbatNs_ComplexType
{
	/**
	 * @var OrderTransactionArrayType
	 */
	protected $OrderTransactionArray;
	/**
	 * @var PaginationResultType
	 */
	protected $PaginationResult;

	/**
	 * @return OrderTransactionArrayType
	 */
	function getOrderTransactionArray()
	{
		return $this->OrderTransactionArray;
	}
	/**
	 * @return void
	 * @param OrderTransactionArrayType $value 
	 */
	function setOrderTransactionArray($value)
	{
		$this->OrderTransactionArray = $value;
	}
	/**
	 * @return PaginationResultType
	 */
	function getPaginationResult()
	{
		return $this->PaginationResult;
	}
	/**
	 * @return void
	 * @param PaginationResultType $value 
	 */
	function setPaginationResult($value)
	{
		$this->PaginationResult = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PaginatedOrderTransactionArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'OrderTransactionArray' =>
					array(
						'required' => false,
						'type' => 'OrderTransactionArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PaginationResult' =>
					array(
						'required' => false,
						'type' => 'PaginationResultType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
