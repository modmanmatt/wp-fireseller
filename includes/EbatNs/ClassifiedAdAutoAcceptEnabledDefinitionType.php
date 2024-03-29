<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Indicates whether automatic acceptance of best offers is allowed for this 
 * category.Returned only if this category overrides the site default. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ClassifiedAdAutoAcceptEnabledDefinitionType.html
 *
 */
class ClassifiedAdAutoAcceptEnabledDefinitionType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ClassifiedAdAutoAcceptEnabledDefinitionType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
