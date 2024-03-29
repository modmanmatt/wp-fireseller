<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * PowerSeller discount information (e.g., to show in a Seller Dashboard). As 
 * aPowerSeller, you can earn discounts on your monthly invoice Final Value Fees 
 * basedon how well you're doing as a seller. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellerFeeDiscountDashboardType.html
 *
 */
class SellerFeeDiscountDashboardType extends EbatNs_ComplexType
{
	/**
	 * @var float
	 */
	protected $Percent;

	/**
	 * @return float
	 */
	function getPercent()
	{
		return $this->Percent;
	}
	/**
	 * @return void
	 * @param float $value 
	 */
	function setPercent($value)
	{
		$this->Percent = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellerFeeDiscountDashboardType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Percent' =>
					array(
						'required' => false,
						'type' => 'float',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
