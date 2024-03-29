<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies the selling format used for a listing. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ListingTypeCodeType.html
 *
 * @property string Unknown
 * @property string Chinese
 * @property string Dutch
 * @property string Live
 * @property string Auction
 * @property string AdType
 * @property string StoresFixedPrice
 * @property string PersonalOffer
 * @property string FixedPriceItem
 * @property string Half
 * @property string LeadGeneration
 * @property string Express
 * @property string Shopping
 * @property string CustomCode
 */
class ListingTypeCodeType extends EbatNs_FacetType
{
	const CodeType_Unknown = 'Unknown';
	const CodeType_Chinese = 'Chinese';
	const CodeType_Dutch = 'Dutch';
	const CodeType_Live = 'Live';
	const CodeType_Auction = 'Auction';
	const CodeType_AdType = 'AdType';
	const CodeType_StoresFixedPrice = 'StoresFixedPrice';
	const CodeType_PersonalOffer = 'PersonalOffer';
	const CodeType_FixedPriceItem = 'FixedPriceItem';
	const CodeType_Half = 'Half';
	const CodeType_LeadGeneration = 'LeadGeneration';
	const CodeType_Express = 'Express';
	const CodeType_Shopping = 'Shopping';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ListingTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ListingTypeCodeType = new ListingTypeCodeType();

?>
