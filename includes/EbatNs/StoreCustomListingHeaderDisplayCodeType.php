<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies how the custom listing header will be displayed. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/StoreCustomListingHeaderDisplayCodeType.html
 *
 * @property string None
 * @property string Full
 * @property string FullAndLeftNavigationBar
 * @property string CustomCode
 */
class StoreCustomListingHeaderDisplayCodeType extends EbatNs_FacetType
{
	const CodeType_None = 'None';
	const CodeType_Full = 'Full';
	const CodeType_FullAndLeftNavigationBar = 'FullAndLeftNavigationBar';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('StoreCustomListingHeaderDisplayCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_StoreCustomListingHeaderDisplayCodeType = new StoreCustomListingHeaderDisplayCodeType();

?>
