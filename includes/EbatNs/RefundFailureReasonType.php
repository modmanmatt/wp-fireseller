<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'RefundFailureCodeType.php';

/**
 * A container for the RefundFailureCode. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/RefundFailureReasonType.html
 *
 */
class RefundFailureReasonType extends EbatNs_ComplexType
{
	/**
	 * @var RefundFailureCodeType
	 */
	protected $RefundFailureCode;

	/**
	 * @return RefundFailureCodeType
	 */
	function getRefundFailureCode()
	{
		return $this->RefundFailureCode;
	}
	/**
	 * @return void
	 * @param RefundFailureCodeType $value 
	 */
	function setRefundFailureCode($value)
	{
		$this->RefundFailureCode = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('RefundFailureReasonType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'RefundFailureCode' =>
					array(
						'required' => false,
						'type' => 'RefundFailureCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
