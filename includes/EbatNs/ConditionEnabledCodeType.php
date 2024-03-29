<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Values indicate whether the ConditionID field is enabled, disabled or required 
 * for a category. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ConditionEnabledCodeType.html
 *
 * @property string Disabled
 * @property string Enabled
 * @property string Required
 * @property string CustomCode
 */
class ConditionEnabledCodeType extends EbatNs_FacetType
{
	const CodeType_Disabled = 'Disabled';
	const CodeType_Enabled = 'Enabled';
	const CodeType_Required = 'Required';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ConditionEnabledCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ConditionEnabledCodeType = new ConditionEnabledCodeType();

?>
