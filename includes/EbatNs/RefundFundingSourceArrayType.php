<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'RefundFundingSourceType.php';

/**
 * Container consisting of one or more RefundFundingSource containers. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/RefundFundingSourceArrayType.html
 *
 */
class RefundFundingSourceArrayType extends EbatNs_ComplexType
{
	/**
	 * @var RefundFundingSourceType
	 */
	protected $RefundFundingSource;

	/**
	 * @return RefundFundingSourceType
	 * @param integer $index 
	 */
	function getRefundFundingSource($index = null)
	{
		if ($index !== null) {
			return $this->RefundFundingSource[$index];
		} else {
			return $this->RefundFundingSource;
		}
	}
	/**
	 * @return void
	 * @param RefundFundingSourceType $value 
	 * @param  $index 
	 */
	function setRefundFundingSource($value, $index = null)
	{
		if ($index !== null) {
			$this->RefundFundingSource[$index] = $value;
		} else {
			$this->RefundFundingSource = $value;
		}
	}
	/**
	 * @return void
	 * @param RefundFundingSourceType $value 
	 */
	function addRefundFundingSource($value)
	{
		$this->RefundFundingSource[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('RefundFundingSourceArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'RefundFundingSource' =>
					array(
						'required' => false,
						'type' => 'RefundFundingSourceType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
