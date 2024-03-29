<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies whether an eBay Stores seller prefers to promote items with 
 * across-promotion widget that is customized with the store theme or usesthe 
 * default eBay theme. This option is the same as the one set on theseller's 
 * Customize Cross-Promotion Display page. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MerchDisplayCodeType.html
 *
 * @property string DefaultTheme
 * @property string StoreTheme
 * @property string CustomCode
 */
class MerchDisplayCodeType extends EbatNs_FacetType
{
	const CodeType_DefaultTheme = 'DefaultTheme';
	const CodeType_StoreTheme = 'StoreTheme';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MerchDisplayCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_MerchDisplayCodeType = new MerchDisplayCodeType();

?>
