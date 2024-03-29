<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies that the warranty is offered for the item by the seller. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/WarrantyOfferedCodeType.html
 *
 * @property string WarrantyOffered
 * @property string CustomCode
 */
class WarrantyOfferedCodeType extends EbatNs_FacetType
{
	const CodeType_WarrantyOffered = 'WarrantyOffered';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('WarrantyOfferedCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_WarrantyOfferedCodeType = new WarrantyOfferedCodeType();

?>
