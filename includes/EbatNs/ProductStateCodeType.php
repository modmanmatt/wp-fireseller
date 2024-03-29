<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * State of a catalog product that may have been updated, replaced, marked for 
 * deletion,or merged with another product.. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ProductStateCodeType.html
 *
 * @property string Update
 * @property string UpdateMajor
 * @property string UpdateNoDetails
 * @property string Merge
 * @property string Delete
 * @property string CustomCode
 */
class ProductStateCodeType extends EbatNs_FacetType
{
	const CodeType_Update = 'Update';
	const CodeType_UpdateMajor = 'UpdateMajor';
	const CodeType_UpdateNoDetails = 'UpdateNoDetails';
	const CodeType_Merge = 'Merge';
	const CodeType_Delete = 'Delete';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ProductStateCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ProductStateCodeType = new ProductStateCodeType();

?>
