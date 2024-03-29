<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Defines supported fields for BrandMPN. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BrandMPNType.html
 *
 */
class BrandMPNType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $Brand;
	/**
	 * @var string
	 */
	protected $MPN;

	/**
	 * @return string
	 */
	function getBrand()
	{
		return $this->Brand;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setBrand($value)
	{
		$this->Brand = $value;
	}
	/**
	 * @return string
	 */
	function getMPN()
	{
		return $this->MPN;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setMPN($value)
	{
		$this->MPN = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('BrandMPNType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Brand' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MPN' =>
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
