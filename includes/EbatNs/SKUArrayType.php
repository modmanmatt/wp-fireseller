<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'SKUType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * A list of stock-keeping unit (SKU) identifiers that a seller uses in listings. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SKUArrayType.html
 *
 */
class SKUArrayType extends EbatNs_ComplexType
{
	/**
	 * @var SKUType
	 */
	protected $SKU;

	/**
	 * @return SKUType
	 * @param integer $index 
	 */
	function getSKU($index = null)
	{
		if ($index !== null) {
			return $this->SKU[$index];
		} else {
			return $this->SKU;
		}
	}
	/**
	 * @return void
	 * @param SKUType $value 
	 * @param  $index 
	 */
	function setSKU($value, $index = null)
	{
		if ($index !== null) {
			$this->SKU[$index] = $value;
		} else {
			$this->SKU = $value;
		}
	}
	/**
	 * @return void
	 * @param SKUType $value 
	 */
	function addSKU($value)
	{
		$this->SKU[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SKUArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SKU' =>
					array(
						'required' => false,
						'type' => 'SKUType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
