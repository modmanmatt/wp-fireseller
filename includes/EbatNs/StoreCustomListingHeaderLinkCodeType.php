<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies the type of link in the custom listing header. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/StoreCustomListingHeaderLinkCodeType.html
 *
 * @property string None
 * @property string AboutMePage
 * @property string CustomPage
 * @property string CustomCategory
 * @property string CustomCode
 */
class StoreCustomListingHeaderLinkCodeType extends EbatNs_FacetType
{
	const CodeType_None = 'None';
	const CodeType_AboutMePage = 'AboutMePage';
	const CodeType_CustomPage = 'CustomPage';
	const CodeType_CustomCategory = 'CustomCategory';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('StoreCustomListingHeaderLinkCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_StoreCustomListingHeaderLinkCodeType = new StoreCustomListingHeaderLinkCodeType();

?>
