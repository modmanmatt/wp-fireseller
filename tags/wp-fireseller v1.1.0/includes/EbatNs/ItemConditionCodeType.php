<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies a predefined subset of item conditions. The predefined set of 
 * fieldscan vary for different calls. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ItemConditionCodeType.html
 *
 * @property string New
 * @property string Used
 * @property string CustomCode
 */
class ItemConditionCodeType extends EbatNs_FacetType
{
	const CodeType_New = 'New';
	const CodeType_Used = 'Used';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ItemConditionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ItemConditionCodeType = new ItemConditionCodeType();

?>
