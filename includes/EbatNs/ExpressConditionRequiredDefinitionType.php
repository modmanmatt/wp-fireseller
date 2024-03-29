<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * For the US and Germany sites, an eBay item must meet a number of 
 * eligibilityrequirements in order to also be included on eBay Express. One 
 * requirement is thatthe item must include the Item Condition attribute (using 
 * Item Specifics). Somecategories may waive this requirement. Currently, this type 
 * defines no specialmeta-data. (An empty element is returned.) 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ExpressConditionRequiredDefinitionType.html
 *
 */
class ExpressConditionRequiredDefinitionType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ExpressConditionRequiredDefinitionType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
