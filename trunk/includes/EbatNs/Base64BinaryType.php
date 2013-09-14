<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Used for storing an optional reference ID to the binary attachment 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/Base64BinaryType.html
 *
 */
class Base64BinaryType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('Base64BinaryType', 'http://www.w3.org/2001/XMLSchema');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}	$this->_attributes = array_merge($this->_attributes,
		array(
			'contentType' =>
			array(
				'name' => 'contentType',
				'type' => 'string',
				'use' => 'required'
			)
		));

	}
}
?>
