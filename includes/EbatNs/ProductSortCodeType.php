<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Controls the order of product (not item) searches. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ProductSortCodeType.html
 *
 * @property string PopularityAsc
 * @property string PopularityDesc
 * @property string RatingAsc
 * @property string RatingDesc
 * @property string ReviewCountAsc
 * @property string ReviewCountDesc
 * @property string ItemCountAsc
 * @property string ItemCountDesc
 * @property string TitleAsc
 * @property string TitleDesc
 * @property string CustomCode
 */
class ProductSortCodeType extends EbatNs_FacetType
{
	const CodeType_PopularityAsc = 'PopularityAsc';
	const CodeType_PopularityDesc = 'PopularityDesc';
	const CodeType_RatingAsc = 'RatingAsc';
	const CodeType_RatingDesc = 'RatingDesc';
	const CodeType_ReviewCountAsc = 'ReviewCountAsc';
	const CodeType_ReviewCountDesc = 'ReviewCountDesc';
	const CodeType_ItemCountAsc = 'ItemCountAsc';
	const CodeType_ItemCountDesc = 'ItemCountDesc';
	const CodeType_TitleAsc = 'TitleAsc';
	const CodeType_TitleDesc = 'TitleDesc';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ProductSortCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ProductSortCodeType = new ProductSortCodeType();

?>
