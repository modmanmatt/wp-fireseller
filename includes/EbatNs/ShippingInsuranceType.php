<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'FlatRateInsuranceRangeCostType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'InsuranceOptionCodeType.php';

/**
 * Details about insurance for combined payment. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ShippingInsuranceType.html
 *
 */
class ShippingInsuranceType extends EbatNs_ComplexType
{
	/**
	 * @var InsuranceOptionCodeType
	 */
	protected $InsuranceOption;
	/**
	 * @var FlatRateInsuranceRangeCostType
	 */
	protected $FlatRateInsuranceRangeCost;

	/**
	 * @return InsuranceOptionCodeType
	 */
	function getInsuranceOption()
	{
		return $this->InsuranceOption;
	}
	/**
	 * @return void
	 * @param InsuranceOptionCodeType $value 
	 */
	function setInsuranceOption($value)
	{
		$this->InsuranceOption = $value;
	}
	/**
	 * @return FlatRateInsuranceRangeCostType
	 * @param integer $index 
	 */
	function getFlatRateInsuranceRangeCost($index = null)
	{
		if ($index !== null) {
			return $this->FlatRateInsuranceRangeCost[$index];
		} else {
			return $this->FlatRateInsuranceRangeCost;
		}
	}
	/**
	 * @return void
	 * @param FlatRateInsuranceRangeCostType $value 
	 * @param  $index 
	 */
	function setFlatRateInsuranceRangeCost($value, $index = null)
	{
		if ($index !== null) {
			$this->FlatRateInsuranceRangeCost[$index] = $value;
		} else {
			$this->FlatRateInsuranceRangeCost = $value;
		}
	}
	/**
	 * @return void
	 * @param FlatRateInsuranceRangeCostType $value 
	 */
	function addFlatRateInsuranceRangeCost($value)
	{
		$this->FlatRateInsuranceRangeCost[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ShippingInsuranceType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'InsuranceOption' =>
					array(
						'required' => false,
						'type' => 'InsuranceOptionCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'FlatRateInsuranceRangeCost' =>
					array(
						'required' => false,
						'type' => 'FlatRateInsuranceRangeCostType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
