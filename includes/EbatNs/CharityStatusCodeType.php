<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * CharityStatusCodeType - Type declaration to be used by other schema. Indicates 
 * the nonprofit status of the nonprofit charity organization registered with the 
 * dedicated eBay Giving Works provider. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CharityStatusCodeType.html
 *
 * @property string Valid
 * @property string NoLongerValid
 * @property string CustomCode
 */
class CharityStatusCodeType extends EbatNs_FacetType
{
	const CodeType_Valid = 'Valid';
	const CodeType_NoLongerValid = 'NoLongerValid';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('CharityStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_CharityStatusCodeType = new CharityStatusCodeType();

?>
