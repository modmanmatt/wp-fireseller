<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'PromotionRuleArrayType.php';
require_once 'AbstractResponseType.php';

/**
 * Returns all promotion rules associated with the specified item or store 
 * category. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetPromotionRulesResponseType.html
 *
 */
class GetPromotionRulesResponseType extends AbstractResponseType
{
	/**
	 * @var PromotionRuleArrayType
	 */
	protected $PromotionRuleArray;

	/**
	 * @return PromotionRuleArrayType
	 */
	function getPromotionRuleArray()
	{
		return $this->PromotionRuleArray;
	}
	/**
	 * @return void
	 * @param PromotionRuleArrayType $value 
	 */
	function setPromotionRuleArray($value)
	{
		$this->PromotionRuleArray = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetPromotionRulesResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'PromotionRuleArray' =>
					array(
						'required' => false,
						'type' => 'PromotionRuleArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
