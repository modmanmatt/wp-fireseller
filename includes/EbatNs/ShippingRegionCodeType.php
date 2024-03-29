<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Regions to which the seller is willing to ship the item.These values are 
 * applicable to ShipToLocation. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ShippingRegionCodeType.html
 *
 * @property string Africa
 * @property string Asia
 * @property string Caribbean
 * @property string Europe
 * @property string LatinAmerica
 * @property string MiddleEast
 * @property string NorthAmerica
 * @property string Oceania
 * @property string SouthAmerica
 * @property string EuropeanUnion
 * @property string WillNotShip
 * @property string Worldwide
 * @property string Americas
 * @property string None
 * @property string CustomCode
 */
class ShippingRegionCodeType extends EbatNs_FacetType
{
	const CodeType_Africa = 'Africa';
	const CodeType_Asia = 'Asia';
	const CodeType_Caribbean = 'Caribbean';
	const CodeType_Europe = 'Europe';
	const CodeType_LatinAmerica = 'LatinAmerica';
	const CodeType_MiddleEast = 'MiddleEast';
	const CodeType_NorthAmerica = 'NorthAmerica';
	const CodeType_Oceania = 'Oceania';
	const CodeType_SouthAmerica = 'SouthAmerica';
	const CodeType_EuropeanUnion = 'EuropeanUnion';
	const CodeType_WillNotShip = 'WillNotShip';
	const CodeType_Worldwide = 'Worldwide';
	const CodeType_Americas = 'Americas';
	const CodeType_None = 'None';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ShippingRegionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ShippingRegionCodeType = new ShippingRegionCodeType();

?>
