<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Indicates the filters for Selling manager inventory listings. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellingManagerInventoryPropertyTypeCodeType.html
 *
 * @property string ProductsOutOfStock
 * @property string Active
 * @property string InActive
 * @property string LowStock
 * @property string WithListings
 * @property string WithoutListings
 * @property string CustomCode
 */
class SellingManagerInventoryPropertyTypeCodeType extends EbatNs_FacetType
{
	const CodeType_ProductsOutOfStock = 'ProductsOutOfStock';
	const CodeType_Active = 'Active';
	const CodeType_InActive = 'InActive';
	const CodeType_LowStock = 'LowStock';
	const CodeType_WithListings = 'WithListings';
	const CodeType_WithoutListings = 'WithoutListings';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellingManagerInventoryPropertyTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SellingManagerInventoryPropertyTypeCodeType = new SellingManagerInventoryPropertyTypeCodeType();

?>
