<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'ProductInfoType.php';

/**
 * A list of products returned from the Suggested Attributes engine. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ProductRecommendationsType.html
 *
 */
class ProductRecommendationsType extends EbatNs_ComplexType
{
	/**
	 * @var ProductInfoType
	 */
	protected $Product;

	/**
	 * @return ProductInfoType
	 * @param integer $index 
	 */
	function getProduct($index = null)
	{
		if ($index !== null) {
			return $this->Product[$index];
		} else {
			return $this->Product;
		}
	}
	/**
	 * @return void
	 * @param ProductInfoType $value 
	 * @param  $index 
	 */
	function setProduct($value, $index = null)
	{
		if ($index !== null) {
			$this->Product[$index] = $value;
		} else {
			$this->Product = $value;
		}
	}
	/**
	 * @return void
	 * @param ProductInfoType $value 
	 */
	function addProduct($value)
	{
		$this->Product[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ProductRecommendationsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Product' =>
					array(
						'required' => false,
						'type' => 'ProductInfoType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
