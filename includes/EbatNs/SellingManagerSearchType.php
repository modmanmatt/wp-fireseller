<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'SellingManagerSearchTypeCodeType.php';

/**
 * For searches of Selling Manager listings, specifies search type, such as 
 * ProductID or BuyerUserID,and search value. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellingManagerSearchType.html
 *
 */
class SellingManagerSearchType extends EbatNs_ComplexType
{
	/**
	 * @var SellingManagerSearchTypeCodeType
	 */
	protected $SearchType;
	/**
	 * @var string
	 */
	protected $SearchValue;

	/**
	 * @return SellingManagerSearchTypeCodeType
	 */
	function getSearchType()
	{
		return $this->SearchType;
	}
	/**
	 * @return void
	 * @param SellingManagerSearchTypeCodeType $value 
	 */
	function setSearchType($value)
	{
		$this->SearchType = $value;
	}
	/**
	 * @return string
	 */
	function getSearchValue()
	{
		return $this->SearchValue;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setSearchValue($value)
	{
		$this->SearchValue = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellingManagerSearchType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SearchType' =>
					array(
						'required' => false,
						'type' => 'SellingManagerSearchTypeCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SearchValue' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>