<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Defines the total number of fine grained item compatibilities that can be 
 * appliedto a listing.<br><br>When you list with parts compatibility, using only 
 * the high-level compatibilitysearch names, such as Year, Make, and Model, the 
 * fitment applies to the variousunspecified lower-level compatiblity search names 
 * and values, such as Trim andEngine, as well. This means that specifying a single 
 * coarsely defined itemcompatibility may result in multiple fitments applying to 
 * the listing at the lowestlevel of granularity. Up to 300 (or whatever maximum is 
 * indicated byMaxItemCompatibility) coarse parts compatiblities can be specified 
 * for a givenlisting.<br><br>Alternatively, you can explicitly specify up to 1000 
 * (or whatever maximum isindicated by MaxGranularFitmentCount) parts 
 * compatibilities at the lowest level ofgranularity. That is, if you specify your 
 * parts compatibilities using all of thesupported compatiblity search names (e.g., 
 * Year, Make, Model, Trim, and Engine),you can specify up to 1000 compatibilities. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MaxGranularFitmentCountDefinitionType.html
 *
 */
class MaxGranularFitmentCountDefinitionType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MaxGranularFitmentCountDefinitionType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
