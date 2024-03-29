<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Flat Shipping Rate Options 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/FlatShippingRateOptionCodeType.html
 *
 * @property string ChargeAmountForEachAdditionalItem
 * @property string DeductAmountFromEachAdditionalItem
 * @property string ShipAdditionalItemsFree
 * @property string CustomCode
 */
class FlatShippingRateOptionCodeType extends EbatNs_FacetType
{
	const CodeType_ChargeAmountForEachAdditionalItem = 'ChargeAmountForEachAdditionalItem';
	const CodeType_DeductAmountFromEachAdditionalItem = 'DeductAmountFromEachAdditionalItem';
	const CodeType_ShipAdditionalItemsFree = 'ShipAdditionalItemsFree';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('FlatShippingRateOptionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_FlatShippingRateOptionCodeType = new FlatShippingRateOptionCodeType();

?>
