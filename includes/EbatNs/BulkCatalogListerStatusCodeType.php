<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 *  
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BulkCatalogListerStatusCodeType.html
 *
 * @property string Preapproved
 * @property string Active
 * @property string OnWatch
 * @property string OnHold
 * @property string Suspended
 * @property string WatchWarn
 * @property string CustomCode
 */
class BulkCatalogListerStatusCodeType extends EbatNs_FacetType
{
	const CodeType_Preapproved = 'Preapproved';
	const CodeType_Active = 'Active';
	const CodeType_OnWatch = 'OnWatch';
	const CodeType_OnHold = 'OnHold';
	const CodeType_Suspended = 'Suspended';
	const CodeType_WatchWarn = 'WatchWarn';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('BulkCatalogListerStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_BulkCatalogListerStatusCodeType = new BulkCatalogListerStatusCodeType();

?>
