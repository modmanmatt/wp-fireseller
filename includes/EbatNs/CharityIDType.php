<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Defines the affiliation status for a nonprofit charityorganization registered 
 * with the eBay Giving Works provider. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CharityIDType.html
 *
 */
class CharityIDType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('CharityIDType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}	$this->_attributes = array_merge($this->_attributes,
		array(
			'type' =>
			array(
				'name' => 'type',
				'type' => 'CharityAffiliationTypeCodeType',
				'use' => 'required'
			)
		));

	}
}
?>
