<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_SimpleType.php';

/**
 * Primitive type that represents a stock-keeping unit (SKU). The usage of this 
 * string may vary in different contexts. For usage information and rules, see the 
 * fields that reference this type. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SKUType.html
 *
 */
class SKUType extends EbatNs_SimpleType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SKUType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SKUType = new SKUType();

?>
