<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Indicates whether the seller is eligible for a Final Value Fee credit if 
 * thedispute is resolved by the buyer and seller, or if eBay customer support 
 * makes adecision on the dispute in the seller's favor. Note that even if the item 
 * iseligible for a Final Value Fee credit, the credit is not guaranteed in any 
 * way. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeCreditEligibilityCodeType.html
 *
 * @property string InEligible
 * @property string Eligible
 * @property string CustomCode
 */
class DisputeCreditEligibilityCodeType extends EbatNs_FacetType
{
	const CodeType_InEligible = 'InEligible';
	const CodeType_Eligible = 'Eligible';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DisputeCreditEligibilityCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DisputeCreditEligibilityCodeType = new DisputeCreditEligibilityCodeType();

?>
