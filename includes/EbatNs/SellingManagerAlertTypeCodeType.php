<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Container for various alert types. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellingManagerAlertTypeCodeType.html
 *
 * @property string Sold
 * @property string Inventory
 * @property string Automation
 * @property string PaisaPay
 * @property string General
 * @property string CustomCode
 */
class SellingManagerAlertTypeCodeType extends EbatNs_FacetType
{
	const CodeType_Sold = 'Sold';
	const CodeType_Inventory = 'Inventory';
	const CodeType_Automation = 'Automation';
	const CodeType_PaisaPay = 'PaisaPay';
	const CodeType_General = 'General';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellingManagerAlertTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SellingManagerAlertTypeCodeType = new SellingManagerAlertTypeCodeType();

?>
