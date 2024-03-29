<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'PromotionRuleType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * One or more PromotionRules. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PromotionRuleArrayType.html
 *
 */
class PromotionRuleArrayType extends EbatNs_ComplexType
{
	/**
	 * @var PromotionRuleType
	 */
	protected $PromotionRule;

	/**
	 * @return PromotionRuleType
	 * @param integer $index 
	 */
	function getPromotionRule($index = null)
	{
		if ($index !== null) {
			return $this->PromotionRule[$index];
		} else {
			return $this->PromotionRule;
		}
	}
	/**
	 * @return void
	 * @param PromotionRuleType $value 
	 * @param  $index 
	 */
	function setPromotionRule($value, $index = null)
	{
		if ($index !== null) {
			$this->PromotionRule[$index] = $value;
		} else {
			$this->PromotionRule = $value;
		}
	}
	/**
	 * @return void
	 * @param PromotionRuleType $value 
	 */
	function addPromotionRule($value)
	{
		$this->PromotionRule[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PromotionRuleArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'PromotionRule' =>
					array(
						'required' => false,
						'type' => 'PromotionRuleType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
