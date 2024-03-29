<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'AverageRatingSummaryType.php';

/**
 * Contains DSR feedback metrics for different periods. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellerRatingSummaryArrayType.html
 *
 */
class SellerRatingSummaryArrayType extends EbatNs_ComplexType
{
	/**
	 * @var AverageRatingSummaryType
	 */
	protected $AverageRatingSummary;

	/**
	 * @return AverageRatingSummaryType
	 * @param integer $index 
	 */
	function getAverageRatingSummary($index = null)
	{
		if ($index !== null) {
			return $this->AverageRatingSummary[$index];
		} else {
			return $this->AverageRatingSummary;
		}
	}
	/**
	 * @return void
	 * @param AverageRatingSummaryType $value 
	 * @param  $index 
	 */
	function setAverageRatingSummary($value, $index = null)
	{
		if ($index !== null) {
			$this->AverageRatingSummary[$index] = $value;
		} else {
			$this->AverageRatingSummary = $value;
		}
	}
	/**
	 * @return void
	 * @param AverageRatingSummaryType $value 
	 */
	function addAverageRatingSummary($value)
	{
		$this->AverageRatingSummary[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellerRatingSummaryArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'AverageRatingSummary' =>
					array(
						'required' => false,
						'type' => 'AverageRatingSummaryType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
