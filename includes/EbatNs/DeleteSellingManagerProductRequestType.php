<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AbstractRequestType.php';

/**
 * Deletes a Selling Manager product.This call is subject to change without notice; 
 * thedeprecation process is inapplicable to this call. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DeleteSellingManagerProductRequestType.html
 *
 */
class DeleteSellingManagerProductRequestType extends AbstractRequestType
{
	/**
	 * @var long
	 */
	protected $ProductID;

	/**
	 * @return long
	 */
	function getProductID()
	{
		return $this->ProductID;
	}
	/**
	 * @return void
	 * @param long $value 
	 */
	function setProductID($value)
	{
		$this->ProductID = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DeleteSellingManagerProductRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ProductID' =>
					array(
						'required' => false,
						'type' => 'long',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
