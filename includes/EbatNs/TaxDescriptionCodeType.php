<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Type that defines the TaxDescription field. The TaxDescription field allows 
 * theseller to provide a description of the sales tax type. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/TaxDescriptionCodeType.html
 *
 * @property string SalesTax
 * @property string ElectronicWasteRecyclingFee
 * @property string TireRecyclingFee
 * @property string CustomCode
 */
class TaxDescriptionCodeType extends EbatNs_FacetType
{
	const CodeType_SalesTax = 'SalesTax';
	const CodeType_ElectronicWasteRecyclingFee = 'ElectronicWasteRecyclingFee';
	const CodeType_TireRecyclingFee = 'TireRecyclingFee';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('TaxDescriptionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_TaxDescriptionCodeType = new TaxDescriptionCodeType();

?>
