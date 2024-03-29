<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Site criteria for filtering search results. The site value is determined by 
 * thesite specified in the request (the site ID in the SOAP URL or, for 
 * UnifiedSchema XML requests, the site ID in the X-EBAY-API-SITEID HTTP Header). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SiteIDFilterCodeType.html
 *
 * @property string ListedInCurrencyImplied
 * @property string LocatedInCountryImplied
 * @property string AvailableInCountryImplied
 * @property string SiteImplied
 * @property string BelgiumListing
 * @property string CustomCode
 */
class SiteIDFilterCodeType extends EbatNs_FacetType
{
	const CodeType_ListedInCurrencyImplied = 'ListedInCurrencyImplied';
	const CodeType_LocatedInCountryImplied = 'LocatedInCountryImplied';
	const CodeType_AvailableInCountryImplied = 'AvailableInCountryImplied';
	const CodeType_SiteImplied = 'SiteImplied';
	const CodeType_BelgiumListing = 'BelgiumListing';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SiteIDFilterCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SiteIDFilterCodeType = new SiteIDFilterCodeType();

?>
