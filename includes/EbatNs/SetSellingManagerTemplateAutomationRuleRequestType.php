<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'SellingManagerAutoRelistType.php';
require_once 'SellingManagerAutoListType.php';
require_once 'SellingManagerAutoSecondChanceOfferType.php';
require_once 'AbstractRequestType.php';

/**
 * Revises, or adds to, the Selling Manager automationrules associated with a 
 * template.<br><br>This call is subject to change without notice; thedeprecation 
 * process is inapplicable to this call.<br><br>Using this call, you can add either 
 * an autorelist rule oran autolist rule, but not both.You also can add a second 
 * chanceoffer rule (restricted to auction items and auction 
 * templates).<br><br>This call also enables you to specify particular information 
 * about automationrules.<br><br>If a node is not passed in the call, the setting 
 * for the correspondingautomation rule remains unchanged.<br><br>Although this 
 * call can revise (overwrite) an existing rule,this call cannot delete an 
 * automation rule.(Instead, use DeleteSellingManagerTemplateAutomationRule.) 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SetSellingManagerTemplateAutomationRuleRequestType.html
 *
 */
class SetSellingManagerTemplateAutomationRuleRequestType extends AbstractRequestType
{
	/**
	 * @var long
	 */
	protected $SaleTemplateID;
	/**
	 * @var SellingManagerAutoListType
	 */
	protected $AutomatedListingRule;
	/**
	 * @var SellingManagerAutoRelistType
	 */
	protected $AutomatedRelistingRule;
	/**
	 * @var SellingManagerAutoSecondChanceOfferType
	 */
	protected $AutomatedSecondChanceOfferRule;

	/**
	 * @return long
	 */
	function getSaleTemplateID()
	{
		return $this->SaleTemplateID;
	}
	/**
	 * @return void
	 * @param long $value 
	 */
	function setSaleTemplateID($value)
	{
		$this->SaleTemplateID = $value;
	}
	/**
	 * @return SellingManagerAutoListType
	 */
	function getAutomatedListingRule()
	{
		return $this->AutomatedListingRule;
	}
	/**
	 * @return void
	 * @param SellingManagerAutoListType $value 
	 */
	function setAutomatedListingRule($value)
	{
		$this->AutomatedListingRule = $value;
	}
	/**
	 * @return SellingManagerAutoRelistType
	 */
	function getAutomatedRelistingRule()
	{
		return $this->AutomatedRelistingRule;
	}
	/**
	 * @return void
	 * @param SellingManagerAutoRelistType $value 
	 */
	function setAutomatedRelistingRule($value)
	{
		$this->AutomatedRelistingRule = $value;
	}
	/**
	 * @return SellingManagerAutoSecondChanceOfferType
	 */
	function getAutomatedSecondChanceOfferRule()
	{
		return $this->AutomatedSecondChanceOfferRule;
	}
	/**
	 * @return void
	 * @param SellingManagerAutoSecondChanceOfferType $value 
	 */
	function setAutomatedSecondChanceOfferRule($value)
	{
		$this->AutomatedSecondChanceOfferRule = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SetSellingManagerTemplateAutomationRuleRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SaleTemplateID' =>
					array(
						'required' => false,
						'type' => 'long',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AutomatedListingRule' =>
					array(
						'required' => false,
						'type' => 'SellingManagerAutoListType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AutomatedRelistingRule' =>
					array(
						'required' => false,
						'type' => 'SellingManagerAutoRelistType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AutomatedSecondChanceOfferRule' =>
					array(
						'required' => false,
						'type' => 'SellingManagerAutoSecondChanceOfferType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
